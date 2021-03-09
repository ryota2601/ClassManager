<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lesson;
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
        $lessons_=Lesson::where('user_id', Auth::id())->get();

        $lessons=array();

        foreach($lessons_ as $lesson){
            $lessons[$lesson->day_id][$lesson->time_id] = $lesson;
        }

        $details_ = Classroom::where('user_id', Auth::id())->get();
        $tasks=array();
        $deadlines=array();

        foreach($details_ as $detail){
            $tasks[$detail->lesson_id][$detail->id] = [$detail->task, $detail->deadline];
            $deadlines[$detail->lesson_id][$detail->id] = $detail->deadline;
        }

        return view('timetable.list', compact('lessons', 'tasks', 'deadlines'));
    }

    public function addForm()
    {
        return view('timetable.addForm');
    }

    public function registerLesson(Request $request)
    {
        $time=$request->request->get("time");
        $name=$request->request->get("name");
        $day=$request->request->get("day");
        $lesson = Lesson::firstOrNew(["user_id"=>Auth::id(), "time_id"=>$time,  "day_id"=>$day]);
        $lesson->university_id=1;
        $lesson->department_id=1;
        $lesson->user_id=Auth::id();
        $lesson->name=$name;
        $lesson->day_id=$day;
        $lesson->time_id=$time;
        $lesson->start_time=new Carbon('2021-04-01');
        $lesson->end_time=new Carbon('2021-07-31');
        $lesson->save();
        return redirect()->route("top_page");
    }

    public function resisterTask(Request $request)
    {
        $task=$request->request->get("task");
        $deadline=$request->request->get("deadline");
        $classroom = Classroom::firstOrNew(["user_id"=>Auth::id()]);
    }

    public function lessonDelete($day_id, $time_id)
    {
        $lesson = Lesson::where(["user_id"=>Auth::id(), "time_id"=>$time_id,  "day_id"=>$day_id])->first();
        $lesson->delete();
        return redirect()->route("top_page");
    }
}
