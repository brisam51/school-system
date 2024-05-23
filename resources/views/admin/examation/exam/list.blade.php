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
                        <form action="" method="get">
                            @csrf
                            <div class="d-flex flex-row">
                                <div class="form-group m-2" style="width: 200px; ">
                                    <label for="">Exam Name</label>
                                    <input type="text" value="{{ Request::get('name') }}" name="name"
                                        class="form-control ">
                                </div>
                                <div class="form-group m-2" style="width: 200px;">
                                    <label for="">Exam Date</label>
                                    <input type="date" value="{{ Request::get('exam_date') }}" name="exam_date"
                                        class="form-control">
                                </div>
                                <div class="form-group m-2  pt-4" style="width: 200px;">

                                        <button class="btn btn-primary " type="submit">
                                            <label for=""><i class="fa fa-search"
                                                    aria-hidden="true">Search</i></label>
                                        </button>
                                        <a href="{{ url('admin/exam/list') }}" class="btn btn-success">Rest</a>
                                

                                </div>


                            </div>
                        </form>

                    </div>

                    <div class="col">
                        <div style="text-align: right">
                            <a href="{{ url('admin/exam/add') }}" class="btn btn-primary">Add new Exam</a>
                        </div>
                    </div>


                </div>
                <div class="card mt-4 ">
                    <div class="card-header d-flex justify-content-center text-dark">
                        <h2>Exam List</h2>
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
                                                class="datatable-sorter">Note</button></th>
                                        <th data-sortable="true" style="width: 10.320939334637966%;"><button
                                                class="datatable-sorter">Exam Date</button></th>
                                        <th data-sortable="true" style="width: 15.76320939334638%;"><button
                                                class="datatable-sorter">Created By</button></th>
                                        <th data-sortable="true" style="width: 15.76320939334638%;"><button
                                                class="datatable-sorter">Created Date</button></th>
                                        <th data-sortable="true" style="width: 19.960861056751465%;"><button
                                                class="datatable-sorter">Action</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Records as $exam)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $exam->name }}</td>
                                            <td>{{ $exam->note }}</td>
                                            <td>{{ $exam->exam_date }}</td>
                                            <td>{{ $exam->created_by_name }}</td>
                                            <td>{{ $exam->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ url('admin/exam/edit/' . $exam->id) }}"
                                                        class="btn btn-primary "
                                                        style="width: 80px; margin-right:5px;">Edit</a>
                                                    <a href="{{ url('admin/exam/delete/' . $exam->id) }}"
                                                        class="btn btn-danger" style="width: 80px;">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="datatable-bottom">
                            {{-- <div class="datatable-info"> {{ $subject->onEachSide(1)->links() }}</div> --}}
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
