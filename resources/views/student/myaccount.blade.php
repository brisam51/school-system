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
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
    <div class="card p-2 " style="width:65rem; ">
        <div class="card-header">card header</div>
        <div class="card-body text-bg-secondary p-2 ">

            <!-- Horizontal Form -->
            <form action="{{ url('student/account/update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row ms-4">
                    <div class="col">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> First Name <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name', $getstudent->name) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Last Name <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                    value="{{ old('last_name', $getstudent->last_name) }}" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row  ms-4">
                    <div class="col">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> Gender <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select name="gender" id="" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option {{ old('gender', $getstudent->gender) == 'Male' ? 'selected' : '' }}
                                        value="Male">
                                        Male</option>
                                    <option {{ old('gender', $getstudent->gender) == 'Female' ? 'selected' : '' }}
                                        value="Female">Female</option>
                                    <option {{ old('gender', $getstudent->gender) == 'other' ? 'selected' : '' }}
                                        value="other">other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Status <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" id="">
                                    <option value="">Select status</option>
                                    <option {{ old('status', $getstudent->status) == '0' ? 'selected' : '' }}
                                        value="0">
                                        Active</option>
                                    <option {{ old('status', $getstudent->status) == '1' ? 'selected' : '' }}
                                        value="1">
                                        Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  ms-4">
                    <div class="col">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> Height <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="height" class="form-control" id=""
                                    value="{{ old('height', $getstudent->height) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Weight <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="weight" class="form-control" id=""
                                    value="{{ old('weight', $getstudent->weight) }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  ms-4">
                    <div class="col">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> Mobile Number<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="mobile_number" class="form-control" id=""
                                    value="{{ old('mobile_number', $getstudent->mobile_number) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Date of Brith <span
                                    style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="date_of_brith" class="form-control" id=""
                                    value="{{ old('date_of_brith', $getstudent->date_of_brith) }}" required>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row  ms-4">
                    <div class="col">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> Blood Group <span
                                    style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="blood_group" class="form-control" id=""
                                    value="{{ old('blood_group', $getstudent->blood_group) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> Email <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id=""
                                    value="{{ old('email', $getstudent->email) }}" required>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row  ms-4">
                    <div class="col">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> Address <span style="color:red">*</span></label>
                            <div class="col-sm-10">

                               <textarea name="address" class="form-control" id="" cols="30" rows="10">{{ old("address",$getstudent->address) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> Profile Picture <span
                                    style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="file" name="profile_pic" class="form-control" id=""
                                    value="{{ old('profile_pic', $getstudent->profile_pic) }}">
                            </div>
                        </div>

                        <div class="mt-2">

                            <img style="width: 100px;" src="{{ asset('public/asstes/img/profile/'.$getstudent->profile_pic) }}"
                                alt="#">
                        </div>

                    </div>

                </div>



        </div>

        {{-- -----------------------------------Button Sectiopn---------- --}}
        <div class="form-group">
            <div class="text-center">
                <button type="submit" class="btn btn-primary">update</button>

            </div>
        </div>

        </form><!-- End Horizontal Form -->

    </div>







@endsection

{{-- ======================================== --}}

@section('scripts')
@endsection
