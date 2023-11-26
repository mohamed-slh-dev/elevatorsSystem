<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function users(){

        $users = User::all();

        return view('users',compact('users'));
    }


    public function addUser(Request $request){

        $user = new User();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);


        if (!empty($request->file('image'))) {
            
            $image = 'elevator-' . time() . '.' . $request->file('image')->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('public/users',$image);
    
            $user->image = $image;

        }

        $user->save();

        return redirect()->back()->with('success', 'تم إضافة مستخدم بنجاح');
    } //end function







    // ---------------------------------------------------------------------------------

    public function updateUser(Request $request){

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;



        // : update password if not empty
        if (!empty($request->password)) {

            $user->password = Hash::make($request->password);

        } //end if



        // : upload if available
        if (!empty($request->file('image'))) {
            
            $image = 'elevator-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/users',$image);
    
            $user->image = $image;
            

            // :update user_img session
            session()->put('user_img',$user->image);

            
        } // end if


        $user->save();


        return redirect()->back()->with('success','تم تعديل المستخدم بنجاح');

    } // end function


} // end controller
