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
                        <h5 >Add New Admin</h5>
                    </div>
                   

                    <!-- Horizontal Form -->
                    <form action="{{ url('admin/insert') }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label"> Name:</label>
                            <div class="col-sm-10">
                                <input type="text"  name="name" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Role:</label>
                            <div class="col-sm-10">
                                <input type="text" name="user_type" class="form-control" id="user_type" required>
                                <p>1=admin,2=Student , 3=Teacher , 4=Parent</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password" required>
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

{{-- ======================================== --}}

@section('scripts')
@endsection
