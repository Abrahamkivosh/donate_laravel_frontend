<?php

namespace App\Services;

use App\Models\Donation;
use App\Models\User;
use Carbon\Carbon;

class DonationDataService
{
    protected $csvFilePath = 'donation_data.csv';

    /**
     * Append a new donation to the CSV file with all required fields.
     *
     * @param Donation $donation
     * @return void
     */
    public function appendToCsv(Donation $donation)
    {
        // Fetch the donor's donation history
        $donor = User::find($donation->user_id);
        $donations = Donation::where('user_id', $donation->user_id)->get();

        // Calculate required fields
        $totalDonations = $donations->count();
        $totalAmount = $donations->sum('amount');
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

        // Get the preferred payment method (most used payment method)
        $preferredPaymentMethod = $donations->groupBy('payment_method')
            ->sortDesc()
            ->keys()
            ->first();

        // Check if the donor is recurring
        $recurringDonor = $donor->is_recurring_donor;

        // Get the most common campaign
        $mostCommonCampaign = $donations->groupBy('compaign_id')
            ->sortDesc()
            ->keys()
            ->first();

        // Prepare the data row with all required fields
        $data = [
            'donor_id' => $donation->user_id,
            'total_donations' => $totalDonations,
            'total_amount' => $totalAmount,
            'avg_donation' => $avgDonation,
            'frequency' => $frequency,
            'last_donation_date' => $lastDonationDate,
            'preferred_payment_method' => $preferredPaymentMethod,
            'recurring_donor' => $recurringDonor ? 'True' : 'False',
            'campaign' => $mostCommonCampaign,
            'predicted_donation' => 0, // Placeholder, will be updated by the ML model
            'next_donation_date' => '', // Placeholder, will be updated by the ML model
        ];

        // Append the data to the CSV file
        $file = fopen(storage_path('app/' . $this->csvFilePath), 'a');

        // If the file is empty, write the header row first
        if (filesize(storage_path('app/' . $this->csvFilePath)) == 0) {
            fputcsv($file, array_keys($data));
        }

        fputcsv($file, $data);
        fclose($file);
    }

    public function updatePredictionsInCsv($donorId, $predictedDonation, $predictedNextDonationDate)
    {
        // Read the CSV file
        $filePath = storage_path('app/' . $this->csvFilePath);
        $rows = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                $rows[] = $data;
            }
            fclose($handle);
        }

        // Update the row for the specific donor
        foreach ($rows as &$row) {
            if ($row[0] == $donorId ) { 
                $row[9] = $predictedDonation; // Update predicted_donation
                $row[10] = $predictedNextDonationDate; // Update next_donation_date
            }
        }

        // Write the updated rows back to the CSV file
        if (($handle = fopen($filePath, 'w')) !== false) {
            foreach ($rows as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        }
    }
}