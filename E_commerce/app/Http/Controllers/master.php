<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class master extends Controller
{
    public function front_page(){
    	return view('admin.home.homecontent');
    }
}
