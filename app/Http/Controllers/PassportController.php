<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassportController extends Controller
{

    /**
     * user login page
     * @return [type] [description]
     */
    public function login(){
        return view('passport.login');
    }

    /**
     * user register page
     * @return [type] [description]
     */
    public function register(){
        return view('passport.register');
    }
}
