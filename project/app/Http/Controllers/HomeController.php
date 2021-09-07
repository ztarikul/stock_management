<?php

namespace App\Http\Controllers;


use App\Models\User;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
    
        return view('home');
       
    }

    public function show(){
        return view('admin.profile');
    }

    public function update(Request $request){

        $user = Auth::user();

        $this->validate( $request, [
            'name' => 'required',
            'email' =>'required|unique:users,email,'.$user->id,
            'password' => 'required|min:6|max: 16'
        ]);

        $user['password'] = Hash::make($request['password']);

        $user->update($request->all());

        return redirect()->route('user.show');
            
    }
 /// SEARCH FUNCION 

}
