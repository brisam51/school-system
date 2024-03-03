@extends('layouts.master')

@section('title')
@endsection

@section('maintopic')
    Assigen Calss To Teacher List ({{ $getRecord->total() }})
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
    <div class="row">
        <div class="col mb-2">

            <form class="row " action="" method="GET">
                <div class="col m-2">
                    <label for="inputPassword2">Teacher Name</label>
                    <input type="text" name="teacher_name" class="form-control" value="{{ Request::get('teacher_name') }}"
                        id="inputPassword2" >
                </div>

                <div class="col m-2">
                    <label for="inputPassword2">Class Name</label>
                    <input type="text" name="class_name" class="form-control" value="{{ Request::get('class_name') }}"
                        id="inputPassword2" >
                </div>
                <div class="col  m-2">
                    <label for="inputPassword2">Status</label>
                    <select name="status" class="form-control"  id="">
                        <option value="">Select Status</option>
                        <option  {{ (Request::get('class_name')==100)? 'selected': '' }}   value="100"  value="100">Active</option>
                        <option  {{ (Request::get('class_name')==1)? 'selected': '' }}  value="1">Inactive</option>
                    </select>
                </div>
                <div class="col  m-2">
                    <label for="inputPassword2">Created By</label>
                    <input type="text" name="created_by" class="form-control" value="{{ Request::get('created_by') }}"
                        id="inputPassword2" >
                </div>
                <div class="col  m-2">
                    <label for="inputPassword2">created at</label>
                    <input type="date" name="date" class="form-control" value="{{ Request::get('date') }}"
                        id="inputPassword2" >
                </div>

                <div class="col-auto ">

                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                    <a href="{{ route('assigen.class.list') }}" class="btn btn-danger mt-4">Reste</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card " style="overflow: auto">

        <div class="card-header bg-secondary text-white ">
            <div class="row">
                <div  class="col d-flex justify-content-end">Assigen Class Teachear</div>
                <div   class="col d-flex justify-content-end">
                    <a class="btn  btn-sm btn-primary " href="{{ route('assigen.class.add') }}">Assigen New Class</a>
                </div>
            </div>

        </div>

    </div>
    <!-- Table with stripped rows -->
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                aria-describedby="example1_info">



                <thead>
                    <tr>
                        {{-- {{(query1.data.offset.toNumber() + ($index + 1))}} --}}
                        <th>#</th>
                        <th>Class Name</th>
                        <th>Teacher First Name</th>
                        <th>Teacher Last Name</th>
                        <th>status</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Action</th>
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
                                <td style="width: 250px;">
                                    <a href="{{ url('admin/teacher/assigen_class_teacher/edit/' . $value->id) }}"
                                        class="btn btn-primary btn-sm">Edit All</a>
                                    <a href="{{ url('admin/teacher/assigen_class_teacher/edit-single/' . $value->id) }}"
                                        class="btn btn-primary btn-sm">Edit Single</a>
                                    <a href="{{ url('admin/teacher/assigen_class_teacher/delete/' . $value->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                                </td>
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
