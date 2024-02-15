@extends('layouts.master')

@section('title')
    {{ $header_title }}
@endsection

@section('maintopic')
    {{ $header_title }}
@endsection

@section('homepage')
    {{ $header_title }}
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
                <div class="card-body">

                    <form action="{{ route('admin.parent.update', $getParent->id) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf

                        <div class="row p-2">
                            <div class="col">
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">First Name:</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" value="{{ old('name', $getParent->name) }}"
                                            class="form-control" id="name" required>
                                        <div style="color: red">{{ $errors->first('name') }}</div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Gender</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="">Select Gender</option>

                                            <option {{ (old('gender', $getParent->gender)=='Male')? "selected" : "" }}
                                                value="Male">Male</option>
                                            <option {{ (old('gender', $getParent->gender)=="Femal")? "selected" : "" }}
                                                value="Famle">FeMale
                                            </option>
                                            <option {{ (old('gender', $getParent->gender)=='other') ? "selected" : "" }}
                                                value="other">other
                                            </option>
                                        </select>
                                        <div style="color: red">{{ $errors->first('gender') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="status" id="status">
                                            <option value="">Select Status</option>
                                            <option {{ (old('Active', $getParent->status) == 1)? "selected" : ""}} value="0">Active</option>
                                            <option {{ (old('Inactive', $getParent->status) == 0)? "selected" : "" }} value="1" >Inctive</option>
                                        </select>
                                        <div style="color: red">{{ $errors->first('status') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" name="email" value="{{ old('email', $getParent->email) }}"
                                            class="form-control" id="email">
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
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">
                                        Last Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="last_name"
                                            value="{{ old('last_name', $getParent->last_name) }}" class="form-control"
                                            id="last_name">
                                        <div style="color: red">{{ $errors->first('last_name') }}</div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="inputEmail3"
                                        class="col-sm-4
                                        col-form-label">Mobile
                                        Number</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="mobile_number"
                                            value="{{ old('mobile_number', $getParent->mobile_number) }}"
                                            class="form-control" id="mobile_number">
                                        <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3"
                                        class="col-sm-4
                                        col-form-label">Occuption</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="occupation"
                                            value="{{ old('occupation', $getParent->occupation) }}" class="form-control"
                                            id="occupation">
                                        <div style="color: red">{{ $errors->first('occupation') }}</div>
                                    </div>
                                </div>
                                
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Profile Picure</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="profile_pic" class="form-control" id="profile_pic">
                                        <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                                        <img style="width: auto; border-radius:40px"
                                                        src="{{ asset('public/asstes/img/profile/parents/'. $getParent->profile_pic) }}"
                                                        alt="#">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Address</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="address" class="form-control"
                                            value="{{ old('address', $getParent->address) }}" id="address">
                                        <div style="color: red">{{ $errors->first('address') }}</div>
                                    </div>
                                </div>

                            </div>



                        </div>

                        <div class="text-center">
                            <button type="submit" style="width: 120px;"
                                class="btn btn-primary  btn-sm form-control">Save</button>

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
