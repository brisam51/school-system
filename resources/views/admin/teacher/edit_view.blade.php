@extends('layouts.master')

@section('title')
@endsection

@section('maintopic')
@endsection

@section('homepage')
@endsection


@section('secondpage')
@endsection
{{-- ======================================== --}}

@section('content')
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
    </div>
    <div class="card" style="background-color: grey; color:antiquewhite">
        <div class="card-header">Header</div>
        <div class="card-body">

            <form action="{{ url('admin/teacher/update',$teacher->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col">

                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $teacher->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option {{ (old('gender', $teacher->gender)=='Male')? "selected" : "" }} value="Male">Male</option>
                                <option {{ (old('gender', $teacher->gender)=='FeMale')? "selected" : "" }}  value="Femal">FeMale
                                </option>
                                <option {{ (old('gender', $teacher->gender)=='others')? "selected" : "" }} value="other">Others
                                </option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select status</option>
                                <option {{ old('status',$teacher->status) == '0' ? 'selected' : '' }} value="0">Avtive</option>
                                <option {{ old('status',$teacher->status) == '1' ? 'selected' : '' }} value="1">Inavtive</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email',$teacher->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password',$teacher->passwrd) }}">
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name',$teacher->last_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Mobil Number</label>
                            <input type="text" class="form-control" name="mobile_number"
                                value="{{ old('mobile_number',$teacher->mobile_number) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Profile Picture</label>
                            <input type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic',$teacher->profile_pic) }}">
                            <img style="width: auto; border-radius:40px"
                            src="{{ asset('public/images/teachers/'. $teacher->profile_pic) }}"
                            alt="#">
                        </div>



                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-sm btn-primary mt-4">Save</button>
                    </div>

                </div>
            </form>
        </div>
        <div class="card-footer">Footer</div>
    </div>
@endsection

{{-- ======================================== --}}

@section('scripts')
@endsection
