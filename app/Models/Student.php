<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'classrooms_id', 'gender'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classrooms_id');
    }
}
