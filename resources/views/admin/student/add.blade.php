@extends('layouts.master')

@section('title')
    Add New Addmin
@endsection

@section('maintopic')
    Admin List
@endsection

@section('homepage')
    Add New Admin Page
@endsection


@section('secondpage')
@endsection
{{-- ======================================== --}}

@section('content')
    <div class=" d-flex justify-content-center">
        <div class=" ">

            <div class="pt-4 pb-2">

                @if (session()->has('success'))
                    <div class="alert alert-secondary" role="alert">{{ session('success') }}</div>
                @endif
            </div>
            <div class="card bg-secondary text-white" style="width: 67rem">
                <div class="card-header ">

                </div>
                <div class="card-body  ">

                    <form action="{{ route('admin.student.insert') }}"  enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="row p-2">
                            <div class="col">
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">First Name:</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" class="form-control" id="name" required>
                                        <div style="color: red">{{ $errors->first('name') }}</div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Admission Number</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="admission_number" class="form-control"
                                            id="admission_number"  required>
                                            <div style="color: red">{{ $errors->first('admission_number') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Class Name</label>
                                    <div class="col-sm-12">
                                        <select class="form-control"   name="class_id" id="class_id" required>
                                            <option value="">Select Class Name</option>
                                            @foreach ($getClass as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: red">{{ $errors->first('class_id') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Gender</label>
                                    <div class="col-sm-12">
                                        <select class="form-control"   name="gender" id="gender">
                                            <option value="">Select Gender</option>
                                           <option {{ (old('gender')=='Male')?'selected':'' }} value="Male">Male</option>
                                           <option {{ (old('gender')=='FeMale')?'selected':'' }} value="Femal">FeMale</option>
                                            <option {{ (old('gender')=='other')?'selected':'' }} value="other">other</option>
                                        </select>
                                        <div style="color: red">{{ $errors->first('gender') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Admission Date</label>
                                    <div class="col-sm-12">
                                        <input type="date" name="admission_date" class="form-control"
                                            id="admission_date" value="{{ old('admission_date') }}">
                                            <div style="color: red">{{ $errors->first('admission_date') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Height</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="height" class="form-control" id="height"  value="{{ old('height') }}">
                                        <div style="color: red">{{ $errors->first('height') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Weight</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="weight" class="form-control" id="weight" value="{{ old('weight') }}">
                                        <div style="color: red">{{ $errors->first('weight') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="status" id="status">
                                            <option value="">Select Status</option>
                                            <option value="0">Active</option>
                                            <option value="1">Inctive</option>
                                        </select>
                                        <div style="color: red">{{ $errors->first('status') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" name="email" class="form-control" id="email" >
                                        <div style="color: red">{{ $errors->first('email') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" name="Password" class="form-control" id="Password">
                                        <div style="color: red">{{ $errors->first('Password') }}</div>
                                    </div>
                                </div>

                            </div>
                            {{-- start second Colunmn --}}
                            <div class="col">
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label"> Last Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="last_name" class="form-control" id="last_name">
                                        <div style="color: red">{{ $errors->first('last_name') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Roll_number</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="roll_number" class="form-control" id="roll_number">
                                        <div style="color: red">{{ $errors->first('roll_number') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Date of Brith</label>
                                    <div class="col-sm-12">
                                        <input type="date" name="date_of_brith" class="form-control"
                                            id="date_of_brith">
                                            <div style="color: red">{{ $errors->first('date_of_brith') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Caste</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="caste" class="form-control" id="caste">
                                        <div style="color: red">{{ $errors->first('caste') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Religion</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="religion" class="form-control" id="religion">
                                        <div style="color: red">{{ $errors->first('religion') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Mobile Number</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="mobile_number" class="form-control"
                                            id="mobile_number">
                                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Blood Group</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="blood_group" class="form-control" id="blood_group">
                                        <div style="color: red">{{ $errors->first('blood_group"') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Profile Picure</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="profile_pic" class="form-control" id="profile_pic">
                                        <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                                    </div>
                                </div>

                            </div>


                        </div>

                            <div class="text-center">
                                <button type="submit" style="width: 120px;" class="btn btn-primary  btn-sm form-control">Save</button>

                            </div>
                    </form><!-- End Horizontal Form -->

                </div>
            </div>



        </div>
    </div>
@endsection

{{-- ======================================== --}}

@section('scripts')
@endsection
