<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of the posts
    public function index()
    {
        $posts = Post::with('category')->get();
        return response()->json($posts);
    }

    // Store a newly created post in storage
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'media.*' => 'required|file|mimes:jpg,jpeg,png,gif,webp', // Validate media files
        ]);

        // Start a transaction to ensure both post and media are saved together
        DB::transaction(function () use ($request) {
            // Create the post
            $post = Post::create([
                'category_id' => $request->category_id,
                'content' => $request->content,
            ]);

            // Attach media to the post
            foreach ($request->file('media') as $file) {
                $post->addMedia($file)->toMediaCollection();
            }
        });

        return response()->json(['message' => 'Post and media created successfully'], 201);
    }

    // Display the specified post
    public function show($id)
    {
        $post = Post::with('category')->findOrFail($id);
        return response()->json($post);
    }

    // Update the specified post in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'category_id' => $request->category_id,
            'content' => $request->content,
        ]);

        return response()->json($post);
    }

    // Remove the specified post from storage
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(null, 204);
    }
}
