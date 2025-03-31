<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
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
}
