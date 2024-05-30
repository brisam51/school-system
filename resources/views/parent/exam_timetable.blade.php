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
    <div style="background-color:#2f5; padding:5px; overflow-y: scroll; ">

        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <img style="width: 100px; border-radius:40px"
                        src="{{ asset('public/images/students/' . $stusent_info->profile_pic) }}" alt="#">

                       {{$stusent_info->name  }}
                 
                    </div>
                    <div class="col">{{ $header_title }}</div>



                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                aria-describedby="example2_info">
                                <thead>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">
                                        Subject
                                        Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Exam Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending">
                                        Start Time</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                        End Time</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                        Room number</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                        Full Marks</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                        Passing Mark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        @foreach ($value['exam'] as $valueS)
                                            <tr>
                                                <td>{{ $valueS['subject_name'] }}</td>
                                                <td>{{ $valueS['exam_date'] }}</td>
                                                <td>{{ date('h:i A', strtotime($valueS['start_time'])) }}</td>
                                                <td>{{ date('h:i A', strtotime($valueS['end_time'])) }}</td>
                                                <td>{{ $valueS['room_number'] }}</td>
                                                <td>{{ $valueS['full_marks'] }}</td>
                                                <td>{{ $valueS['passing_mark'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

    </div>
@endsection
{{-- ======================================== --}}

@section('scripts')
@endsection
