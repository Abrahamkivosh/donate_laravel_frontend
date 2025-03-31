<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Http\services\MpesaGateWay;
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
    public function store(StoreDonationRequest $request, MpesaGateWay $mpesaGateWay)
    {
        // Validate the request data
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['donation_date'] = now();

        // check if payment_method is mpesa
        if ($data['payment_method'] == 'mpesa') {
            // Get the phone number and amount from the request
            $phoneNumber = $request->input('phone_number');
            $amount = $request->input('amount');
            // Call the lipaNaMPesaOnlineAPI method to initiate the payment
            $response = $mpesaGateWay->lipaNaMPesaOnlineAPI($phoneNumber, $amount);
        }



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
