<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassroomChat;
use App\Models\Lesson;

class ChatroomController extends Controller
{
    public function showChatroom($lesson_id)
    {
        $chats_=ClassroomChat::where('lesson_id', $lesson_id)->get();
        $lesson=Lesson::find($lesson_id);

        $lesson_name=$lesson->name;

        $chats = array();
        foreach($chats_ as $chat){
            $chats[] = [$chat->user_id, $chat->text, $chat->file];
        }

        return view('chat', compact('lesson_name', 'chats'));
    }
}
