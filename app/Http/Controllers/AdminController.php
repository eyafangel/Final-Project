<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use DB;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin.listofusers', ['users' => $users]);
    }

    public function create(){
        return view('admin.create_user');
    }

    public function store(Request $request){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);
        
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'start_date' => $request->start_date
        ]);
        
        
        return redirect('admin/user');    
    }

    public function edit(User $user){
        
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user){

        $user->update($request->all());

        return redirect()->route('user.index');
    }

    public function destroy(User $user){
        $user->delete();
        
        return redirect()->route('user.index');
    }

    public function show(User $user){

    }

   
//using datatables
  //   public function getUsers(){
  //   	$users = User::select(['id', 'name', 'email', 'role', 'created_at', 'updated_at']);
		// return Datatables::of($users)->make(true);
  //   }
}
