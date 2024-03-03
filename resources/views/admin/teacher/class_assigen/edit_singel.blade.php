@extends('layouts.master')

@section('title')

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
            <form action="{{ route('assigen_classtoTecher.update', $getRecord->id) }}" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Class Name:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="class_id" id="class_id" required>
                            <option value="">Select Class</option>
                            @foreach ($getClass as $class)
                                <option {{ $getRecord->class_id == $class->id ? 'selected' : '' }}
                                    value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label" >Teacher
                        Name:</label>
                        <div class="col-sm-8">
                            <select name="teacher_id" class="form-control" id="">
                                <option value="">Selecte Teacher</option>
                                @foreach ($getTeacher as $teacher)
                                    <option {{ $getRecord->teacher_id == $teacher->id ? 'selected' : '' }} value="{{ $teacher->id }}">
                                        {{ $teacher->name   }}  {{ $teacher->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Status:</label>
                    <div class="col-sm-8">
                        <select name="status" id="status" class="form-control">
                            <option @selected(old('status', $getRecord->status) == 0) value="0">active</option>
                            <option @selected(old('status', $getRecord->status) == 1) value="1">inactive</option>
                        </select>
                    </div>
                </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>
@endsection
@section('scripts')
@endsection
