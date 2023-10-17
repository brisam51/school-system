<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{

    public function List(){
        return view('admin.class.list');
    }

public function NewClass(){
    return view('admin.class.addNewClass');
}

public function insertNewClass(Request $request){
    dd($request->all());

}

}//end class
