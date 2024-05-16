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
            class and Sbject Table
        </div>
        <div class="card-body">

            <form action="">
                @csrf
                <Fdiv class="row">
                    <div class="form-group col-md-3 p-2">
                        <label for="my-input">Class name</label>
                        <select class="form-control getClass" id="getClass" name="class_id" required>
                            <option value=" ">--Select Class--</option>
                            @foreach ($getClass as $class)
                                <option value="{{ $class->id }}"
                                    {{ Request::get('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3 p-2">
                        <label for="my-input">Subject Name</label>
                        <select class="form-control " id="getSubject" name="subject_id">
                            <option value="">Select</option>
                            @if (!empty($getSubject))
                                @foreach ($getSubject as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{ Request::get('subject_id') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                    <div class="col-auto ">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                        <a href="{{ url('admin/class_timetable/list') }}" class="btn btn-danger mt-4">Reste</a>
                    </div>
        </div>
        </form>
    </div>
    {{-- start  Card  which have table --}}
    @if (!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
        <div class="card ">
            <div class="card-header d-flex justify-content-center">
                Time Table
            </div>
            <form action="{{ url('admin/class_timetable/add') }}" method="post">
                @csrf
                <div class="row">
                    <input class="form-control" type="hidden" name="class_id" value="{{ Request::get('class_id') }}"
                        style="width: 200px;">
                    <input class="form-control" type="hidden" name="subject_id" value="{{ Request::get('subject_id') }}"
                        style="width: 200px;">
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th>Week Days</th>
                                <th>Start Time</th>
                                <th>enf Time</th>
                                <th>Room Number</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($week as $value)
                                <tr>
                                    <th>
                                        <input type="hidden" name="timetable[{{ $i }}][week_id]"
                                            value="{{ $value['week_id'] }}">
                                        {{ $value['week_name'] }}
                                    </th>
                                    <td>
                                        <input type="time" name="timetable[{{ $i }}][start_time]"
                                            value="{{ $value['start_time'] }}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="time" name="timetable[{{ $i }}][end_time]"
                                            value="{{ $value['end_time'] }}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="timetable[{{ $i }}][room_number]"
                                            value="{{ $value['room_number'] }}" class="form-control" style="width: 200px;">
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                        </tbody>
                    </table>
                    <div style="text-align: center; padding:10px;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>
            {{-- end card body --}}
        </div>
    @endif

    </div>

    </div>
@endsection

{{-- ======================================== --}}

@section('scripts')
    <script type="text/javascript">
        $(".getClass").change(function() {
            var class_id = $(this).val();

            $.ajax({
                type: "post",
                url: "{{ url('admin/class_timetable/get_subject') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    class_id: class_id,

                },
                dataType: "json",
                success: function(response) {
                    $("#getSubject").html(response.html);
                },
            });

        });
    </script>
@endsection
