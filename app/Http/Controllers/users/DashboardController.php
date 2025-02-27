<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    private function userDashboard(): View
    {


        return view('users.dashboard');
    }
    private function adminDashboard(): View
    {


        return view('admins.dashboard');
    }

    public function dashboard(Request $request): View
    {
        if ($request->user()->role === 'admin') {
            # code...
            return $this->adminDashboard();
        } else {
            # code...
            return $this->userDashboard();
        }
    }


    public function index()
    {
        $users = User::query()->withSum('donations', 'amount')->get();
        return view('admins.users.index', compact('users'));
    }
}
