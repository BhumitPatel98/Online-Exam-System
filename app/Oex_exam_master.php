<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_exam_master extends Model
{
    protected $fillable = ['title','oex_categories_id','exam_date','status'];

    public function oex_categories()
    {
        return $this->belongsTo(Oex_category::class);
    }

    public function oex_students()
    {
        return $this->hasMany(Oex_students::class);
    }
}
