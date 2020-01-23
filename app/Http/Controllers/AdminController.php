<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.admin');
    }

    public function list(){
    	// return view('admin.listofusers');
    	$users = DB::select('select * from users where role!="admin"');
		return view('admin/listofusers',['user'=>$users]);
    }
}
