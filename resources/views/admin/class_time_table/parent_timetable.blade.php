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
        <div class="card m-2">
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary" style="margin: 10px;"><=Back</a>
            </div>
            <div class="card-header"></div>
            <div class="card-title d-flex justify-content-center">
               {{ $getClassName->name }}-{{ $getSubjectName->name }} ({{ $student_info->name }})
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">week Day</th>
                            <th scope="col">start time</th>
                            <th scope="col">end time</th>
                            <th scope="col">room number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getRecord as $value)
                            <tr>
                                <td>{{ $value['week_name'] }}</td>
                                <td>{{ $value['start_time'] }}</td>
                                <td>{{ $value['end_time'] }}</td>
                                <td>{{ $value['room_number'] }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
