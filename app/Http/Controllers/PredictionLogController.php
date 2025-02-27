<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePredictionLogRequest;
use App\Http\Requests\UpdatePredictionLogRequest;
use App\Models\PredictionLog;

class PredictionLogController extends Controller
{
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
        //
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
