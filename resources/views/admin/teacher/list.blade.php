@extends('layouts.master')

@section('title')
@endsection
@section('maintopic')
    {{ $header_title }}
@endsection

@section('homepage')
@endsection

@section('secondpage')
@endsection
{{-- ======================================== --}}
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                {{-- start search section --}}
                <div class="col">
                    <div style="text-align: right">
                        <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Add new Teacher</a>
                    </div>
                </div>

                {{-- startend search section --}}

                <div class="col mb-2">

                    <form class="row g-3" action="{{ route('admin.teacher.search') }}" method="GET">
                        <div class="col-auto">
                            <label for="inputPassword2" >First Name</label>
                            <input type="text" name="name" class="form-control" value="{{ Request::get('name') }}"  id="inputPassword2" placeholder="">
                        </div>
                        <div class="col-auto">
                          <label for="inputPassword2" >Last Name</label>
                          <input type="text" name="last_name" class="form-control" value="{{ Request::get('Last_name') }}" id="inputPassword2" placeholder="">
                        </div>
                        <div class="col-auto ">

                          <button type="submit" class="btn btn-primary mt-4">Search</button>
                          <a href="{{ route('admin.teacher.list') }}" class="btn btn-danger mt-4">Reste</a>
                        </div>
                      </form>
                </div>


            </div>
            <div class="card">
                <div class="card-header">

                </div>
                <!-- /.card-header -->
                <div class="card-body" style="overflow:auto;">
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
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                #</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                First Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Last Name</th>


                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                email
                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Mobile Number
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Gender
                                            </th>


                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Religion
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Admission Date
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (is_array($getTeacher)|| is_object($getTeacher))


                                        @foreach ($getTeacher as $teacher)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img style="width: 70px; border-radius:40px"
                                                        src="{{ asset('public/images/teachers/' . $teacher->profile_pic) }}"
                                                        alt="#">
                                                    </td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->last_name }}</td>
                                                <td>{{ $teacher->email }}</td>
                                                <td>{{ $teacher->mobile_number }}</td>
                                                <td>{{ $teacher->gender }}</td>
                                                <td>{{ $teacher->religion }}</td>
                                                <td style="min-width: 120px;">{{ $teacher->admission_date }}</td>
                                                <td style="min-width: 150px;">

                                                    <a href="{{ route('admin.teacher.edit', $teacher->id) }}"
                                                        class="btn btn-sm btn-success ">Edit</a>
                                                    <a href="{{ route('admin.teacher.delete', $teacher->id) }}"
                                                        class="btn btn-sm btn-danger">Delete</a>


                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        </div>
        </div>
    </section>
@endsection
{{-- ======================================== --}}

@section('scripts')
@endsection


