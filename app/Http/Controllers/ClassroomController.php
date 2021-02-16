<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    //
    public function addClass() 
    {
        return view('class_room.addClass');
    }
}
