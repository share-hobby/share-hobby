<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::latest()->get();
        return view('student.home', compact('user', 'posts'));
    }
    public function show($id)
    {
    $post = Post::findOrFail($id);
    return view('student.show', compact('post')); // 詳細ビュー
    }
}
