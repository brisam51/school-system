@extends('layouts.master')

@section('title')
@endsection

@section('maintopic')
    Assigen Calss To Teacher List
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
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-primary" href="{{ route('assigen.class.add') }}">Assigen New Class</a>
    </div>
    <div class="card" style="overflow: auto">
        <div class="card-header d-flex justify-content-center text-white bg-success rounded">
            Assigen class To teacher
        </div>
        <!-- Table with stripped rows -->
        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

            <div class="datatable-container">
                <table class="table datatable datatable-table">
                    <thead>
                        <tr>
                            {{-- {{(query1.data.offset.toNumber() + ($index + 1))}} --}}
                            <th data-sortable="true" style="width: 7.320939334637966%;"><button
                                    class="datatable-sorter">#</button></th>
                            <th data-sortable="true" style="width: 12.320939334637966%;"><button
                                    class="datatable-sorter">Class Name</button></th>
                            <th data-sortable="true" style="width: 12.320939334637966%;"><button
                                    class="datatable-sorter">Teacher First Name</button></th>
                            <th data-sortable="true" style="width: 12.320939334637966%;"><button
                                    class="datatable-sorter">Teacher Last Name</button></th>
                            <th data-sortable="true" style="width: 10.51859099804305%;"><button
                                    class="datatable-sorter">Status</button></th>
                            <th data-sortable="true" style="width: 10.76320939334638%;"><button
                                    class="datatable-sorter">Created By</button></th>
                            <th data-sortable="true" style="width: 17.76320939334638%;"><button
                                    class="datatable-sorter">Created Date</button></th>
                            <th data-sortable="true" style="width: 30.960861056751465%;"><button
                                    class="datatable-sorter">Action</button></th>
                        </tr>
                    </thead>
                    @if (is_object($getRecord) || is_array('$getRecord '))
                        <tbody>

                            @foreach ($getRecord as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->class_name }}</td>
                                    <td>{{ $value->teacher_name }}</td>
                                    <td>{{ $value->teacher_last_name }}</td>


                                    <td>
                                        @if ($value->status == 0)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                        <td>{{ $value->created_by_name }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td style="width:20%">
                                            <a href="{{ url('admin/teacher/assigen_class_teacher/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit All</a>

                                            <a href="{{ url('admin/teacher/assigen_class_teacher/edit-single/'.$value->id) }}" class="btn btn-primary btn-sm">Edit Single</a> </td>
                                </tr>
                            @endforeach

                        </tbody>
                    @endif
                </table>
                <div>
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
            </div>

        </div>
        <!-- End Table with stripped rows -->

    </div>
@endsection

{{-- ======================================== --}}

@section('scripts')
@endsection
