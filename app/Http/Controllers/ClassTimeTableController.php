<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use Illuminate\Http\Request;

class ClassTimeTableController extends Controller
{
    public function list(Request $request)
    {
        $data['header_title'] = 'Calss Time Table List';
        $data['getClass'] = ClassModel::getClass();
        if (!empty($request->class_id)) {
            $data['getSubject'] = ClassSubjectModel::mySubject($request->class_id);
        }


        return view('admin.class_time_table.list', $data);
    }

    function get_subject(Request $request)
    {

        $getSubject = ClassSubjectModel::mySubject($request->class_id);
        $html = "<option value=''>Select</option>";
        foreach ($getSubject as $value) {
            $html .= "<option value='" . $value->subject_id . "'>" . $value->subject_name . "</option>";
        }
        $json['html'] = $html;
        echo json_encode($json);
    }




}//End Class..
