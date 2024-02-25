@extends('layouts.master')

@section('title')
    Add New Class Subject
@endsection

@section('maintopic')

@endsection

@section('homepage')



@section('secondpage')
@endsection
{{-- ======================================== --}}
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif
    @if (session()->has('success'))
        <div class="alert alert-secondary" role="alert">{{ session('success') }}</div>
    @endif
</div>
</div>
@section('content')





    <div class="card bg-secondary text-white">
        <div class="card-body  ">
            <div class="d-flex justify-content-end mt-2">
                <a href="{{ url('admin/teacher/assigen_class_teacher/list') }}  " class="btn btn-primary">Back</a>
            </div>
            <div class="card-title text-center text-white ">
                <h5>{{ $header_title }}</h5>

            </div>


            <!-- Horizontal Form -->
            <form action="{{ route('assigen.class.update',$getRecord->class_id) }}" method="post">
                @csrf

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Class Name:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="class_id" id="class_id" required>
                            <option value="">Select Class</option>
                            @foreach ($getClass as $class)
                                <option {{ $getRecord->class_id == $class->id ? 'selected' : '' }}
                                    value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" style="width: 150px">Teacher
                        Name:</label>



                    @foreach ($getTeacher as $teacher)
                        <label class="form-control">

                            @php
                                $checked = '';
                            @endphp

                            @foreach ($getAssigenTeacherID as  $teacherID)
                             @if ($teacherID->teacher_id==$teacher->id)
                           @php
                           $checked = 'checked';
                           @endphp
                             @endif
                            @endforeach
                            <input
                            {{ $checked }}
                            type="checkbox"
                             name=" teacher_id[]"
                             id=""
                              value="{{ $teacher->id }}">

                            <img class="radius-rounded-cilcle" style="width:70px;   border-radius: 50px; "
                                src="{{ asset('public/images/teachers/' . $teacher->profile_pic) }}" alt="">

                            {{ $teacher->name }} {{ $teacher->last_name }}

                        </label>

                    @endforeach
                </div>

        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Status:</label>
            <div class="col-sm-10">
                <select name="status" id="status" class="form-control">
                    <option @selected( old('status',$getRecord->status)==0 ) value="0">active</option>
                    <option @selected(old('status',$getRecord->status)==1 )  value="1">inactive</option>
                </select>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>

        </div>
        </form><!-- End Horizontal Form -->

    </div>







@endsection

{{-- ======================================== --}}

@section('scripts')
@endsection
