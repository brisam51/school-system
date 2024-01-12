@extends('layouts.master')

@section('title')
@endsection
@section('maintopic')
    Manager
@endsection

@section('homepage')
    Assign Class Subject List
@endsection

@section('secondpage')
@endsection
{{-- ======================================== --}}
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (session()->has('success'))
                    <div class="alert alert-secondary" role="alert">{{ session('success') }}</div>
                @endif

                <div class="row">
                    <div class="col" >
                        <form action="" method="get">
                            @csrf
                            <div class="card" style="width: 500pt">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="form-group col-md-3 p-2">
                                            <label for="my-input">Class name</label>
                                            <input id="class_name" class="form-control" type="text" name="class_name" value="{{ Request::get('class_name') }}">
                                        </div>
                                        <div class="form-group col-md-3 p-2">
                                            <label for="my-input">Subject Name</label>
                                            <input id="subject_name" class="form-control" type="text" name="subject_name" value="{{ Request::get('subject_name') }}">
                                        </div>
                                        <div class="form-group col-md-3 p-2">
                                            <label for="my-input">Date</label>
                                            <input id="date" class="form-control" type="date" name="date" value="{{ Request::get('date') }}">
                                        </div>
                                        <div class="form-group col-md-3 p-2">
                                            <div class="row ">
                                                <button type="submit" class="btn btn-primary  mt-4 " style="width: 80px">Search</button>
                                                <a href="{{ url('admin/assign-subject/list') }}"  class="btn btn-success  mt-4  " style="width: 80px">Reset</a>

                                            </div>

                                        </div>


                                    </div>

                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

                    <div class="col">
                        <div style="text-align: right">
                            <a href="{{ url('admin/assign-subject/add') }}" class="btn btn-primary">Add new Assign Class
                                Subject </a>
                        </div>
                    </div>


                </div>
                <div class="card">

                    <!-- Table with stripped rows -->
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

                        <div class="datatable-container">
                            <table class="table datatable datatable-table">
                                <thead>
                                    <tr>
                                        {{-- {{(query1.data.offset.toNumber() + ($index + 1))}} --}}
                                        <th data-sortable="true" style="width: 4.320939334637966%;"><button
                                                class="datatable-sorter">#</button></th>
                                        <th data-sortable="true" style="width: 8.320939334637966%;"><button
                                                class="datatable-sorter">Class Name</button></th>
                                        <th data-sortable="true" style="width: 12.320939334637966%;"><button
                                                class="datatable-sorter">Subject Name</button></th>
                                        <th data-sortable="true" style="width: 5.51859099804305%;"><button
                                                class="datatable-sorter">Status</button></th>
                                        <th data-sortable="true" style="width: 7.76320939334638%;"><button
                                                class="datatable-sorter">Created By</button></th>
                                        <th data-sortable="true" style="width: 12.76320939334638%;"><button
                                                class="datatable-sorter">Created Date</button></th>
                                        <th data-sortable="true" style="width: 12.76320939334638%;"><button
                                                class="datatable-sorter">Update Date</button></th>
                                        <th data-sortable="true" style="width: 25.960861056751465%;"><button
                                                class="datatable-sorter">Action</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $record)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $record->class_name }}</td>
                                            <td>{{ $record->subject_name }}</td>
                                            <td>
                                                @if ($record->status ==0)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>{{ $record->created_by_name }}</td>
                                            <td>{{ $record->created_at }}</td>
                                            <td>{{ $record->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('EditView', $record->id) }}" class="btn btn-success">
                                                    Edit</a>
                                                    <a href="{{ route('EditView_single', $record->id) }}" class="btn btn-success">
                                                        Edit Singel</a>
                                                <a href="{{ route('DeleteAssign',$record->id) }}" class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="datatable-bottom">
                            {{ $getRecord->links() }}
                            <nav class="datatable-pagination">
                                <ul class="datatable-pagination-list">

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
{{-- ======================================== --}}

@section('scripts')
@endsection