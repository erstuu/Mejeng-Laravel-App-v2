<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $featured = Post::latest()->first();
        $recentPosts = Post::where('id', '!=', optional($featured)->id)
                            ->latest()
                            ->take(3)
                            ->get();
        
        $allPosts = Post::latest()->get();

        $otherPosts = $allPosts->filter(function($post) use ($featured, $recentPosts) {
            if ($featured) {
                return $post->id !== $featured->id && !$recentPosts->pluck('id')->contains($post->id);
            }
            
            return !$recentPosts->pluck('id')->contains($post->id);
        });
                

        return view('welcome', [
            'featured' => $featured,
            'recentPosts' => $recentPosts,
            'otherPosts' => $otherPosts,
            'allPosts' => $allPosts,
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

}
