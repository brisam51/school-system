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
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
    </div>
    <div class="card ">
        <div class="card-header d-flex justify-content-center">
            {{ $header_title }}
        </div>
        <div class="card-body">


        </div>
        <div class="card overflow-auto ">
            <div class="crard-header">hedear</div>
            <div class="cord-body">
                @foreach ($getRecord as $value)
                    <h2>{{ $value['class_name'] }}</h2>
                    @foreach ($value['exam'] as $exam)
                        <div class="card ">
                            <div class="card-header ">
                                <div class="card-title">
                                    {{ $exam['exam_name'] }}
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Day</th>
                                            <th>Exam Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room Number</th>
                                            <th>Full Marks</th>
                                            <th>Passing Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                    @endforeach
                @endforeach
            </div>
        </div>

    </div>


    {{-- end card body --}}
    </div>


    </div>

    </div>
@endsection
