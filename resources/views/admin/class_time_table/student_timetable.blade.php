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


        </div>
        @foreach ($result as $value)
            <div class="card ">
                <div class="card-header ">

                    <div class="card-title">
                        <h5>{{ $value['subject_name'] }}</h3>
                    </div>
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
                            @foreach ($value['week'] as $valueW)
                                <tr>
                                    <th>{{ $valueW['week_name'] }}</th>
                                    <td>{{ $valueW['start_time'] }}</td>
                                    <td>{{ $valueW['end_time'] }}</td>
                                    <td>{{ $valueW['room_number'] }}</td>
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

{{-- ======================================== --}}

{{-- @section('scripts')
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
@endsection --}}
