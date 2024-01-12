@extends('layouts.master')

@section('title')
    Add New class
@endsection

@section('maintopic')
  Subject List
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
                    @foreach ( $errors->all() as $error )
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
                    <div class="card-title text-center text-white bg-primary"  >
                        <h5 >Update Subject</h5>
                    </div>


                    <!-- Horizontal Form -->
                    <form action="{{ route('UpdatePostSubject',$data->id)}}" method="post">
                        @csrf

                        <div class="row mb-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label"> Name:</label>
                            <div class="col-sm-10">
                                <input type="text"  name="name"  value="{{ $data->name }}" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Type:</label>
                            <div class="col-sm-10">
                               <select name="type" id="type"  value="{{ $data->typr }}"  class="form-control">
                                <option>Select Type</option>
                                <option  {{ $data->type==0?'selected':'' }}  value="0">Theory</option>
                                <option  {{ $data->type==1?'selected':'' }}  value="1">Practical</option>
                               </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Status:</label>
                            <div class="col-sm-10">
                               <select name="status" value="{{ $data->type }}" id="status" class="form-control">
                                <option   value="">Select Status</option>
                                <option {{ $data->status==0? 'selected':'' }} value="0">active</option>
                                <option {{ $data->status==1? 'selected':'' }} value="1">inactive</option>
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
