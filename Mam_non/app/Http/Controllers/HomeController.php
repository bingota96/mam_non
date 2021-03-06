<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use App\User;
use Session;
use Auth;
use Validator;



class HomeController extends Controller
{     

    public function Login()
    {    	
        return view('admin/login');
    }
    public function insertLogin(Request $request)
    {   
    	$email = $request->email;
    	$password = $request->password;

    	if( Auth::attempt(['email' => $email, 'password' =>$password])) {

    		return redirect('dashbroad');
    	}
    	else {
    			$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không chính xác']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    	
    }    
    public function Register( Request $request ){

    	 return view('admin/registration-page');
    }
    public function insertRegister( Request $request )
    {
    	// validate

		    $validator = Validator::make($request->all(), [
        	'name_school' => 'required|max:100',
    		'principal' => 'required|max:50',
    		'address' => 'required|max:200',
    		'email' => 'required|email',
    		'password' =>'required|min:8|max:15',
    		'enter_password' =>'required|same:password',
   			]);

    // Eloquent 

    //validate-jquery

        if ($validator->passes()) {
            
            $user = new User();
            $user->insertUser($request);
            
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);   
        }
      
	}
    
    public function logout(){
        Auth::logout();
        return redirect('login');
    }	
}
