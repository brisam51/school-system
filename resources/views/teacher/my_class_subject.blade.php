@extends('layouts.master')

@section('title')
@endsection

@section('maintopic')
@endsection

@section('homepage')
    {{ $header_title }}
@endsection


@section('secondpage')
    {{ $header_title }}
@endsection
{{-- ======================================== --}}

@section('content')
    <div>
        <div class="card">
            <div class="card-header">
                {{ $header_title }}
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                    aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                style="width:50.453px;">#</th>

                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending" style="width: 100.078px;">
                                Class Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending" style="width: 156.875px;">
                                Subject Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending" style="width: 50.875px;">
                                Subject Type</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending" style="width: 160.391px;">
                                My Class Timetable</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending" style="width: 110.391px;">
                                Created At</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending" style="width: 60.391px;">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getRecord as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->class_name }}</td>
                                <td>{{ $value->subject_name }}</td>
                                <td>
                                    @if ($value->subject_type == 0)
                                        Theroy
                                    @else
                                        Pratcitical
                                    @endif

                                </td>
                                <td>
                                    @php
                                        $getClassSubject = $value->getMyTimetable($value->class_id, $value->subject_id);
                                    @endphp
                                    @if (!empty($getClassSubject))
                                        {{ $getClassSubject->start_time }}  To  {{ $getClassSubject->end_time }}
                                        <br/>
                                        Room Number:  {{ $getClassSubject->room_number }}
                                    @endif
                                </td>
                                <td>
                                    {{ date('Y-m-d', strtotime($value->created_at)) }}
                                </td>
                                <td>
                                    <a href="{{ url('teacher/my_class_timetable/' . $value->class_id . '/' . $value->subject_id) }}"
                                        class="btn btn-primary">Timetable</a>
                                </td>
                            </tr>
                        @endforeach





                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

{{-- ======================================== --}}

@section('scripts')
@endsection
