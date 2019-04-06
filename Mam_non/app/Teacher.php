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

      return $this->belongsTo('App\Classes','class','id');
  }

    public function countTeachers() {

        $user_id = Auth::user()->id;
        $count_positions = Self::select('position',DB::raw('count(*) as counter'))->where('id_users', $user_id)->groupBy('position')->get()->toArray();

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

    public function sameTeacher(){

       $id_users = Auth::user()->id;
       return $this->where('id_users',$id_users)->count();
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
        $teacher->class = $request->input('class');
        $teacher->position= $request->input('position');
        $teacher->filesImage =$request->filesImage->getClientOriginalName();
        $teacher->id_users = $id_teacher;    
        $teacher->save();
    }

    public function updateTeacher($id,$request){

    $file = $request->filesImage;
    $data['filesImage'] = DB::table('teacher')->where('id',$id)->value('filesImage');
    $fileName = isset( $file) ?  $file->getClientOriginalName()  : $data['filesImage'] ;

    $teacher = Teacher::where('id' ,$id)->update([
        'teacher' => $request->input('teacher'),
        'born' => $request->input('born'),
        'class' => $request->input('class'),
        'position'=> $request->input('position'),
        'filesImage' =>$fileName,
        
    ]);
    }            
}
