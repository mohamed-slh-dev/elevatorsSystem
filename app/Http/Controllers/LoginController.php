<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {

    public function login(Request $request) {

        return view('login');
        
    } //end function

} // end controller
