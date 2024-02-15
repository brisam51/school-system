@extends('layouts.master')

@section('title')
    {{ $header_title }}
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


        @if (session()->has('success'))
            <div class="alert alert-sucess" role="alert">{{ session('success') }}</div>
        @endif

        {{-- start search section --}}
        <div class="col mb-2">

            <form class="row g-3" action="" method="GET">
                <div class="col-auto">
                    <label for="inputPassword2">student ID</label>
                    <input type="text" name="id" class="form-control" value="{{ Request::get('id') }}"
                        id="inputPassword2" placeholder="">
                </div>
                <div class="col-auto">
                    <label for="inputPassword2">First Name</label>
                    <input type="text" name="name" class="form-control" value="{{ Request::get('name') }}"
                        id="inputPassword2" placeholder="Firs tName">
                </div>
                <div class="col-auto">
                    <label for="inputPassword2">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ Request::get('Last_name') }}"
                        id="inputPassword2" placeholder="Last Name">
                </div>
                <div class="col-auto">
                    <label for="inputPassword2">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ Request::get('email') }}"
                        id="inputPassword2" placeholder="Examp@email.com">
                </div>
                <div class="col-auto ">

                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                    <a href="{{ url('admin/parent/my-student/' . $parent_id) }}" class="btn btn-danger mt-4">Reste</a>
                </div>
            </form>
        </div>
        {{-- end search section --}}

        <div class="card">
            <div>
                Student List
            </div>
            <table class="table table-bordered table-hover dataTable" role="grid">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            #</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            Image</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">
                            First Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">
                            Last Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">
                            Parent Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">
                            email
                        </th>

                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @if (is_array($getSearchStudent) || is_object($getSearchStudent))
                        @foreach ($getSearchStudent as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img style="width: 70px; border-radius:40px"
                                        src="{{ asset('public/images/students/' . $value->profile_pic) }}"
                                        alt="#">
                                    </td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->last_name }}</td>
                                <td>{{ $value->parent_name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id) }}" class="btn btn-primary">Add Student to Parents</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                </thead>
            </table>

        </div>


        <div class="card">
            <div style="font-size: 20px;">
              Parent  Student List
            </div>
            <table class="table table-bordered table-hover dataTable" role="grid">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            #</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            Image</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">
                            First Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">
                            Last Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">
                            email
                        </th>

                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @if (is_array($getRecord) || is_object($getRecord))
                        @foreach ($getRecord as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img style="width: 70px; border-radius:40px"
                                        src="{{ asset('public/images/students/' . $value->profile_pic) }}"
                                        alt="#">
                                    </td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->last_name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <a  class="btn btn-danger"  href="{{ url('admin/parent/assign_student_parent_delete/'.$value->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                </thead>
            </table>

        </div>



    </section>
@endsection
{{-- ======================================== --}}

@section('scripts')
@endsection
