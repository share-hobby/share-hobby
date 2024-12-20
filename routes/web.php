<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ChatsController;



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
    // ユーザーが教師か生徒かを確認
    if (Auth::user()->role === 'teacher') {
        return redirect()->route('teacher.home');
    } else {
        return redirect()->route('student.home');
    }
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
    Route::get('/teacher/chat', [ChatController::class, 'indexTeacher'])->name('teacher.chat');

    // 生徒用
    Route::get('/student/home', [StudentController::class, 'index'])->name('student.home');
    Route::get('/student/posts/{post}', [StudentController::class, 'show'])->name('student.posts.show');
    Route::get('/student/chat', [ChatController::class, 'indexStudent'])->name('student.chat');

    // プロフィール管理
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    Route::post('/user/save', [UsersController::class, 'save'])->name('user.save');
    Route::post('/user/check', [UsersController::class, 'check'])->name('user.check');
    Route::get('/user/logout', [UsersController::class, 'logout'])->name('user.logout');
    Route::get('/user/profile', [UsersController::class, 'profile'])->name('user.profile');
    Route::get('/user/login', [UsersController::class, 'login'])->name('user.login');
    Route::get('/user/profile', [UsersController::class, 'profile'])->name('user.profile');
    Route::get('/user/register', [UsersController::class, 'register'])->name('user.register');
    Route::get('/user/profileview', [UsersController::class, 'profile'])->name('user.profileview');
    Route::get('/user/profileedit', [UsersController::class, 'edit'])->name('user.profileedit');
    Route::get('/user/chats', [UsersController::class, 'chats'])->name('user.chats');
    Route::put('/user/updateProfile', [UsersController::class, 'updateProfile'])->name('user.updateProfile');
    Route::get('/user/dashboard', [UsersController::class, 'dashboard'])->name('user.dashboard');

    Route::post('/admin/save', [AdminsController::class, 'save'])->name('admin.save');
    Route::post('/admin/check', [AdminsController::class, 'check'])->name('admin.check');
    Route::get('/admin/logout', [AdminsController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/profileview', [AdminsController::class, 'profile'])->name('admin.profileview');
    Route::get('/admin/profileedit', [AdminsController::class, 'edit'])->name('admin.profileedit');
    Route::get('/admin/login', [AdminsController::class, 'login'])->name('admin.login');
    Route::get('/admin/profile', [AdminsController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/register', [AdminsController::class, 'register'])->name('admin.register');
    Route::get('/admin/chats', [AdminsController::class, 'chats'])->name('admin.chats');
    Route::get('/admin/dashboard', [AdminsController::class, 'dashboard'])->name('admin.dashboard');
    Route::put('/admin/updateProfile', [AdminsController::class, 'updateProfile'])->name('admin.updateProfile');


    Route::get('/admin/fetch-messages', [ChatsController::class, 'fetchMessages'])->name('admin.fetchMessages');
    Route::post('/admin/send-message', [ChatsController::class, 'sendMessage'])->name('admin.sendMessage');
    Route::get('/fetch-messages', [ChatsController::class, 'fetchMessagesFromUserToAdmin'])->name('fetch.messagesFromSellerToAdmin');
    Route::post('/send-message', [ChatsController::class, 'sendMessageFromUserToAdmin'])->name('send.Messageofsellertoadmin');
