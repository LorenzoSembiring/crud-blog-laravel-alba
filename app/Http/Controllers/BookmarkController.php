<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::with(['user', 'post'])->get();
        return response()->json($bookmarks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
        ]);

        $bookmark = Bookmark::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
        ]);

        return response()->json($bookmark, 201);
    }

    public function show($id)
    {
        $bookmark = Bookmark::with(['user', 'post'])->findOrFail($id);
        return response()->json($bookmark);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
        ]);

        $bookmark = Bookmark::findOrFail($id);
        $bookmark->update([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
        ]);

        return response()->json($bookmark);
    }

    public function destroy($id)
    {
        $bookmark = Bookmark::findOrFail($id);
        $bookmark->delete();

        return response()->json(null, 204);
    }
}
