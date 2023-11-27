<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $nfts = $user->nfts()->latest()->get();
        $collections = $user->collections()->latest()->get();

        return view('dashboard', compact('nfts', 'collections'));
    }
}
