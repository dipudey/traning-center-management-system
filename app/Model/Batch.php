<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
      'batch_name','cource_id'
    ];

    public function cource(){
      return $this->belongsTo(Cource::class);
    }

    public function students(){
      return $this->hasMany(Student::class);
    }
}
