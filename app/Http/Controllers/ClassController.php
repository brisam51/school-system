<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ClassController extends Controller
{


    public function List()
    {
        $data['getallrecord'] = ClassModel::getAllRecord();
        return view('admin.class.list', $data);
    }

    public function NewClass()
    {
        return view('admin.class.addNewClass');
    }

    public function insertNewClass(Request $request)
    {
        $new_class = new ClassModel();
        $ruls = [
            'name' => 'required|min:3|unique:class',

        ];
        $message = [
            'name.required' => 'please insert class name',
            'name.unique' => 'this name is exist',
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


    public function UpdateClassView(Request $request)
    {
        $data['getRecord'] = ClassModel::find($request->id);
        return view('admin.class.updateClass', $data);
    }

    public function updateClassPost(Request $request, $id)
    {
        $update = ClassModel::find($request->id);

        $ruls = [
            'name' => 'required|min:3|unique:class',

        ];
        $message = [
            'name.required' => 'please insert class name',
            'name.unique' => 'this name is existe',
            'name.min' => 'please insert atleaste 3 charecter for class name',

        ];
        $request->validate($ruls, $message);

        if (!empty($request)) {
            $update->name = $request->name;
            $update->status = $request->status;

            $update->save();
            return redirect('admin/class/list')->with('success', 'new class updated successfully..');
        } else {
            return redirect()->route('classUpdateView')->withErrors('errors');
        }
    }
    public function classDelete($id)
    {
        $delete = ClassModel::find($id);
        $delete->delete();
        return redirect('admin/class/list')->with('success', $delete->name . ' : Deleted susccessfully');

    }


    public function pagination($items, $perPage = 4, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage;
        $itemstoshow = array_slice($items, $offset, $perPage);
        return new LengthAwarePaginator($itemstoshow, $total, $perPage);
    }
    public function classSearch(Request $request)
    {


        if (!empty($request)) {

            $query = ClassModel::
                select('class.*', 'users.name as created_by_name')
                ->join('users', 'class.created_by', '=', 'users.id')
                ->where('class.name', 'LIKE', '%' . $request->name . '%')
                ->orderBy('class.id','desc')
                ->paginate(10, ['*'], 'page', $request->page);

            return view('admin.class.search_page', ['query' => $query]);
        }

    }


} //end class
