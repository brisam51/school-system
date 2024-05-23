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
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            {{ $header_title }}
        </div>
        <div class="card-body">


        </div>
        @foreach ($getRecord as $value)
            <div class="card ">
                <div class="card-header ">

                    <div class="card-title">

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
                            @foreach ($value['exam'] as $valueS)
                                <tr>
                                    <td>{{ $valueS['subject_name'] }}</td>
                                    <td>{{ date('l',strtotime($valueS['exam_date'] )) }}</td>
                                    <td>{{ $valueS['exam_date'] }}</td>
                                    <td>{{ date('h:i A', strtotime($valueS['start_time'])) }}</td>
                                    <td>{{ date('h:i A', strtotime($valueS['end_time'])) }}</td>
                                    <td>{{ $valueS['room_number'] }}</td>
                                    <td>{{ $valueS['full_marks'] }}</td>
                                    <td>{{ $valueS['passing_mark'] }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
        @endforeach
    </div>


    {{-- end card body --}}
    </div>


    </div>

    </div>
@endsection
