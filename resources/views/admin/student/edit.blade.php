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




    <div class="card p-2 " style="width:65rem;">

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
        <div class="card-body text-bg-secondary p-2 ">

            <!-- Horizontal Form -->
            <form action="{{ route('admin.student.update', $getstudent->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> First Name <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $getstudent->name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Last Name <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                    value="{{ $getstudent->last_name }}" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> Admission Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="admission_number" class="form-control" id="admission_number"
                                    value="{{ $getstudent->admission_number }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Roll Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="roll_number" class="form-control" id="roll_number"
                                    value="{{ $getstudent->roll_number }}" required>
                                @error('name')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">class Name<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select name="class_id" id="class_id" class="form-control" required>
                                    <option value="">Select Class Name</option>
                                    @foreach ($getclass as $value)
                                        <option {{ old('class_id', $getstudent->class_id) == $value->id ? 'selected' : '' }}
                                            value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Gender <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="">select Gender</option>
                                    <option {{ old('gender', $getstudent->gender) == 0 ? 'selected' : '' }} value="0">Male
                                    </option>
                                    <option {{ old('gender', $getstudent->gender) == 1 ? 'selected' : '' }} value="1">
                                        Female</option>
                                    <option value="3">other</option>
                                </select>

                            </div>
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label"> Date of Brith <span
                                    style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="date_of_brith" class="form-control"
                                    value="{{ old('date_of_brith', $getstudent->date_of_brith) }}" id="date_of_brith"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Caste</label>
                            <div class="col-sm-10">
                                <input type="text" name="caste" value="{{ old('caste', $getstudent->caste) }}"
                                    class="form-control" id="caste" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Religion</label>
                            <div class="col-sm-10">
                                <input type="text" name="religion"
                                    value="{{ old('religion', $getstudent->religion) }}" class="form-control"
                                    id="religion" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Mobile Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="mobile_number"
                                    value="{{ old('mobile_number', $getstudent->mobile_number) }}" class="form-control"
                                    id="mobile_number" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Admission Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="admission_date"
                                    value="{{ old('admission_date', $getstudent->admission_date) }}" class="form-control"
                                    id="admission_date" required>
                            </div>
                        </div>

                    </div>
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Height</label>
                            <div class="col-sm-10">
                                <input type="text" name="height" value="{{ old('height', $getstudent->height) }}"
                                    class="form-control" id="height" required>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="row">

                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">weight</label>
                            <div class="col-sm-10">
                                <input type="text" name="weight" value="{{ old('weight', $getstudent->weight) }}"
                                    class="form-control" id="height" required>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Status <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">select Status</option>
                                    <option {{ old('status', $getstudent->status) == 0 ? 'selected' : '' }} value="0">
                                        Activ</option>
                                    <option {{ old('status', $getstudent->status) == 1 ? 'selected' : '' }} value="1">
                                        Inactive</option>

                                </select>

                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Email<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="{{ old('email', $getstudent->email) }}"
                                    class="form-control" id="height" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" name="Password" class="form-control" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">blood Group</label>
                            <div class="col-sm-10">
                                <input type="text" name="blood_group" class="form-control" id="blood_group"
                                    value="{{ old('blood_group', $getstudent->blood_group) }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputEmail3" class="form-label">Profile Picture<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="file" name="profile_pic" class="form-control" id="profile_pic">
                            </div>

{{-- profile_pic --}}

                        </div>

                        <div>
                            <img  style="width: 70px; border-radius:40px;" src="{{ asset('public/images/students/'. $getstudent->profile_pic) }}" alt="#">
                        </div>
                    </div>

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">update</button>

                </div>
            </form><!-- End Horizontal Form -->

        </div>







    @endsection

    {{-- ======================================== --}}

    @section('scripts')
    @endsection
