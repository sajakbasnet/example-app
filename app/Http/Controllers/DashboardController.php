<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('backend')->user();
        return view('dashboard.index', compact('user'));
    }

    public function profile()
    {
        $user = Auth::guard('backend')->user();
        return view('dashboard.profile', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = Auth::guard('backend')->user();

        $user->update($request->validated());

        return back()->with('success', 'Profile updated successfully!');
    }
}