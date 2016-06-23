<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Teacher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('surname')->orderBy('name')->get();
        $lessons = [];
        foreach($teachers as $teacher){
            $lessons[$teacher->id]=$teacher->lesson;
        }
        //var_dump($lessons);
        //return $lessons[1]->name;
        return view('home',compact('teachers','lessons'));
    }
}
