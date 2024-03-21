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
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (session()->has('success'))
                    <div class="alert alert-secondary" role="alert">{{ session('success') }}</div>
                @endif

                <div class="row">
                    <div class="col">
                        <form action="{{ route('SubjectSearch') }}" method="get">
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
                            <a href="{{ url('adsubject/newsubject') }}" class="btn btn-primary">Add new subject</a>
                        </div>
                    </div>


                </div>
                <div class="card mt-4 ">
                    <div class="card-header d-flex justify-content-center text-dark">
                        <h2>Subject List</h2>
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
                                        <th data-sortable="true" style="width: 13.320939334637966%;"><button
                                                class="datatable-sorter">Name</button></th>
                                                <th data-sortable="true" style="width: 10.320939334637966%;"><button
                                                    class="datatable-sorter">Type</button></th>

                                        <th data-sortable="true" style="width: 10.51859099804305%;"><button
                                                class="datatable-sorter">Status</button></th>
                                        <th data-sortable="true" style="width: 15.76320939334638%;"><button
                                                class="datatable-sorter">Created By</button></th>
                                        <th data-sortable="true" style="width: 15.76320939334638%;"><button
                                                class="datatable-sorter">Created Date</button></th>
                                        <th data-sortable="true" style="width: 19.960861056751465%;"><button
                                                class="datatable-sorter">Action</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subject as $sub)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sub->name }}</td>
                                            @if ($sub->type==0)
                                            <td>Theory</td>
                                            @else
                                            <td>Proctical</td>
                                            @endif

                                            <td>
                                                @if ($sub->status == 1)
                                                    Inactiv
                                                @else
                                                    Active
                                                @endif

                                            </td>
                                            <td>{{ $sub->created_by_name }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($sub->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/dsubject/update/'.$sub->id) }}"
                                                    class="btn btn-success">Update</a>
                                                <a href="{{ url('admin/subject/delete/' . $sub->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="datatable-bottom">
                            <div class="datatable-info"> {{ $subject->onEachSide(1)->links() }}</div>
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

