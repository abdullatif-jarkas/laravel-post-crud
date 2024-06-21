<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->post_id = $postId;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('post.show', $postId)->with('success', 'Comment added successfully.');
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate([
            'content' => 'required',
        ]);

        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('post.show', $comment->post_id)->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('post.show', $comment->post_id)->with('success', 'Comment deleted successfully.');
    }
}
