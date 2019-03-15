<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashbroadController extends Controller
{
    public function Dashbroad(){
    	return view('dashbroad/dashbroad');
    }
}
