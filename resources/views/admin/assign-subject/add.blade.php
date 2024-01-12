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
                        <h5>Add New Class Subject</h5>
                    </div>


                    <!-- Horizontal Form -->
                    <form action="{{ url('admin/assign-subject/insert') }}" method="post">
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
                        {{-- @if($profile_data->p_religion == $religion->religion_id) selected @endif --}}
                       
                        {{-- end --}}
                        <div class="row mb-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label" style="width: 150px">Subject
                                Name:</label>

                            @foreach ($getSubject as $subject)
                                <div>
                                    <label class="form-control">
                                        <input type="checkbox" value="{{ $subject->id }}" name=" subject_id[]"
                                            id="">{{ $subject->name }}
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
            </div>



        </div>
    </div>

@endsection

{{-- ======================================== --}}

@section('scripts')
@endsection
