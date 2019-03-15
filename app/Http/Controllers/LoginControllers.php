<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 3/15/2019
 * Time: 4:27 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllers extends Controller
{
    // login view
    public function viewLogin()
    {
        if(\Auth::check())
        {
            if(Auth::user()->group_id == 1)
            {
                return redirect('dashboard/admin');
            }

        }

        return view('login');
    }

    // login process
    public function processLogin(Request $request)
    {
        if (Auth::attempt(['username' =>$request->get('username'), 'password' =>$request->get('password'),'is_actvie'=>1]))
        {

            if(Auth::user()->group_id == 1)
            {
                return redirect('dashboard/admin');
            }

        }
        else {

            $errors = ['invalid username/password'];
            return redirect()
                ->back()
                ->withErrors($errors);
        }

    }

    // log out
    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect('/');
        }

        return redirect()
            ->back();
    }

}