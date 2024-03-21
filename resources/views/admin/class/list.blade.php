@extends('layouts.master')

@section('title')
@endsection
@section('maintopic')
    Manager
@endsection

@section('homepage')
    Class List
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
                    <div class="col">
                        <form action="{{ url('admin/class/search') }}" method="get">
                            @csrf
                            <div class="d-flex flex-row">
                                <input type="text" name="name" id="name">
                                <button class="btn btn-primary" type="submit">
                                    <label for=""><i class="fa fa-search" aria-hidden="true">Search</i></label>

                                </button>

                            </div>
                        </form>

                    </div>

                    <div class="col">
                        <div style="text-align: right">
                            <a href="{{ url('admin/class/newclass') }}" class="btn btn-primary">Add new Class</a>
                        </div>
                    </div>


                </div>
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-center text-dark">
                        <h2>Class List</h2>
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
                                        <th data-sortable="true" style="width: 19.320939334637966%;"><button
                                                class="datatable-sorter">Name</button></th>
                                        <th data-sortable="true" style="width: 10.51859099804305%;"><button
                                                class="datatable-sorter">Status</button></th>
                                        <th data-sortable="true" style="width: 10.76320939334638%;"><button
                                                class="datatable-sorter">Created By</button></th>
                                        <th data-sortable="true" style="width: 15.76320939334638%;"><button
                                                class="datatable-sorter">Created Date</button></th>
                                        <th data-sortable="true" style="width: 19.960861056751465%;"><button
                                                class="datatable-sorter">Action</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getallrecord as $class)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $class->name }}</td>
                                            <td>
                                                @if ($class->status == 0)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif

                                            </td>
                                            <td>{{ $class->created_by_name }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($class->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/class/update/' . $class->id) }}"
                                                    class="btn btn-success">Update</a>
                                                <a href="{{ url('admin/class/delete/' . $class->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="datatable-bottom">
                            <div class="datatable-info"> {{ $getallrecord->onEachSide(1)->links() }}</div>
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
