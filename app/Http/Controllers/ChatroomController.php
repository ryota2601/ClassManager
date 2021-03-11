<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassroomChat;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class ChatroomController extends Controller
{
    public function showChatroom($lesson_id)
    {
        $chats_=ClassroomChat::where('lesson_id', $lesson_id)->get();
        $lesson=Lesson::find($lesson_id);
        $lesson_name=$lesson->name;

        $mylessons_=Lesson::where('user_id', Auth::id())->get();
        $mylessons=array();

        foreach($mylessons_ as $mylesson){
            $mylessons[] = [$mylesson->id, $mylesson->name];
        }
    
        $chats = array();
        foreach($chats_ as $chat){
            $chats[] = [$chat->user_id, $chat->text, $chat->file];
        }

        return view('chat', compact('lesson_name', 'chats', 'lesson_id', 'mylessons'));
    }

    public function addText($lesson_id, Request $request)
    {
        $text=$request->request->get("text");
        $chatroom = new ClassroomChat;
        $chatroom->lesson_id=$lesson_id;
        $chatroom->user_id=Auth::id();
        $chatroom->text=$text;
        $chatroom->save();

        $pass = '/chat_room/' . $lesson_id;

        return redirect($pass);
    }
}
