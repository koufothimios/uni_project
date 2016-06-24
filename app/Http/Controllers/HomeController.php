<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Teacher;
use Auth;
use App\User;
use App\Grade;
use App\Lesson;
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
        $teachers_average = [];
        foreach($teachers as $teacher){
            $lessons[$teacher->id]=$teacher->lesson;
            $teachers_average[$teacher->id]=$teacher->overall_grade();
        }
        $user_id = Auth::user()->id;
        $grades = Grade::where('user_id',$user_id)->get();
        foreach ($grades as $grade) {
            $grades_final[$grade->lesson_id]=$grade->grade;
        }
        //return $grades_final;
        //var_dump($teachers_average);
        //return $lessons[1]->name;
        return view('home',compact('teachers','lessons','grades_final','teachers_average'));
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
        $lesson = Lesson::find($lesson_id);
        session()->flash('teacher_id',$lesson->teacher->id);
        session()->flash('lesson_id',$lesson_id);
        return back();
    }

    public function edit_grade(Request $request)
    {
        $grade_value = $request->grade;
        $lesson_id = $request->lesson_id;
        $user_id = Auth::user()->id;
        DB::table('grades')->where(array('lesson_id'=>$lesson_id,'user_id'=>$user_id))->update(array('grade'=>$grade_value));
        $lesson = Lesson::find($lesson_id);
        session()->flash('teacher_id',$lesson->teacher->id);
        session()->flash('lesson_id',$lesson_id);
        //Alert--{{ucwords(Session::get('flash_message_level'))}}
        return back();
    }
}
