<?php

namespace App\Http\Controllers;

use Request;
use Yajra\Datatables\Datatables;
use App\User;
use DB;

class AdminController extends Controller
{
    public function index(){
        $users = User::paginate(10);

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

    public function search(Request $request){
        // dd(request::get('$request'));

        $search = Request::get('search');
        $users = DB::table('users')
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('role', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->paginate(5);
        return view('admin.listofusers', ['users' => $users]);
        
    }

   
//using datatables
  //   public function getUsers(){
  //   	$users = User::select(['id', 'name', 'email', 'role', 'created_at', 'updated_at']);
		// return Datatables::of($users)->make(true);
  //   }
}

