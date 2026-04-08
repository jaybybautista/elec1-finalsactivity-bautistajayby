<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = DB::table('students')->where('id', Session::get('user_id'))->first();
        $logs = DB::table('logs')
            ->where('user_id', Session::get('user_id'))
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('screens.dashboard', compact('user', 'logs'));
    }

    public function profile()
    {
        $user = DB::table('students')->where('id', Session::get('user_id'))->first();
        return view('screens.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'middle_name' => 'nullable|max:50',
            'email' => 'required|email|unique:students,email,' . $id,
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'contact_number' => 'required|digits_between:7,15',
            'address' => 'required|min:5',
            'course' => 'required',
            'year_level' => 'required|in:1,2,3,4',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'course' => $request->course,
            'year_level' => $request->year_level,
            'updated_at' => now(),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        DB::table('students')->where('id', $id)->update($data);

        Session::put('first_name', $request->first_name);
        Session::put('last_name', $request->last_name);
        Session::put('email', $request->email);

        DB::table('logs')->insert([
            'user_id' => Session::get('user_id'),
            'action' => 'UPDATE_PROFILE',
            'description' => 'Student updated their profile: ' . $request->first_name . ' ' . $request->last_name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }
}
