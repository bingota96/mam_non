<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use Validator;
use App\Classes;
use App\Teacher;

class DashbroadController extends Controller
{

    public function Dashbroad(){

            $data['teacher'] = new Teacher();

            $data['class'] = new Classes(); 

            $data['ageCount']= $data['class']->countAges('count(*) as age_count, age','age');

            $data['ageSum']= $data['class']->countAges('SUM(name_student) as age_sum, age','age');

        return view('dashbroad.dashbroad',$data);
    }
    
//end-dashbroad

    public function createClass(){

        return view('classes.createClass');
    }

    public function insertClass(Request $request) {

        $getInput = Input::all();
        $rules = [
            'class' =>'required|max:30',
            'age' => 'required',
            'number_student' => 'required',
        ];

        $messages = [
            'required' =>  'Trường :attribute là bắt buộc.',   
            'max' => 'Trường :attribute không lớn hơn :max.',
            

        ];
        $validator = Validator::make($getInput, $rules, $messages);

        if( $validator->fails() ){
            return redirect()->back()
            ->withInput()
            ->withErrors( $validator );
        }

        $insert = new Classes();
        $insert->insert($request);

        return redirect('class');
    }
// Cách 2
    //   $messages = [
    //     'required' => 'Trường :attribute bắt buộc nhập.',
        
    // ];
    // $validator = Validator::make($request->all(), [
    //         'class' =>'required|max:30',
    //     'age' => 'required',
    //     'number_student' => 'required|min:10',

    //     ], $messages);

        //   if( $validator->fails() ){
        // return redirect()->back()
        //                  ->withInput()
        //                  ->withErrors( $validator );
      // }

// Cách 3
     // $validator = $request->validate([
     //        'class'     => 'required|max:30',
     //        'age'    => 'required',
     //        'number_student' => 'required|min:2',           
     //    ]);
     
//end-insert-class

    public function editClass($id){

      $data = new Classes();
      $data['class']= $data->countAge($id);

      return view('classes.edit-classes',$data);
  }

    public function updateClass(Request $request,$id ){

      $getInput = Input::all();
      $rules = [
        'class' =>'required|max:30',
        'age' => 'required',
        'number_student' => 'required',
    ];

    $messages = [
        'required' =>  'Trường :attribute là bắt buộc.',   
        'max' => 'Trường :attribute không lớn hơn :max.',
        
    ];

    $validator = Validator::make($getInput, $rules, $messages);

    if( $validator->fails() ){
        return redirect()->back()
        ->withInput()
        ->withErrors( $validator );
    }
    
    $editClass =  new Classes();
    $editClass->editClass($id,$request);

    return redirect('class'); 
}
//end-edit-class

public function Class(Request $request){

    $class = new Classes();
    $data['class'] = $class->sort($request);


  return view('classes.classes',$data);
}

//end-class

public function createTeacher(){       

    $class= new Classes();
    $data['name_class'] = $class->sameClass()->get();

   return view('teacher.create-teacher',$data);
}

public function insertTeacher(Request $request){

    $getInput = Input::all();

    $rules = [
        "teacher" => 'required|max:50',
        'born' =>'required',
        'position' =>'required',
        'filesImage' =>'required|image|mimes:jpeg,png,jpg,gif|max:3072',
    ]; 

    $messages = [
        'required' => 'Trường :attribute là bắt buộc.',
        'max' => 'Quá :max kí tự.',
        'image' => 'Bắt buộc là ảnh',
        'mimes' =>' ',
    ];

    $validator = Validator::make($getInput,$rules,$messages);

    if( $validator ->fails()){
        return redirect()->back()
        ->withInput()
        ->withErrors($validator);
    }

    $insertTeacher = new Teacher();
    $insertTeacher->insertTeacher($request);

    return redirect('teacher');

} 

//end-insert-teacher    

public function editTeacher($id){

    $teacher = new Teacher();
    $data['teacher'] = $teacher->countTeacher($id);

    $class= new Classes();
    $data['name_class'] = $class->sameClass()->get();

  
  return view('teacher.edit-teacher',$data);

}

public function updateTeacher(Request $request,$id){

    // Valiadte
    $getInput = Input::all();

    $rules = [
        "teacher" => 'required|max:50',
        'born' =>'required',
        'position' =>'required',

    ]; 

    $messages = [
        'required' => 'Trường :attribute là bắt buộc.',
        'max' => 'Quá :max kí tự.',
    ];

    $validator = Validator::make($getInput,$rules,$messages);

    if( $validator ->fails()){
        return redirect()->back()
        ->withInput()
        ->withErrors($validator);
    }

    $updateTeacher = new Teacher();
    $updateTeacher->updateTeacher($id,$request);

return redirect('teacher');

}  
//end-edit-teacher

public function Teacher(Request $request){


    $class = new Teacher();
    $data['teacher'] = $class->sort($request);
  return view('teacher.teacher', $data);
}

//end-teacher

    public function destroyTeacher($id){

       $delete =Teacher::find($id)->delete();

    }

    public function destroyClass($id){

    $delete =Classes::find($id)->delete();
            
    }
}
