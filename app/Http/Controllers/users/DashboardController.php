<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Compaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard(Request $request): View
    {
        return view('admins.dashboard');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->withSum('donations', 'amount')->get();
        return view('admins.users.index', compact('users'));
    }

    /**
     * Show user details
     * 
     */
    public function show(User $user)
    {
        $user->load('donations', 'compaigns');
        return view('admins.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $compaigns = $user->compaigns()->pluck('compaign_id')->toArray();
        $allCampaigns = Compaign::pluck('name', 'id'); // Fetch all campaigns
        return view('admins.users.edit', compact('user', 'compaigns', 'allCampaigns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users,email,' . $user->id,
            'campaigns' => 'nullable|array',
            'campaigns.*' => 'exists:compaigns,id',
        ]);

        $user->update($request->only('name', 'email'));

        // Sync the user's campaigns
        if ($request->has('campaigns')) {
            $user->compaigns()->sync($request->campaigns);
        } else {
            $user->compaigns()->detach();
        }

        return redirect()->route('users.show', $user)->with('success', 'User updated successfully.');
    }
}
