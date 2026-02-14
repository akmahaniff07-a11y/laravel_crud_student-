<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Classroom;

class Student extends Model
{
    protected $fillable = ['name', 'classrooms_id', 'gender'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classrooms_id');
    }
}
