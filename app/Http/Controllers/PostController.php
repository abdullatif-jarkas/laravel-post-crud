<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Post::class);

        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'category_id' => 'required',
        //     'description' => 'required',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // $data = $request->only(['title', 'description']);
        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $data['image'] = $imageName;
        // }

        // auth()->user()->posts()->create($data);

        // return redirect()->route('post.index')->with("success", 'Post Added Successfully');
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = '';
        if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $post['image'] = $imageName;
            }
        $post = new Post();
        $post->user_id = auth()->id();
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();

        // ربط الوسوم بالبوست
        $post->tags()->sync($request->tags);

        // dd($post);
        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->authorize('view', Post::class);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $imageName = $post->image;
        if ($request->hasFile('image')) {
            $image = $request['image'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
        $post->update([
            "title" => $request['title'],
            "description" => $request['description'],
            "image" => $imageName
        ]);
        return redirect()->route('post.index')->with("success", 'Post Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        return redirect()->route('post.index')->with("success", 'Post Deleted Successfully');
    }
}
