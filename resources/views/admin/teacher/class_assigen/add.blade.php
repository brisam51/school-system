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
            <div class="card-title text-center text-white bg-success">
                <h5>{{ $header_title }}</h5>
            </div>


            <!-- Horizontal Form -->
            <form action="{{ route('assigen.class.insert') }}" method="post">
                @csrf

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Class Name:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="class_id" id="class_id" required>
                            <option value="">Select Class</option>
                            @foreach ($getClass as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- start --}}
                {{-- @if ($profile_data->p_religion == $religion->religion_id) selected @endif --}}

                {{-- end --}}
                <div class="row mb-4">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" style="width: 150px">Teacher
                        Name:</label>

                    @foreach ($getTeacher as $teacher)
                        <div>
                            <label class="form-control">
                                <input type="checkbox" value="{{ $teacher->id }}" name=" teacher_id[]" id=""><img
                                    class="radius-rounded-cilcle" style="width:70px;   border-radius: 50px; "
                                    src="{{ asset('public/images/teachers/' . $teacher->profile_pic) }}" alt="">
                                {{ $teacher->name }} {{ $teacher->last_name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status:</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="0">active</option>
                            <option value="1">inactive</option>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </form><!-- End Horizontal Form -->

        </div>







    @endsection

    {{-- ======================================== --}}

    @section('scripts')
    @endsection
