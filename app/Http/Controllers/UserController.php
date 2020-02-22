<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{

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
            'password' => bcrypt($request->password),
            'start_date' => $request->start_date
        ]);
        
        
        return redirect('admin');    
    }

    public function edit(User $user){
        
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        // $user = Auth::user();

        // $data = $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required',
        // ]);

        // $user->name = $data['name'];
        // $user->email = $data['email'];

        // $user->save();

        $user->update($request->all());

        return redirect()->route('admin.listofusers');
    }

    public function destroy(User $user){

    }

}
