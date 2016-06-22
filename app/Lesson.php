<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function grade(){
        return $this->hasMany(Grade::class);
    }

}
