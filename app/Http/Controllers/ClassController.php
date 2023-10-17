<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Carbon;

class ClassController extends Controller
{


    public function List()
    {
$data['getallrecord']=ClassModel::getAllRecord();
        return view('admin.class.list',$data);
    }

    public function NewClass()
    {
        return view('admin.class.addNewClass');
    }

    public function insertNewClass(Request $request)
    {
        $new_class = new ClassModel();
        $ruls = [
            'name' => 'required|min:4|unique:class',

        ];
        $message = [
            'name.required' => 'please insert class name',
            'name.unique' => 'this name taked',
            'name.min' => 'please insert atleaste 4 charecter for class name',

        ];
        $request->validate($ruls, $message);

        if (!empty($request)) {
            $new_class->name = $request->name;
            $new_class->status = $request->status;
            $new_class->created_by = Auth()->user()->id;
            $new_class->created_at = Carbon::now();
            $new_class->save();
            return redirect('admin/class/list')->with('success', 'new class added successfully..');
        } else {
            return redirect('admin/class/newclass')->withErrors('errors');
        }

    }

} //end class
