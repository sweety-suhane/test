<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;
use Hash;

class userController extends Controller
{
    public function home(Request $request){
        return view('home');
    }
   
    public function registration(Request $request){
    $username= $request->username;
    $email= $request->email;
    $phone_no= $request->phone_no;
    $password= $request->password;
  
    $data=array(
        'username'=> $username,
        'email'=> $email,
        'phone_no'=> $phone_no,
        'password'=> $password,
    );
    $validator=$this->validator($data);
    if($validator->fails()){
        return response()->json([
            'status'=>201,
            'message'=>$validator->errors()->first()
        ]);
    }

    $register= new User;
    $register->username= $data['username'];
    $register->email= $data['email'];
    $register->phone_no= $data['phone_no'];
    $register->password= Hash::make($data['password']);
    $register->save();
    
    return response()->json([
        'status'=>200,
        'message'=>'user created',
    ]);
    }

    protected function validator(array $data){
        return Validator::make($data,[
            'username'=>['required','string','max:255','unique:users'],
            'email'=>['required','string','max:255','unique:users','email:rfc,dns'],
            'phone_no'=>['required','string','min:10','unique:users'],
            'password'=>['required','min:5'],
        ]);
        
    }

    public function login(Request $request){
        $user = [
            'username'=>$request->username,
            'password'=>$request->password,
        ];
    
        if(Auth::attempt($user)){
            return response()->json([
                'status'=>200,
                'message'=>'user logedin', 
            ]);
            return redirect('welcome');
        }else{
            return back()->witherror(['wrong user....try again!']);
        }

    }
}
