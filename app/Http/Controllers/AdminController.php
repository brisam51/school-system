<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{

    //for display all all admins
    public function adminList()
    {
        $alluser = User::paginate(10);

        $data = 'Admin List';
        return view('admin.all_user', ['data' => $data], compact('alluser'));
    }
    //nvoke new admin page
    public function newAdmin()
    {
        return view('admin.new-admin');
    }
    //insert admin information
    public function insertNewAdmin(Request $request)
    {
        $user = new User;
        $ruls = [
            'name' => 'required|string|min:3',
            'email' => 'email|unique:users',


        ];
        $message = [
            'name.required' => 'you must insert admin Name',
            'name.string' => 'you must insert admin Name as string type',
            'name.min' => 'you must insert atleas three chracter for admin Name',
            'email.required' => 'you insert  email admin',
            'email.email' => 'you must  email admin',
            'email.unique:users' => 'This email uses by anather users',
        ];
        $request->validate($ruls, $message);

        if (!empty($request)) {
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->password = Hash::make($request->password);
            $user->user_type = $request->user_type;
            $user->created_at = Carbon::now();
            $user->save();
            return redirect('admin/list')->with('success', ' New Admin Added To Admin list');
        } else {
            return back()->withErrors('errors');
        }
    }
    //call admin Update admin page
    public function updatAdmin($id)
    {
        $updateAdmin = User::where('id', $id)->first();


        return view('admin.admin-update', ['updateAdmin' => $updateAdmin]);

    }
    //insert new admin info
    public function updateAdminPost($id, Request $request)
    {

        $user = User::where('id', $id)->first();
        $name = $user->name;
        $ruls = [
            'name' => 'required',
            'email' => 'unique:users,email,' . $user->id,

        ];
        $message = [
            'name.required' => 'you must insert admin Name',
            'name.string' => 'you must insert admin Name as string type',
            'name.min' => 'you must insert atleas three chracter for admin Name',

        ];
        $request->validate($ruls, $message);
        if (!empty($request)) {
            $user->name = trim($request->name);

            $user->email = $request->email;

            if (!empty($user->user_type)) {
                $user->user_type = $request->user_type;
            }
            if (!empty($user->password)) {
                $user->password = Hash::make($request->password);
            }

            $user->updated_at = Carbon::now();
            $user->save();
            return redirect('admin/list')->with('success', ' nformation abute: ' . $name . '  updated successfully');
        } else {
            return back()->withErrors('errors');
        }

    }

    //for delete admin record
    public function adminDelete($id)
    {
        $user = User::where('id', $id)->first();
        $name = $user->name;
        $user->delete();

        return redirect('admin/list')->with('success', 'user witn name:' . $name . 'deleted');
    }

    public function AdminSearch(Request $request){

        if(!empty($request)){
            $result=DB::table('users')->where('name','LIKE','%'.$request->name.'%')->get();
            //$paginat=DB::table('users')->paginate(2);
            $alluser=json_decode($result,true);
            $number=count( $alluser);

            return view('admin.search_page',['alluser'=> $alluser ,'numder'=> $number]);


        }


    }

} //End class
