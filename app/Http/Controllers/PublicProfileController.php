<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicProfileController extends Controller
{
    public function show(User $user): View
    {
        return view('profile.show', [
            'user' => $user
        ]);
    }
}
