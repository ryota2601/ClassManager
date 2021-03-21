<?php

namespace App\Http\Controllers;

use App\ChatRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Mylesson;
use App\Models\Classroom;
use Illuminate\Support\Facades\Auth;

class ToppageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showTimetable()
    {
        $mylessons=Mylesson::where('user_id', Auth::id())->get();
        $mylesson_ids=array();
        foreach($mylessons as $mylesson){
            $mylesson_ids[] = $mylesson->lesson_id;
        }

        $lessons__ = array();
        foreach($mylesson_ids as $mylesson_id){
            $lessons__[]=Lesson::where('id', $mylesson_id)->get();
        }

        $lessons=array();

        foreach($lessons__ as $lesson_){
            foreach($lesson_ as $lesson){
                $lessons[$lesson->day_id][$lesson->time_id] = $lesson;
            }
        }
        
        $details_ = Classroom::where('user_id', Auth::id())->get();
        $tasks=array();
        $deadlines=array();

        foreach($details_ as $detail){
            $tasks[$detail->lesson_id][$detail->id] = [$detail->task, $detail->deadline, $detail->id];
        }

        return view('timetable.list', compact('lessons', 'tasks', 'deadlines'));
    }

    public function registerLesson(Request $request)
    {
        $time=$request->request->get("time");
        $name=$request->request->get("name");
        $day=$request->request->get("day");
        $lesson_exist = Lesson::where(["name"=>$name, 'time_id'=>$time, 'day_id'=>$day])->first();
        if($lesson_exist === null){
            $lesson = new Lesson;
            $lesson->university_id=1;
            $lesson->department_id=1;
            $lesson->name=$name;
            $lesson->day_id=$day;
            $lesson->time_id=$time;
            $lesson->start_time=new Carbon('2021-04-01');
            $lesson->end_time=new Carbon('2021-07-31');
            $lesson->save();
            $pass = '/addNewLesson/' . $name . '/' . $day . '/' . $time;
            return redirect($pass);
        }else{
            $lesson_id=$lesson_exist->id;
            $mylesson = new Mylesson;
            $mylesson->user_id=Auth::id();
            $mylesson->lesson_id=$lesson_id;
            $mylesson->save();
            return redirect()->route("top_page");
        }
    }

    public function registerNewLesson($name, $day, $time)
    {
        $target_lesson=Lesson::where(["name"=>$name, 'time_id'=>$time, 'day_id'=>$day])->first();
        $lesson_id=$target_lesson->id;
        $mylesson = new Mylesson;
        $mylesson->user_id=Auth::id();
        $mylesson->lesson_id=$lesson_id;
        $mylesson->save();
        return redirect()->route("top_page");
    }
    

    public function registerTask(Request $request)
    {
        $task=$request->request->get("task");
        $deadline=$request->request->get("deadline");
        $lesson_id=$request->request->get("task_lesson_id");
        $classroom = new Classroom;
        $classroom->deadline=$deadline;
        $classroom->task=$task;
        $classroom->user_id=Auth::id();
        $classroom->lesson_id=$lesson_id;
        $classroom->save();
        return redirect()->route("top_page");
    }

    public function deleteTask(Request $request){
        $task_id=$request->request->get("task_id");
        $task = Classroom::where(["user_id"=>Auth::id(), "id"=>$task_id])->first();
        $task->delete();
        return redirect()->route("top_page");
    }

    public function lessonDelete($lesson_id, $day_id, $time_id)
    {
        $lesson = Mylesson::where(["lesson_id"=>$lesson_id, 'user_id'=>Auth::id()])->first();
        $lesson->delete();
        return redirect()->route("top_page");

    } 

    public function chat_room($lesson_id){

        $Chats=ChatRoom::where('lesson_id',$lesson_id)->orderBy('created_date', 'asc')->get();

        return view('chatroom/index',compact($Chats));
    }

}
