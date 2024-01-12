@extends('layouts.master')

@section('title')
   {{ $header_title }}
@endsection

@section('maintopic')
{{ $header_title }}
@endsection

@section('homepage')
{{ $header_title }}


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
                        <h5 > {{ $header_title }}</h5>
                    </div>


                    <!-- Horizontal Form -->
                    <form action="{{ url('admin/update_password')}}" method="post">
                        @csrf

                        <div class="row mb-4">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"> Old Passwoord:</label>
                            <div class="col-sm-8">
                                <input type="password"  name="old_password" class="form-control" id="old_password" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"> New Passwoord:</label>
                            <div class="col-sm-8">
                                <input type="password"  name="new_password" class="form-control" id="new_password" required>
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

