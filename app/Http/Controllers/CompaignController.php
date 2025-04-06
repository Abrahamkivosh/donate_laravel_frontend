<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompaignRequest;
use App\Http\Requests\UpdateCompaignRequest;
use App\Models\Compaign;
use App\Notifications\InterestedCampaign;

class CompaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compaigns = Compaign::query()->latest()->get();
        return view('admins.compaigns.index', compact('compaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.compaigns.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompaignRequest $request)
    {
        $data = $request->validated();
        Compaign::create($data);
        return redirect()->route('compaigns.index')->with('success', 'Compaign created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Compaign $compaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compaign $compaign)
    {
        return view('admins.compaigns.edit', compact('compaign'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompaignRequest $request, Compaign $compaign)
    {
        $data = $request->validated();
        $compaign->update($data);
        return redirect()->route('compaigns.index')->with('success', 'Compaign updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compaign $compaign)
    {
        $compaign->delete();
        return redirect()->route('compaigns.index')->with('success', 'Compaign deleted successfully');
    }

    /**
     * Notify users about the campaign.
     */
    public function notifyUsers()
    {
        $compaigns = Compaign::query()->get();
        foreach ($compaigns as $compaign) {
            $users = $compaign->users;
            foreach ($users as $user) {
                $user->notify(new InterestedCampaign($compaign));
            }
        }
        return redirect()->route('compaigns.index')->with('success', 'Users notified successfully');
    }
}
