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
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif

                <div class="row">
                    <div class="col">
                        <form action="" method="get">
                            @csrf
                            <div class="d-flex flex-row">

                                <div class="form-group m-2" style="width: 200px; ">
                                    <label for="">Class </label>
                                    <select name="class_id" id="" class="form-control" required>
                                        <option value=""> Select </option>
                                        @foreach ($getClassRecord as $class)
                                            <option {{ Request::get('class_id') == $class->id ? 'selected' : '' }}
                                                value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group m-2" style="width: 200px; ">
                                    <label for="">Exam </label>
                                    <select name="exam_id" id="" class="form-control" required>
                                        <option value=""> Select</option>
                                        @foreach ($getExamRecord as $exam)
                                            <option {{ Request::get('exam_id') == $exam->id ? 'selected' : '' }}
                                                value="{{ $exam->id }}">{{ $exam->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-2  pt-4" style="width: 200px;">
                                    <button class="btn btn-primary " type="submit">
                                        <label for=""><i class="fa fa-search" aria-hidden="true">Search</i></label>
                                    </button>
                                    <a href="{{ url('admin/exam_schedule') }}" class="btn btn-success">Rest</a>
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
                        <h2>Exam Schdule List</h2>
                    </div>
                    <form action="{{ url('admin/examinationa/exam_schedule_insert') }}" method="POST">

                        @csrf
                        <div class="row">
                            <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                            <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                        </div>
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

                            <div class="datatable-container">
                                <table class="table datatable datatable-table">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true" style="width: 7.320939334637966%;"><button
                                                    class="datatable-sorter">#</button></th>
                                            <th data-sortable="true" style="width:25.320939334637966%;"><button
                                                    class="datatable-sorter">Subjct Name</button></th>
                                            <th data-sortable="true" style="width: 10.320939334637966%;"><button
                                                    class="datatable-sorter">Date</button></th>
                                            <th data-sortable="true" style="width: 12.320939334637966%;"><button
                                                    class="datatable-sorter">Start Time</button></th>
                                            <th data-sortable="true" style="width: 15.76320939334638%;"><button
                                                    class="datatable-sorter">End time</button></th>
                                            <th data-sortable="true" style="width: 15.76320939334638%;"><button
                                                    class="datatable-sorter">Room Number</button></th>
                                            <th data-sortable="true" style="width: 17.960861056751465%;"><button
                                                    class="datatable-sorter">Full Mark</button></th>
                                            <th data-sortable="true" style="width: 22.960861056751465%;"><button
                                                    class="datatable-sorter">passing Mark</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($result as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value['subject_name'] }}
                                                    <input type="hidden" class="form-control"
                                                        name="schedule[{{ $i }}][subject_id]"  value="{{ $value['subject_id'] }}">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" value="{{ $value['exam_date']  }}"
                                                        name="schedule[{{ $i }}][exam_date]">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="{{ $value['start_time']  }}"
                                                        name="schedule[{{ $i }}][start_time]">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="{{ $value['end_time']  }}"
                                                        name="schedule[{{ $i }}][end_time]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{ $value['room_number']  }}"
                                                        name="schedule[{{ $i }}][room_number]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{ $value['full_marks']  }}"
                                                        name="schedule[{{ $i }}][full_marks]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{ $value['passing_mark']  }}"
                                                        name="schedule[{{ $i }}][passing_mark]">
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="text-align: center; padding:20px;">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
{{-- ======================================== --}}

@section('scripts')
@endsection
