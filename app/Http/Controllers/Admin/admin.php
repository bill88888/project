<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class admin extends Controller
{
    public function adminIndex(){
    	return view('Admin.adminIndex');
    }
}
