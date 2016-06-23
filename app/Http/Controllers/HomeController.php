<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Teacher;
use Auth;
use App\User;
use App\Grade;
use DB;

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
        $grades_final = [];
        foreach($teachers as $teacher){
            $lessons[$teacher->id]=$teacher->lesson;
        }
        $user_id = Auth::user()->id;
        $grades = Grade::where('user_id',$user_id)->get();
        foreach ($grades as $grade) {
            $grades_final[$grade->lesson_id]=$grade->grade;
        }
        //return $grades_final;
        //var_dump($lessons);
        //return $lessons[1]->name;
        return view('home',compact('teachers','lessons','grades_final'));
    }

    public function save_grade(Request $request)
    {
        $grade_value = $request->grade;
        $lesson_id = $request->lesson_id;
        $user_id = Auth::user()->id;
        $grade = new Grade;
        $grade->grade=$grade_value;
        $grade->lesson_id=$lesson_id;
        $grade->user_id=$user_id;
        $grade->save();
        return back();
    }

    public function edit_grade(Request $request)
    {
        $grade_value = $request->grade;
        $lesson_id = $request->lesson_id;
        $user_id = Auth::user()->id;
        DB::table('grades')->where(array('lesson_id'=>$lesson_id,'user_id'=>$user_id))->update(array('grade'=>$grade_value));
        return back();
    }
}
