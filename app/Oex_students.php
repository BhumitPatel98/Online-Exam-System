<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_students extends Model
{
    protected $fillable = ['name','email','mobile_no','oex_exam_masters_id','dob','password','status'];

    public function oex_exam_masters()
    {
        return $this->belongsTo(Oex_exam_master::class);
    }
}
