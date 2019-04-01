<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $table='teacher';
    public $timestamp=false;

    public function classes(){
     	return $this->belongsTo('App\Classes','class','id');
    }
}
