<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // =  ->
    public function index(Request $request)
    {
        $profiles = Profile::with('user')->latest()->paginate();

        return view('home.pages.portfolio.index')->with([
            'profiles' => $profiles,
        ]);
    }

    public function show(Profile $profile)

    {
        $portfolio =  $profile->load('user', 'educations', 'comments');
        return view('home.pages.portfolio.show')->with([
            'portfolio' => $portfolio,
        ]);

    }
}
