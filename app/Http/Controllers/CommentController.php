<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'user_id' => 'nullable|exists:users,id',
            'comment_text' => 'nullable|string',
            'comment_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('comment_image')) {
            $comment_image = $request->file('comment_image');
            $filename = time() . '.' . $comment_image->getClientOriginalExtension();
            $imagePath = $comment_image->storeAs('comment_image', $filename, 'public');
        }

        Comment::create([
            'profile_id' => $validated['profile_id'],
            'user_id' => $validated['user_id'] ?? null,
            'comment_text' => $validated['comment_text'] ?? null,
            'comment_image' => $imagePath ?? null,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');


    }


    public function destroy(string $id)
    {
        //
    }
}
