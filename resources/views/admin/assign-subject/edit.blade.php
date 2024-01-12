@extends('layouts.master')

@section('title')
    {{ $header_title }}

@endsection

@section('maintopic')
    {{ $header_title }}
@endsection

@section('homepage')



@section('secondpage')
@endsection
{{-- ======================================== --}}

@section('content')
    <div class=" d-flex justify-content-center">
        <div class="col-lg-8 ">

            <div class="pt-4 pb-2">
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
            <div class="card ">
                <div class="card-body  ">
                    <div class="card-title text-center text-white bg-primary">
                        <h5>Update Class Subject</h5>
                    </div>


                    <!-- Horizontal Form -->
                    <form action="{{ route('UpdateAssign' ) }}" method="post">
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
                            <label for="inputEmail3" class="col-sm-2 col-form-label" style="width: 150px">Subject
                                Name:</label>

                            @foreach ($getSubject as $subject)

                                @php
                                    $checked = "";
                                @endphp

                                @foreach ($getAssignSubjectID as $subjectAssign)

                                @if ($subjectAssign->subject_id==$subject->id)
                                @php
                                $checked = "checked";
                            @endphp
                                @endif

                                @endforeach
                                <div>
                                    <label class="form-control">
                                        <input {{ $checked }}  type="checkbox" value="{{ $subject->id }}" name=" subject_id[]"
                                            id="">{{ $subject->name }}
                                    </label>
                                </div>
                            @endforeach




                        </div>
                        <div>
                            <select name="" id="">
                                <option value="">one</option>
                            </select>                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Status:</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option {{ ($getRecord->status == 0)? 'selected': '' }} value="0">Active</option>
                                    <option {{  ($getRecord->status == 1)? 'selected': '' }} value="1">Inactive</option>
                                </select>
                            </div>
                        </div>




                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>

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