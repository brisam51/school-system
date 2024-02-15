<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card">
        @if (!empty('getSearchStudent'))
            <div class="card-header">
                Student List
            </div>
            <!--card-header -->
            <div class="card-body" style="overflow:auto;">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            #</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">
                                            First Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">
                                            Last Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">
                                            email
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">
                                            Parent Name
                                        </th>


                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">
                                            Action
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (is_array($getSearchStudent) || is_object($getSearchStudent))
                                        @foreach ($getSearchStudent as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img style="width: 70px; border-radius:40px"
                                                        src="{{ asset('public/asstes/img/profile/' . $value->profile_pic) }}"
                                                        alt="#">
                                                </td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->last_name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->parent_name }}</td>
                                                <td>
                                                    <a href="{{ url('admin/parent/assign_student_parent/' . $value->id . '/' . $parent_id) }}"
                                                        class="btn btn-primary">Add To Parents</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        @endif
    </div>

</body>
</html>


{{-- vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv --}}
<div class="card">
    <div class="card-header">
        Parent Student List {{ $getparent->name }}
    </div>
    <!--card-header -->
    <div class="card-body" style="overflow:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">

            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                        aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                    rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    #</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                    rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    Image</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                    First Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                    Last Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    email
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">
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
                                            src="{{ asset('public/asstes/img/profile/' . $value->profile_pic) }}"
                                            alt="#">
                                    </td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->last_name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->parent_name }}</td>
                                    <td>
                                        <a href="{{ url('admin/parent/assign_student_parent_delete/' . $value->id ) }}"
                                            class="btn btn-primary">Delete Parents</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- /.card-body -->
</div>
