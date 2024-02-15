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
    </div>
    <div class=" d-flex justify-content-center">
        <div class="col-lg-8 ">


            <div class="card m-4">
                <div class="card-body  ">
                    <div class="card-title text-center text-white bg-primary"  >
                        <h5 >Updat Admin</h5>
                    </div>


                    <!-- Horizontal Form -->
                    <form action="{{ route('updateadmin',$updateAdmin->id) }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label"> Name:</label>
                            <div class="col-sm-10">
                                <input type="text"  name="name" class="form-control" id="name" value="{{ $updateAdmin->name }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">email::</label>
                            <div class="col-sm-10">
                                {{ isset($name) ? $name : 'Default'}}


                                <input type="email" name="email" class="form-control" id="email" value="{{$updateAdmin->email }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Role::</label>
                            <div class="col-sm-10">
                                <input type="text" name="user_type" class="form-control" id="user_type" value="{{ $updateAdmin->user_type }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="password" id="password" >
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </form><!-- End Horizontal Form -->

                </div>
            </div>



        </div>
    </div>

    @endsection



@section('scripts')

@endsection
