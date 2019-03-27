<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use Validator;

class DashbroadController extends Controller
{

    public function Dashbroad(){
      	
//table-classes
          $data['tow'] = DB::table('classes')->where('age',2)->count();
          $data['people2'] = DB::table('classes')->where('age',2)->select('name_student')->sum('name_student');

          $data['three'] = DB::table('classes')->where('age',3)->count();
          $data['people3'] = DB::table('classes')->where('age',3)->select('name_student')->sum('name_student');

          $data['four'] = DB::table('classes')->where('age',4)->count();
          $data['people4'] = DB::table('classes')->where('age',4)->select('name_student')->sum('name_student');

          $data['five'] = DB::table('classes')->where('age',5)->count();
          $data['people5'] = DB::table('classes')->where('age',5)->select('name_student')->sum('name_student');
          
//table -teacher
          $data['chinhthuc'] = DB::table('teacher')->where('position','Chính thức')->count();

          $data['thoivu'] = DB::table('teacher')->where('position','Thời vụ')->count();

          $data['thuviec'] = DB::table('teacher')->where('position','Thử việc')->count();

          $data['partime'] = DB::table('teacher')->where('position','Part time')->count();

          $data['totalStu'] =  DB::table('classes')->select('name_student')->sum('name_student');

          $data['sameteacher'] = DB::table('teacher')->count();
          $data['sameClass'] = DB::table('classes')->count();
          $data['user'] = Auth::user();     
  	    	return view('dashbroad.dashbroad',$data);
      }
//end-dashbroad

    public function createClass(){

        
        $data['totalStu'] =  DB::table('classes')->select('name_student')->sum('name_student');
        $data['sameteacher'] = DB::table('teacher')->count();
        $data['sameClass'] = DB::table('classes')->count();
        $data['user'] = Auth::user();  

      return view('classes.createClass',$data);
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
 
      $user = DB::table('classes')->insert([
        'class'=>$request->input('class'),
        'age'=>$request->input('age'),
        'name_student'=>$request->input('number_student'),
      ]);
      return redirect('class');
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
    }
//end-insert-class

    public function editClass($id){
      $data['class1'] = DB::table('classes')->count();
    // if ($data['class'] == null) {
    //     $data['msg'] = 'Does not exist any class !';
    //       return view('classes.edit-classes',$data);
    //   }


      $data['class'] = DB::table('classes')->where('id',$id)->value('class');
      $data['age'] = DB::table('classes')->where('id',$id)->value('age');
      $data['number_student'] = DB::table('classes')->where('id',$id)->value('name_student');

          $data['totalStu'] =  DB::table('classes')->select('name_student')->sum('name_student');
          $data['sameteacher'] = DB::table('teacher')->count();
          $data['sameClass'] = DB::table('classes')->count();
          $data['user'] = Auth::user();              
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
      
      $user = DB::table('classes')->where('id' ,$id)->update([
        'class'=>$request->input('class'),
        'age'=>$request->input('age'),
        'name_student'=>$request->input('number_student'),
      ]);      
      return redirect('class'); 
    }
//end-edit-class

    public function Class(Request $request){

        

                
        $data['totalStu'] = $class->select('name_student')->sum('name_student');
        $data['sameteacher'] = DB::table('teacher')->count();
        $data['sameClass'] = $class->count();
        $data['user'] = Auth::user();

       
        
        $class = DB::table('classes');
        $orderBy = $request->input('orderBy');
        $order = $request->input('order');
        
        if (isset($orderBy)) {

          $class = $class->orderBy($orderBy, $order);
          $order = (!is_null($order) and $order === 'desc') ? 'asc' : 'desc';

        }

        
        $data['order'] = $order;

        $data['orderBy'] = $orderBy;

        $data['class'] = $class->orderBy('id', 'desc')->paginate(4);

      return view('classes.classes',$data);
    }

//end-class

    public function createTeacher(){

        $data['name_class'] = DB::table('classes')->get();

          $data['totalStu'] =  DB::table('classes')->select('name_student')->sum('name_student');
          $data['sameteacher'] = DB::table('teacher')->count();
          $data['sameClass'] = DB::table('classes')->count();
          $data['user'] = Auth::user();        
      return view('teacher.create-teacher',$data);
    }

    public function insertTeacher(Request $request){

      if ($request->hasFile('filesImage')) {
            $file = $request->filesImage;

     //        //Lấy Tên files
            $fileName = $file->getClientOriginalName();
     //        echo '<br/>';

     //        //Lấy Đuôi File
     //      echo 'Đuôi file: ' . $duoi =$file->getClientOriginalExtension();
     //        echo '<br/>';

     //        //Lấy đường dẫn tạm thời của file
     //        echo 'Đường dẫn tạm: ' . $file->getRealPath();
     //        echo '<br/>';

     //        //Lấy kích cỡ của file đơn vị tính theo bytes
     //        echo 'Kích cỡ file: ' . $file->getSize();
     //        echo '<br/>';

     //        //Lấy kiểu file
     //        echo 'Kiểu files: ' . $file->getMimeType();
     //      


      $request->filesImage->storeAs('image', $fileName);
    }
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

      $data['teacher'] = DB::table('teacher')->insert([
        'teacher' => $request->input('teacher'),
        'born' => $request->input('born'),
        'class' => $request->input('class'),
        'position'=> $request->input('position'),
        'filesImage' =>$request->filesImage->getClientOriginalName(),     
      ]);
      return redirect('teacher');

    } 

//end-insert-teacher    

   public function editTeacher($id){

      $data['teacher'] = DB::table('teacher')->where('id',$id)->value('teacher');
      $data['born'] = DB::table('teacher')->where('id',$id)->value('born');
      $data['class'] = DB::table('teacher')->where('id',$id)->value('class');
      $data['position'] = DB::table('teacher')->where('id',$id)->value('position');
      $data['filesImage'] = DB::table('teacher')->where('id',$id)->value('filesImage');


      $data['name_class'] = DB::table('classes')->get();

      
          $data['totalStu'] =  DB::table('classes')->select('name_student')->sum('name_student');
          $data['sameteacher'] = DB::table('teacher')->count();
          $data['sameClass'] = DB::table('classes')->count();
          $data['user'] = Auth::user();  
      
      return view('teacher.edit-teacher',$data);

    }

    public function updateTeacher(Request $request,$id){

      //update-Image
      if ($request->hasFile('filesImage')) {
        $file = $request->filesImage;
        $fileNameNew = $file->getClientOriginalName();
        $request->filesImage->storeAs('image', $fileNameNew);
      }
        $file = $request->filesImage;
        $data['filesImage'] = DB::table('teacher')->where('id',$id)->value('filesImage');
        $fileName = isset( $file) ?  $file->getClientOriginalName()  : $data['filesImage'] ;

        
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

      $data['teacher'] = DB::table('teacher')->where('id' ,$id)->update([
        'teacher' => $request->input('teacher'),
        'born' => $request->input('born'),
        'class' => $request->input('class'),
        'position'=> $request->input('position'),
        'filesImage' =>$fileName,
            
      ]);
      return redirect('teacher');

    }  
//end-edit-teacher

  public function Teacher(Request $request){

    $data['totalStu'] = DB::table('classes')->select('name_student')->sum('name_student');
    $data['sameteacher'] = DB::table('teacher')->count();
    $data['sameClass'] = DB::table('classes')->count();
    $data['user'] = Auth::user();  
    $teacher = DB::table('teacher');
   

    $orderBy = $request->input('orderBy');
    $order = $request->input('order');

    if (isset($orderBy)) {

      $teacher = $teacher->orderBy($orderBy, $order);
      $order = (!is_null($order) and $order === 'desc') ? 'asc' : 'desc';

    }

    
    $data['order'] = $order;

    $data['orderBy'] = $orderBy;

    $data['teacher'] = $teacher->orderBy('id', 'desc')->paginate(4);

    return view('teacher.teacher', $data);
  }
  
  // public function postTeacher(Request $request){

  // if ($request->all()){
  //   $data['teacher'] = DB::table('teacher')->orderBy('teacher')->paginate(4);
  // }
  //   $data['totalStu'] =  DB::table('classes')->select('name_student')->sum('name_student');
  //   $data['sameteacher'] = DB::table('teacher')->count();
  //   $data['sameClass'] = DB::table('classes')->count();
  //   $data['user'] = Auth::user(); 
  //   return view('teacher.teacher',$data);
  // }
//end-teacher

  public function destroyTeacher(Request $request,$id){

    $data['teacher'] = DB::table('teacher')->where('id' ,$id)->delete();
  }

  public function destroyClass(Request $request,$id){

    $data['teacher'] = DB::table('classes')->where('id' ,$id)->delete();
  }
}
