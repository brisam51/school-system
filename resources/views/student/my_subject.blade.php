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

            <div class="card">
                <div class="card-header d-flex justify-content-center bg-success text-white">
                    {{ $header_title }}
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
                                    <th data-sortable="true" style="width: 13.320939334637966%;"><button
                                            class="datatable-sorter">Subject Type</button></th>
                                            <th data-sortable="true" style="width: 13.320939334637966%;"><button
                                                class="datatable-sorter">Class name</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject as $sub)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sub->subject_name }}</td>
                                        <td>
                                            @if ($sub->subject_type == 0)
                                                Theory
                                            @else
                                                practical
                                            @endif
                                        </td>
                                        <td>{{ $sub->class_name }}</td>



                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="datatable-bottom">

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
