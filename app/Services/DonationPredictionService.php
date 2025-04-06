<?php

namespace App\Services;

use App\Models\Donation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DonationPredictionService
{
    /**
     * Get the required inputs for the ML model to predict future donations for a donor.
     *
     * @param int $userId
     * @return array
     */
    public function getMlInputs(int $userId)
    {
        // Get the user
        $user = User::find($userId);
        // Fetch the donor's donation history
        $donations = Donation::where('user_id', $userId)->get();

        // Calculate total donations
        $totalDonations = $donations->count();

        // Calculate total amount donated
        $totalAmount = $donations->sum('amount');

        // Calculate average donation
        $avgDonation = $totalDonations > 0 ? $totalAmount / $totalDonations : 0;

        // Calculate frequency (donations per year)
        $firstDonationDate = $donations->min('donation_date');
        $lastDonationDate = $donations->max('donation_date');

        if ($firstDonationDate && $lastDonationDate) {
            $daysSinceFirstDonation = Carbon::parse($firstDonationDate)->diffInDays(Carbon::parse($lastDonationDate));
            $frequency = $daysSinceFirstDonation > 0 ? ($totalDonations / $daysSinceFirstDonation) * 365 : 0;
        } else {
            $frequency = 0;
        }

        // Get the last donation date
        $lastDonationDate = $donations->max('donation_date');

        // Get the preferred payment method (most used payment method)
        $preferredPaymentMethod = $donations->groupBy('payment_method')
            ->sortDesc()
            ->keys()
            ->first();

        // Check if the donor is recurring
        $recurringDonor = $user->is_recurring_donor ? 'True' : 'False';

        // Get the most common campaign
        $mostCommonCampaign = $donations->groupBy('compaign_id')
            ->sortDesc()
            ->keys()
            ->first();

        // Prepare the ML inputs
        $mlInputs = [
            'total_donations' => $totalDonations,
            'total_amount' => $totalAmount,
            'avg_donation' => $avgDonation,
            'frequency' => $frequency,
            'last_donation_date' => $lastDonationDate,
            'preferred_payment_method' => $preferredPaymentMethod,
            'recurring_donor' => $recurringDonor,
            'campaign' => $mostCommonCampaign,
        ];

        return $mlInputs;
    }

    /**
     * Predict future donation for a donor.
     *
     * @param int $userId
     * @return array
     */
    public function predictFutureDonation($userId)
    {
        // Get the ML inputs
        $mlInputs = $this->getMlInputs($userId);
        // Call the ML model (e.g., via an API or locally)
        $predictedDonation = $this->callMlModel($mlInputs);

        return $predictedDonation;
    }

    /**
     * Call the ML model to get predictions.
     *
     * @param array $mlInputs
     * @return array
     */
    private function callMlModel($mlInputs)
    {
        // Example: Call the ML model via an API
        // Replace this with your actual ML model integration
        $mlApiUrl =  'http://localhost:8000/api/predict/';
        Log::info('ML API URL: ' . $mlApiUrl);
        // Call the ML model API
        $response = Http::post($mlApiUrl, $mlInputs);
        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json());
    }
}
