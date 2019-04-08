<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Teacher extends Model
{

    protected $table ='teacher';
    public $timestamp = false;

    public function classes(){

      return $this->belongsTo('App\Classes','classes_id','id');
  }

    public function countTeachers() {

        $user_id = Auth::user()->id;
        $count_positions = Self::select('position',DB::raw('count(*) as counter'))->where('user_id', $user_id)->groupBy('position')->get()->toArray();

        $defaults = ['Chính thức','Thời vụ', 'Thử việc','Part time'];

        $position = [];
        $i = 0;
        foreach ($count_positions as $count_position) {
            $position[] = $count_position['position'];
            $i++;
        }

        $missing_posstions = array_diff($defaults,$position);
        // dd($missing_posstions);
        if (!empty($missing_posstions)){

            foreach ($missing_posstions as $missing_posstion  ) {

                $value_push = [
                    'position' => $missing_posstion,
                    'counter' => 0,                   
                ];

                $count_positions[$i] = $value_push;
                $i++;

            }   
        }

        return $count_positions;
    }   
    public function countTeacher($id){

        $id_users = Auth::user()->id;
        return $this->where('id',$id)->where('user_id',$id_users);
    }
    public function sameTeacher(){

       $id_users = Auth::user()->id;
       return $this->where('user_id',$id_users);
    }

    public function insertTeacher($request){
        
    if ($request->hasFile('filesImage')) {

        $file = $request->filesImage;
        $fileName = $file->getClientOriginalName();
        $request->filesImage->storeAs('image', $fileName);
    }
        $id_teacher = Auth::user()->id; 
        $teacher = new Teacher;
        $teacher->teacher = $request->input('teacher');
        $teacher->born = $request->input('born');
        $teacher->classes_id = $request->input('class');
        $teacher->position= $request->input('position');
        $teacher->filesImage =$request->filesImage->getClientOriginalName();
        $teacher->user_id = $id_teacher;    
        $teacher->save();
    }

    public function updateTeacher($id,$request){

    $file = $request->filesImage;
    $data['filesImage'] = DB::table('teacher')->where('id',$id)->value('filesImage');
    $fileName = isset( $file) ?  $file->getClientOriginalName()  : $data['filesImage'] ;

    $teacher = Teacher::where('id' ,$id)->update([
        'teacher' => $request->input('teacher'),
        'born' => $request->input('born'),
        'classes_id' => $request->input('class'),
        'position'=> $request->input('position'),
        'filesImage' =>$fileName,
        
    ]);
    } 
    public function sort($request){

    $id_users =  Auth::user()->id;

    $class = Teacher::withCount('classes')->where('user_id',$id_users);

    $orderBy = $request->input('orderBy');
    $order = $request->input('order');

    if (isset($orderBy)) {

      $class = $class->orderBy($orderBy, $order);
      $order = (!is_null($order) and $order === 'desc') ? 'asc' : 'desc';

  }
  
    $data['order'] = $order;

    $data['orderBy'] = $orderBy;

    return $data['class'] = $class->orderBy('id', 'desc')->paginate(4);

    }           
}
