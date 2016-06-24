<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lesson;
use App\Grade;

class Teacher extends Model
{
    public function lesson(){
        return $this->hasMany(Lesson::class);
    }

    public function overall_grade()
    {
        $grades_final = [];
        $lessons_teached = Lesson::where('teacher_id',$this->id)->get();
        foreach ($lessons_teached as $lesson) {
            $grades = Grade::where('lesson_id',$lesson->id)->get();
            foreach($grades as $grade){
                array_push($grades_final, $grade->grade);
            }
        }
        return Teacher::average($grades_final);
    }

    protected function average($ar)
    {
        $sum=0;
        foreach ($ar as $a) {
            $sum+=floatval($a);
        }
        return number_format((float)($sum/sizeof($ar)), 2);
    }
}
