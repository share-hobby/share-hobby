<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class TeacherController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        $posts = Post::latest()->get(); 
    return view('teacher.home', compact('user', 'posts'));
    }
    // public function show($id)
    // {
    //     $post = Post::findOrFail($id);
    //     return view('teacher.show', compact('post')); // teacherフォルダ内のshow.blade.php
    // }

    public function show($id)
{
    $post = Post::findOrFail($id);
    if ($post->user_id !== Auth::id()) {
        $canEditOrDelete = false;
    } else {
        $canEditOrDelete = true;
    }
    return view('teacher.show', compact('post', 'canEditOrDelete'));
}
}
