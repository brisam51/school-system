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
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
    </div>
    <div class="card" style="background-color: grey; color:antiquewhite">
        <div class="card-header d-flex justify-content-center" style="color: blue; font-size:25;">Update My Accuont</div>
        <div class="card-body">
            <form action="{{ url('teacher/account/update') }}" enctype="multipart/form-data" method="POST">
@csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" value="{{ old('email', $value->name) }}" name="name"
                                class="form-control" placeholder="" aria-label="First name">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select class="form-control" name="gender" id="">
                                <option value="">Select gender</option>
                                <option @if (old('gender', $value->gender) == 'Male') {{ 'selected' }} @endif>Male</option>
                                <option @if (old('gender', $value->gender) == 'Female') {{ 'selected' }} @endif>Female</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="">
                                <option value="">Select status</option>
                                <option {{ old('status',$value->status) == '0' ? 'selected' : '' }} value="0">Avtive</option>
                                <option {{ old('status',$value->status) == '1' ? 'selected' : '' }} value="1">Inavtive</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{ old('email', $value->email) }}"
                                class="form-control" placeholder="" aria-label="email">
                        </div>


                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" value="{{ old('last_name', $value->last_name) }}" name="last_name"
                                class="form-control" placeholder="Last name" aria-label="Last name">
                        </div>
                        <div class="form-group">
                            <label for="">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number"
                                value="{{ old('mobil_number', $value->mobile_number) }}" placeholder=""
                                aria-label="Mobile Number">
                        </div>
                        <div class="form-group">
                            <label for="">Profile Picrure</label>
                            <input type="file" class="form-control"  value="{{ $value->profile_pic }}" name="profile_pic"  aria-label="">
                            <div class="mt-2">
                                <img style="width: auto; border-radius:40px"
                                    src="{{ asset('public/asstes/img/profile/' . $value->profile_pic) }}" alt="">
                            </div>

                        </div>


                    </div>
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </div>
            </form>

        </div>
        <div class="card-footer"></div>
    </div>
@endsection

{{-- ======================================== --}}

@section('scripts')
@endsection
