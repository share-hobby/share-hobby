<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

// よく使われるルート
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ユーザー登録・ログイン
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

// ダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ログイン後のルート（教師・生徒用）
Route::middleware('auth')->group(function () {
    // 教師用
    Route::get('/teacher/home', [TeacherController::class, 'index'])->name('teacher.home');
    Route::get('/teacher/board', [PostController::class, 'index'])->name('posts.index');
    Route::get('/teacher/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/teacher/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/teacher/posts/{post}', [TeacherController::class, 'show'])->name('teacher.posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // 生徒用
    Route::get('/student/home', [StudentController::class, 'index'])->name('student.home');
    Route::get('/student/posts/{post}', [StudentController::class, 'show'])->name('student.posts.show');
    
    // プロフィール管理
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// チャットページ
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

require __DIR__.'/auth.php';
