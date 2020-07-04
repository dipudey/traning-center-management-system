<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
      'student_id','cource_id','paid','due'
    ];

    public function student(){
      return $this->belongsTo(Student::class);
    }

    public function batch(){
      return $this->belongsTo(Batch::class);
    }
}
