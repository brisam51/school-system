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
    </div>
    <div class=" d-flex justify-content-center">
        <div class="col-lg-8 ">


            <div class="card m-4">
                <div class="card-body  ">
                    <div class="card-title text-center text-white bg-primary">
                        <h5>Add New Exam</h5>
                    </div>


                    <!-- Horizontal Form -->
                    <form action="{{ url('admin/exam/insert') }}" method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Exam Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" value=""
                                    required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="col-sm-2 col-form-label">Exam Date::</label>
                            <div class="col-sm-10">
                                <input type="date" name="exam_date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="col-sm-2 col-form-label">Note::</label>
                            <div class="col-sm-10">
                                <textarea  clsss="form-control" name="note" id="" cols="60" rows="5"></textarea>
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
