<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePredictionLogRequest;
use App\Http\Requests\UpdatePredictionLogRequest;
use App\Models\Donation;
use App\Models\PredictionLog;
use App\Models\User;
use App\Services\DonationPredictionService;
use Illuminate\Support\Facades\DB;

class PredictionLogController extends Controller
{
    protected DonationPredictionService $donationPredictionService;

    public function __construct(DonationPredictionService $donationPredictionService)
    {
        $this->donationPredictionService = $donationPredictionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $predictionLogs = PredictionLog::all();
        return view('admins.prediction_logs.index', compact('predictionLogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePredictionLogRequest $request)
    {
        //Get all Users of the system and predict their next donation
        DB::beginTransaction();
        try {
            $users = User::query()->lazyById();
            foreach ($users as $user) {
                $inputs = $this->donationPredictionService->getMlInputs($user->id);
                // if total_donations < 1, skip this user
                if ($inputs['total_donations'] < 1) {
                    continue;
                }
                $prediction = $this->donationPredictionService->predictFutureDonation($user->id);
                //if the prediction is the same as the last prediction, skip saving 
                $lstPrediction = PredictionLog::where('user_id', $user->id)->latest()->first();
                if ($lstPrediction && $lstPrediction->predicted_donation == $prediction['predicted_donation'] && $lstPrediction->predicted_next_donation_date == $prediction['next_donation_date']) {
                } else {
                    PredictionLog::create([
                        'user_id' => $user->id,
                        'predicted_donation' => $prediction['predicted_donation'],
                        'predicted_next_donation_date' => $prediction['next_donation_date'],
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('predictions.index')->with('error', 'Failed to generate predictions: ' . $e->getMessage());
        }
        return redirect()->route('predictions.index')->with('success', 'Predictions generated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PredictionLog $predictionLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PredictionLog $predictionLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePredictionLogRequest $request, PredictionLog $predictionLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PredictionLog $predictionLog)
    {
        //
    }
}
