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
                                style="width: 100.453px;">#</th>

                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending" style="width: 211.078px;">
                                Class Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending" style="width: 156.875px;">
                                Subject Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending" style="width: 156.875px;">
                                Subject Type</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending" style="width: 110.391px;">
                                Created At</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending" style="width: 110.391px;">
                                Actin</th>
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
                                    {{ date('Y-m-d', strtotime($value->created_at)) }}
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
