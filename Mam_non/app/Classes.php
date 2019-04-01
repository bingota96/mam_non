<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'id', 'class','name_student','age', 'id_users',
    ];
     public function teacher(){
     	return $this->hasMany('App\Teacher','class','id');
     }
}

