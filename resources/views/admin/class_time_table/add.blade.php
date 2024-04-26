@extends('layouts.master')

@section('title')
@endsection
@section('maintopic')

@endsection

@section('homepage')
   {{ $header_title }}
@endsection

@section('secondpage')
@endsection
{{-- ======================================== --}}
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (session()->has('success'))
                    <div class="alert alert-secondary" role="alert">{{ session('success') }}</div>
                @endif

                <div class="row">
                    <div class="col">
                        <form action="" method="get">
                            @csrf
                            <div class="card" style="width: 500pt">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="form-group col-md-3 p-2">
                                            <label for="my-input">Class name</label>
                                            <input id="class_name" class="form-control" type="text" name="class_name"
                                                value="{{ Request::get('class_name') }}">
                                        </div>
                                        <div class="form-group col-md-3 p-2">
                                            <label for="my-input">Subject Name</label>
                                            <input id="subject_name" class="form-control" type="text" name="subject_name"
                                                value="{{ Request::get('subject_name') }}">
                                        </div>
                                        <div class="form-group col-md-3 p-2">
                                            <label for="my-input">Date</label>
                                            <input id="date" class="form-control" type="date" name="date"
                                                value="{{ Request::get('date') }}">
                                        </div>
                                        <div class="form-group col-md-3 p-2">
                                            <div class="row ">
                                                <button type="submit" class="btn btn-primary  mt-4 "
                                                    style="width: 80px">Search</button>
                                                <a href="{{ url('admin/class_time_table/list') }}"
                                                    class="btn btn-success  mt-4  " style="width: 80px">Reset</a>

                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                    

                </div>




            </div>
            <div class="card mt-2" style="overflow: auto">
                <div class="card-header d-flex justify-content-center bg-success text-white">
                    {{ $header_title }}
                </div>




                <!-- End Table with stripped rows -->

            </div>
        </div>

        </div>
        </div>
    </section>
@endsection
{{-- ======================================== --}}

@section('scripts')
@endsection
