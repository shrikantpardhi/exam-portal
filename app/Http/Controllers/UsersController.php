<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
        return view('student.index');
    }
    public function loginview()
    {
        return view('login');
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:filter',
            'mobile' => 'required|digits:10',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email id is required',
            'mobile.required' => 'Mobile number is required',
            'password.required' => 'Password is required',
        ]);

        // if validation success then create an input array
        $inputArray = array(
            'name'      =>      $request->name,
            'email'     =>      $request->email,
            'mobile'    =>      $request->mobile,
            'password'  =>      Hash::make($request->password)
        );
        $user = User::create($inputArray);

        if(!is_null($user)) {
            return back()->with('success', 'You have registered successfully.');
        }
        else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }
    }

    public function read(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email id is required',
            'password.required' => 'Password is required'
        ]);
        $inputArray = array(
            'email'     =>      $request->email,
            'password'  =>      $request->password
        );
        $userCredentials = $request->only('email', 'password');
        if (Auth::attempt($userCredentials)) {
            $request->session()->regenerate();
            return redirect('/student')->with('success', 'Login Successful.');
            // return redirect('/student')->intended('/student');
        }
        else {
            return back()->with('error', 'Whoops! invalid username or password.');
        }
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

    // ------------------- [ User logout function ] ----------------------
    public function logout(Request $request ) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
