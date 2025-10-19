<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyProfileController extends Controller
{
    public function profile(Request $request)
    {
        $user = auth()->user();
        $profile = Profile::with('user', 'educations')
            ->where('user_id', $user->id)
            ->first();

        if (!$profile) {
            return redirect()->route('profile.create')->with('info', 'Please create your profile first.');
        }

        $educations = Education::where('profile_id', $profile->id)->get();



        return view('home.pages.me.profile')->with([
            'profile' => $profile,
            'educations' => $educations,

        ]);
    }


    public function createProfile(Request $request)
    {
        $user = auth()->user();

        // Check if user already has a profile
        $existingProfile = Profile::where('user_id', $user->id)->first();

        if ($existingProfile) {
            return redirect()->route('profile')->with('error', 'You already have a profile.');
        }

        return view('home.pages.me.create');
    }


    public function storeProfile(Request $request)
    {
        $user =auth()->user();

        $existingProfile = Profile::where('user_id', $user->id)->first();
        if ($existingProfile) {
            return redirect()->route('profile')->with('error', 'You already have a profile.');
        }


        $validated = $request->validate([
            'gender' => 'required|string|in:male,female,other',
            'age' => 'required|integer|min:1|max:120',
            'hobbies' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            $filename = time() . '_' . $user->id . '.' . $avatar->getClientOriginalExtension();

            $avatarPath = $avatar->storeAs('avatars', $filename, 'public');
        }

        $profile = Profile::create([
            'user_id' => $user->id,
            'gender' => $validated['gender'],
            'age' => $validated['age'],
            'hobbies' => $validated['hobbies'],
            'phone' => $validated['phone'],
            'city' => $validated['city'],
            'email' => $user->email,
            'avatar' => $avatarPath
        ]);

        return redirect()->route('profile')->with('success', 'Profile created successfully!');
    }

    public function edit(Request $request)
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('profile.create')->with('info', 'Please create your profile first.');
        }

        return view('home.pages.me.edit')->with('profile', $profile);
    }

    public function updateProfile(Request $request)
    {
        $user =auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id . ',id',
            'gender' => 'required|string|in:male,female,other',
            'age' => 'required|integer|min:1|max:120',
            'hobbies' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '_' . $user->id . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('avatars', $filename, 'public');
        }
        try {
            DB::beginTransaction();

            $profile->update([
                'gender' => $validated['gender'],
                'age' => $validated['age'],
                'hobbies' => $validated['hobbies'],
                'phone' => $validated['phone'],
                'city' => $validated['city'],
                'avatar' => $avatarPath ?? $profile->avatar
            ]);

            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email']
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update profile.')->withInput();
        }


        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function deleteProfile(Request $request)
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return redirect()->route('profile')->with('error', 'No profile found to delete.');
        }

        try {
            DB::beginTransaction();

            $profile->educations()->delete();
            $profile->delete();

            DB::commit();
            return redirect()->route('home')->with('success', 'Profile deleted successfully.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('profile')->with('error', 'Failed to delete profile.');
        }

    }
}
