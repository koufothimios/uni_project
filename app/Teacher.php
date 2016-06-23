<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function lesson(){
        return $this->hasMany(Lesson::class);
    }
}
