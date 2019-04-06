<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'id', 'class','name_student','age', 'id_users',
    ];

    public function teacher(){
     	return $this->hasMany('App\Teacher','class','id');
     }
     
    public function countAges($param,$value){

        $id_users = Auth::user()->id;
        $countAges = Self::select(DB::raw($param))->where('id_users',$id_users)->groupBy($value)->get()->toArray();

        $default= ['2','3','4','5'];
        $age = [];
        $i =0;

        foreach ( $countAges as $countAge ) {
            $age[] = $countAge['age'];
            $i++;
        }

        $missing_posstions = array_diff($default,$age);

        if ( !empty($missing_posstions )){
            foreach ($missing_posstions as $missing_posstion) {
                $value_push = 
                [
                    'age' => $missing_posstion,
                    "age_count" => 0
                ];

                $countAges[$i]=$value_push;
                $i++;
            }

        }
        return $countAges;

    }
    public function totalStu(){

        $id_users = Auth::user()->id;
        return $this->select('name_student')->where('id_users',$id_users)->sum('name_student');
    }

    public function sameClass(){

        $id_users = Auth::user()->id;
        return $this->where('id_users',$id_users)->count();
    }

    public function insert( $request ){

        $id_users = Auth::user()->id;
        $class = new Classes();
        $class->class = $request->input('class');
        $class->age = $request->input('age');
        $class->name_student = $request->input('number_student');
        $class->id_users = $id_users;
        $class->save();
    }

    public function editClass($id,$request){  
        
         Classes::where('id' ,$id)->update([
                'class'=>$request->input('class'),
                'age'=>$request->input('age'),
                'name_student'=>$request->input('number_student'),
            ]);
    }
}
