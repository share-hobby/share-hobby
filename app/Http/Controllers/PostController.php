<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('teacher.board', compact('posts'));
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
{
    // バリデーションなし（必要であれば追加）
    $post = new Post();

    $post->title = $request->input('title');
    $post->body = $request->input('body');
    $post->zoomurl = $request->input('zoomurl');
    $post->user_id = Auth::id();  // ログインユーザーIDを設定

    if ($request->hasFile('image')) {
        $post->image = $request->file('image')->store('images', 'public');
    }

    $post->save();

    // 投稿一覧ページにリダイレクト
    return redirect()->route('teacher.home');
}
// public function show($id)
// {
//     $post = Post::findOrFail($id);
//     if ($post->user_id !== Auth::id()) {
//         $canEditOrDelete = false;
//     } else {
//         $canEditOrDelete = true;
//     }
//     return view('teacher.show', compact('post', 'canEditOrDelete'));
// }

public function edit($id)
{
    $post = Post::findOrFail($id);
    if ($post->user_id !== Auth::id()) {
        return redirect()->route('teacher.home')->with('error', 'この投稿を編集する権限がありません');
    }
    return view('teacher.edit', compact('post'));
}

public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);
    if ($post->user_id !== Auth::id()) {
        return redirect()->route('teacher.home')->with('error', 'この投稿を更新する権限がありません');
    }
    $post->update([
        'title' => $request->title,
        'body' => $request->body,
    ]);
    return redirect()->route('teacher.posts.show', $post->id)->with('success', '投稿が更新されました');
}

public function destroy($id)
{
    $post = Post::findOrFail($id);
    if ($post->user_id !== Auth::id()) {
        return redirect()->route('teacher.home')->with('error', 'この投稿を削除する権限がありません');
    }
    $post->delete();
    return redirect()->route('teacher.home')->with('success', '投稿が削除されました');
}

}