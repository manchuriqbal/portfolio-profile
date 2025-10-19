<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function create()
    {
        return view('home.pages.education.create');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'degree' => 'required|string|max:255',
            'institute' => 'required|string|max:255',
            'grade' => 'required|string|max:15',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        $user = auth()->user();
        $profile = $user->profile;

        $profile->educations()->create([
            'degree' => $validated_data['degree'],
            'institute' => $validated_data['institute'],
            'grade' => $validated_data['grade'],
            'start_date' => $validated_data['start_date'],
            'end_date' => $validated_data['end_date'] ?? null,
        ]);

        return redirect()->route('profile')->with('success', 'Education qualification added successfully.');
    }

    public function edit(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile;

        return view('home.pages.education.edit')->with('profile', $profile);
    }
}
