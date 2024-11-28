<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function indexStudent()
    {
        return view('student.chat_index'); 
    }

    public function indexTeacher()
    {
        return view('teacher.chat_index');
    }

}
