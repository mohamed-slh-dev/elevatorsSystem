<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {

    public function login() {
        
        // ? session still active
        if (session('username')) {

            return redirect()->route('dashboard');

        } // end if

        return view('login');
        
    } //end function



    // =============================================



    public function checkLogin(Request $request) {
        
        
        // :check login information
        $user = User::where('username', $request->username)->first();

        if (!empty($user)) {


            // :check password
            if (Hash::check($request->password, $user->password)) {
                
                // :make username session
                $request->session()->put('username', $user->username);

                return redirect()->route('dashboard');

            // :wrong password
            } else {

                return back()->with('warning', 'كلمة المرور غير صحيحة');

            } // end else

        } // end if


        // ! not authenticated
        return back()->with('warning', 'إسم المستخدم غير صحيح');

    } //end function




    // =============================================



    public function logout(Request $request) {

        
        // ? session still active
        if (session('username')) {

            $request->session()->forget('username');

        } // end if

        return redirect()->route('login');
        
    } //end function



} // end controller
