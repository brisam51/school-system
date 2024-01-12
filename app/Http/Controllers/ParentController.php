<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Hash;
use Auth;
use Illuminate\Support\Carbon;
use Str;
use File;
use App\Models\User;
use App\Http\Requests\ParentUpdeteRequest;


class ParentController extends Controller
{
    public function List()
    {
        $data['getParent'] = User::getParents();

        $data['header_title'] = 'Parents list';
        return view('admin.parent.list', $data);
    }

    public function Add()
    {
        $data['new_Parent'] = 'Add New Parent';
        return view('admin.parent.add', $data);
    }

    public function Insert(Request $request)
    {
        $ruls = [
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'email' => 'required|email|unique:users',
            'Password' => 'required',
            'mobile_number' => 'required',
            'occupation' => 'required',
            'address' => 'required',

        ];
        $messages = [
            'name.required' => 'please insert First name',
            'last_name.required' => 'please insert Last name',
            'gender.required' => 'please select gender',
            'status.required' => 'please select status',
            'email.required' => 'please insert email',
            'email.unique' => 'This email is exist in user data base please select new emaile',
            'Password.required' => 'please insert Password',
            'mobile_number.required' => 'please insert mobile_number',
            'occupation.required' => 'please insert occupation',
            'address.required' => 'please insert address',


        ];
        $request->validate($ruls, $messages);


        $parent = new User();
        if (!empty($request)) {
            $parent->name = trim($request->name);
            $parent->last_name = trim($request->last_name);
            $parent->gender = trim($request->gender);
            $parent->status = trim($request->status);
            $parent->email = trim($request->email);
            $parent->Password = trim(Hash::make($request->Password));
            $parent->mobile_number = trim($request->mobile_number);
            $parent->address = trim($request->address);
            $parent->user_type = 4;
            $parent->occupation = trim($request->occupation);
            $parent->created_at = Carbon::now();

            //  $newImagename = time() . '-' . $request->name . '.' . $request->profile_pic->extension();
            if ($request->hasFile('profile_pic')) {
                $newImagename = time() . '-' . $request->name . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('asstes/img/profile/parents'), $newImagename);
                $parent->profile_pic = $newImagename;

            }

            $parent->save();
            return redirect()->route('admin.parent.list')->with('succsses', 'new parent data added successfully');
        } else {
            return back()->withErrors('errors')->withInput();

        }

    } //end insert function
    public function Edit($id)
    {
        $data['getParent'] = User::where('id', $id)->first();
        $data['header_title'] = 'Edit Parent Information';
        return view('admin.parent.edit', $data);
    }
    // ParentUpdeteRequest
    public function Update(Request $request, $id)
    {
        $parent = User::getSingle($id);
        $ruls = [
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'email' => 'required',
            //'Password' => 'required',
            'mobile_number' => 'required',
            'occupation' => 'required',
            'address' => 'required'
        ];
        $messages = [
            'name.required' => 'please insert parent name',
            'last_name.required' => 'please insert parent  last name',
            'gender.required' => 'please select parent gender',
            'status.required' => 'please select parent status',
            'email' => 'unique:users,email,' . $parent->id,
            'occupation.required' => 'please insert parent ccupation',
            'addless.required' => 'please insert parent address',
        ];


        if (!empty($request)) {
            $parent->name = $request->name;
            $parent->name = $request->name;
            $parent->last_name = $request->last_name;
            $parent->gender = $request->gender;
            $parent->status = $request->status;
            $parent->email = $request->email;
            $parent->occupation = $request->occupation;
            $parent->mobile_number = $request->mobile_number;
            $parent->address = $request->address;

            if ($request->hasFile('profile_pic')) {
                //     $fileNameExt = $request->file('profile_pic')->getClientOriginalName();
                // $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                // $fileExt = $request->file('profile_pic')->getClientOriginalExtension();
                // $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
                // $pathToStore = $request->file('profile_pic')->storeAs('public/images',$fileNameToStore);
                //    $parent->profile_pic =$pathToStore;
                // $request->validate($ruls, $message);
                // $newImagename = time() . '-' . $request->name . '.' . $request->profile_pic->extension();
                // $request->profile_pic->move(public_path('assets/img/profile'), $newImagename);

                $newImage = time() . '-' . $parent->name . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('asstes/img/profile/parents'), $newImage);
                $request->validate($ruls, $messages);
                // $parent

                $image_path ='asstes/img/profile/parents/' . $parent->profile_pic;

                if(File::exists($image_path)){
                    File::deleteDirectory($image_path);
                }
                $parent->profile_pic = $newImage;
            }


                $parent->save();
                return redirect()->route('admin.parent.list')->with('success', 'parent information updeted succefully');
            } else {
                return back()->withErrors('errors')->withInput();
            }


        }
public function Delete($id){


    $parent=User::find($id);
    if(!empty($parent->profile_pic)){
        $image_path ='asstes/img/profile/parents/' . $parent->profile_pic;
        if(File::exists($image_path)){
            File::delete(public_path(). $image_path);
        }
    }


    $parent->delete();
   return back()->with('success','Iformation of:('.$parent->name .')deleted successfully');
}

} //end class