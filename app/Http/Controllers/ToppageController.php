<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lesson;

class ToppageController extends Controller
{
    //
    public function showTimetable()
    {
        $lessons=Lesson::all();

        return view('timetable.list',array("lessons"=>$lessons));
    }

    public function addForm()
    {
        return view('timetable.addForm');
    }

    public function registerForm(Request $request)
    {

        $time=$request->request->get("time");
        $name=$request->request->get("name");
        $day=$request->request->get("day");
        $lesson = new Lesson();
        $lesson->university_id=1;
        $lesson->department_id=1;
        $lesson->name=$name;
        $lesson->day_id=$day;
        $lesson->time_id=$time;
        $lesson->start_time=new Carbon('2021-04-01');
        $lesson->end_time=new Carbon('2021-07-31');
        $lesson->save();
        \Session::flash('eer_msg', '授業を登録しました');
        return redirect()->route("top_page");
    }
}
