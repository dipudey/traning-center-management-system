<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
      'name','email','student_id_number','cource_id','batch_id','fathers_name','mothers_name','phone','gurdian_number','sex','graduation','present_address','parmanent_address','picture'
    ];

    public function cource(){
      return $this->belongsTo(Cource::class);
    }

    public function batch(){
      return $this->belongsTo(Batch::class);
    }

    public function payments(){
      return $this->hasOne("App\Model\Payment");
    }

}
