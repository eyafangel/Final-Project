<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use DB;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.admin');
    }

    public function list(){
		return view('admin/listofusers');
    }
    public function getUsers(){
    	$users = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);
		return Datatables::of($users)->make(true);
    }
}
