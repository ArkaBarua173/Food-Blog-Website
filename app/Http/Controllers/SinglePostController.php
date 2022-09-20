<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.singlepost', [
            'post' => $post
        ]);
    }
}