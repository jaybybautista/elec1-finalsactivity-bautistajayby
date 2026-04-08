<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('students')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            $this->log('LOGIN_FAILED', 'Failed login attempt for email: ' . $request->email);
            return back()->withErrors(['email' => 'Incorrect email or password.'])->withInput();
        }

        Session::put('user_id',    $user->id);
        Session::put('first_name', $user->first_name);
        Session::put('last_name',  $user->last_name);
        Session::put('email',      $user->email);

        $this->log('LOGIN', 'Student logged in: ' . $user->first_name . ' ' . $user->last_name);

        return redirect()->route('dashboard');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name'        => 'required|max:50',
            'last_name'         => 'required|max:50',
            'middle_name'       => 'nullable|max:50',
            'email'             => 'required|email|unique:students,email',
            'password'          => 'required|min:6|confirmed',
            'date_of_birth'     => 'required|date',
            'gender'            => 'required|in:Male,Female,Other',
            'contact_number'    => 'required|digits_between:7,15',
            'address'           => 'required|min:5',
            'course'            => 'required',
            'year_level'        => 'required|in:1,2,3,4',
            'student_id_number' => 'required|unique:students,student_id_number',
        ]);

        $id = DB::table('students')->insertGetId([
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'middle_name'       => $request->middle_name,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'date_of_birth'     => $request->date_of_birth,
            'gender'            => $request->gender,
            'contact_number'    => $request->contact_number,
            'address'           => $request->address,
            'course'            => $request->course,
            'year_level'        => $request->year_level,
            'student_id_number' => $request->student_id_number,
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        $user = DB::table('students')->where('id', $id)->first();

        Session::put('user_id',    $user->id);
        Session::put('first_name', $user->first_name);
        Session::put('last_name',  $user->last_name);
        Session::put('email',      $user->email);

        $this->log('REGISTER', 'New student registered: ' . $user->first_name . ' ' . $user->last_name);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        $name = Session::get('first_name') . ' ' . Session::get('last_name');
        $this->log('LOGOUT', 'Student logged out: ' . $name);
        Session::flush();
        return redirect()->route('login');
    }
    private function log($action, $description)
    {
        DB::table('logs')->insert([
            'user_id'     => Session::get('user_id'),
            'action'      => $action,
            'description' => $description,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}
