<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    protected $fillable = [
      'cource_name','cource_amount','cource_duration','cource_details'
    ];

    public function batch(){
      return $this->hasMany(Batch::class);
    }

    public function students(){
      return $this->hasMany(Student::class);
    }
}
