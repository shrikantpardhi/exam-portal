<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
    // $current_date_time = Carbon::now()->toDateTimeString();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $password = Hash::make($request->input('password'));
        $token = $request->input('_token');
        // print_r($request->input());
        $status = DB::insert('INSERT INTO `users`(`id`, `name`, `email`, `mobile`,`password`, `remember_token`, `created_at`) 
        values ( ?, ?, ?, ?, ?, ?, ? )', [null, $name, $email, $mobile, $password, $token, Carbon::now()->toDateTimeString()]);
        if($status == 1)
            echo "success";
        else
            echo "failed";    
    }

    public function read(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $status = DB::select('select id from users where email = ? and password = ?', [$email, $password]);

        if(count($status) == 1)
            echo "login success";
        else
            echo "login failed"; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function login(Request $req){
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // return $req->input();

        $user = User::where(['email'=>$req->email])->first();
        // return $user->password;
        if (!$user || !Hash::check($req->password,$user->password)){
            return "Username or password is not matched";
        } else {
            $req->session()->put('user',$user);
            return redirect('/dashboard');
        }
    }
    
    function register(Request $req){
        
        return User::create();
    }
}
