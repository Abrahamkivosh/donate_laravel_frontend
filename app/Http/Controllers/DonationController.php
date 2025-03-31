<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Models\Compaign;
use App\Models\Donation;
use App\Services\DonationDataService;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    protected DonationDataService $donationDataService;

    public function __construct(DonationDataService $donationDataService)
    {
        $this->donationDataService = $donationDataService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donations = Donation::all();
        return view('admins.donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $compaigns = Compaign::query()->where('status', 1)
            ->where('end_date', '>=', now()->toDateString())

            ->pluck('name', 'id');
        return view('admins.donations.create', compact('compaigns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonationRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['donation_date'] = now();
        $donation = Donation::create($data);
        // Append the new donation to the CSV file
        $this->donationDataService->appendToCsv($donation);
        return redirect()->route('donations.index')->with('success', 'Donation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonationRequest $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        //
    }
}