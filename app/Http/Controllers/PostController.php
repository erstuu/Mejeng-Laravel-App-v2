<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all posts
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10048',
            'location' => 'required',
            'category' => 'required|in:pantai,gunung,air-terjun,goa,camping,perbukitan,danau,kuliner,budaya,keluarga',
        ]);        

        $post = Post::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'status' => $request->get('status'),
            'slug' => Str::slug($request->get('title')),
            'location' => $request->get('location'),
            'category' => $request->get('category'),
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $path = $request->file('image')->store('images', 'public');

            $post->image = $path;
            $post->save();
        }

        return redirect()->route('dashboard')  
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10048',
            'location' => 'required',
            'category' => 'required|in:pantai,gunung,air-terjun,goa,camping,perbukitan,danau,kuliner,budaya,keluarga',
        ]);

        $post->update([
            'title' => $request->get('title'),  
            'content' => $request->get('content'),  
            'status' => $request->get('status'),
            'slug' => Str::slug($request->get('title')),
            'location' => $request->get('location'),
            'category' => $request->get('category'),
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }


            $path = $request->file('image')->store('images', 'public');

            $post->image = $path;
            $post->save();
        }

        return redirect()->route('dashboard')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully');
    }
}
