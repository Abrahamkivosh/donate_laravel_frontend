<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonorProfileRequest;
use App\Http\Requests\UpdateDonorProfileRequest;
use App\Models\DonorProfile;

class DonorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDonorProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DonorProfile $donorProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonorProfile $donorProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonorProfileRequest $request, DonorProfile $donorProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonorProfile $donorProfile)
    {
        //
    }
}
