<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class AdminController extends Controller
{
    public function index(){
       $users = User::paginate(5);

        return view('admin.listofusers', ['users' => $users]);
    }

    public function search(Request $request){
        // dd(request::get('$request'));

        $search = $request->get('search');
        $users = DB::table('users')
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('role', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->paginate(5);
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
        
        if ($user) {
           $request->session()->flash('success', 'User successfully added!');
           return redirect('admin/user');
        }else{
            $request->session()->flash('warning', 'User not added!');
            return redirect()->route('admin.create_user');
        }
            
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

    
}

