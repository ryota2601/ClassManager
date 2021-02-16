<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToppageController extends Controller
{
    //
    public function showTimetable() 
    {
        return view('timetable.list');
    }

    public function addForm()
    {
        return view('timetable.addForm');
    }

    public function exeAdd(Request $request)
    {
        Toppage::create();
        \Session::flash('eer_msg', '授業を登録しました');
        return redirect(route('/'));
    }
}
