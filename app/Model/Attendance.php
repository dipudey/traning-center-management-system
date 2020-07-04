<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
      'student_id','batch_id','attendance_date','action'
    ];

    public function student(){
      return $this->belongsTo(Student::class);
    }
}
