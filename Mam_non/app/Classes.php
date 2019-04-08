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

    public function teacher(){
     	return $this->hasMany('App\Teacher','classes_id','id');
     }
     
    public function countAges($param,$value){

        $id_users = Auth::user()->id;
        $countAges = Self::select(DB::raw($param))->where('user_id',$id_users)->groupBy($value)->get()->toArray();

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
                    "age_count" => 0,
                    "age_sum" => 0
                ];

                $countAges[$i]=$value_push;
                $i++;
            }

        }
        return $countAges;

    }
    public function totalStu(){

        $id_users = Auth::user()->id;
        return $this->select('name_student')->where('user_id',$id_users)->sum('name_student');
    }

    public function sameClass(){

        $id_users = Auth::user()->id;
        return $this->where('user_id',$id_users);
    }
    public function countAge($id){

        $id_users = Auth::user()->id;
        return $this->where('id',$id)->where('user_id',$id_users);
    }

    public function insert( $request ){

        $id_users = Auth::user()->id;
        $class = new Classes();
        $class->class = $request->input('class');
        $class->age = $request->input('age');
        $class->name_student = $request->input('number_student');
        $class->user_id = $id_users;
        $class->save();
    }

    public function editClass($id,$request){  
        
         Classes::where('id' ,$id)->update([
                'class'=>$request->input('class'),
                'age'=>$request->input('age'),
                'name_student'=>$request->input('number_student'),
            ]);
    }
    public function sort($request){

    $id_users =  Auth::user()->id;

    $class = Classes::withCount('teacher')->where('user_id',$id_users);

    $orderBy = $request->input('orderBy');
    $order = $request->input('order');

    if (isset($orderBy)) {

      $class = $class->orderBy($orderBy, $order);
      $order = (!is_null($order) and $order === 'desc') ? 'asc' : 'desc';

  }
  
    $data['order'] = $order;

    $data['orderBy'] = $orderBy;

    return $data['teacher'] = $class->orderBy('id', 'desc')->paginate(4);

    }
}
