@extends('layouts.master')

@section('title')
@endsection

@section('maintopic')
@endsection

@section('homepage')
    {{ $header_title }}
@endsection


@section('secondpage')
@endsection
{{-- ======================================== --}}

@section('content')
    <div>
        <div class="card" style="overflow: auto">

            <div class="card-header " style="color: black">
                <div class="row">
                    <div class="col d-flex justify-content-end">
                       {{ $header_title }}

                    </div>
                    <div class="col d-flex justify-content-end">
                     <a href="#" class="btn btn-primary">Back</a>
                    </div>
                </div>



            </div>

            <table class="table table-bordered table-hover dataTable m-2" role="grid">
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
                            aria-label="Platform(s): activate to sort column ascending">
                            Class Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">
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
                                        src="{{ asset('public/images/students/' . $value->profile_pic) }}" alt="#">
                                </td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->last_name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->class_name }}</td>
                                <td>
                                    <a href="{{ url('parent/my_student/subject', $value->id) }}"
                                        class="btn btn-primary btn-sm">subjects</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                </thead>
            </table>

        </div>
    </div>

@endsection

{{-- ======================================== --}}

@section('scripts')
@endsection
