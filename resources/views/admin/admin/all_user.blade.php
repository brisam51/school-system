@extends('layouts.master')

@section('title')
    {{ $data }}
@endsection
@section('maintopic')
    Manager
@endsection

@section('homepage')
    All Users
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
                <div style="text-align: right">
                    <a href="{{ url('admin/new_admin') }}" class="btn btn-primary">Add new Admin</a>

                </div>
                <div class="card">
                    <div class="card-body">


                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">

                                <div class="d-flex flex-row">
                                    <form action="{{ url('admin/search') }} " method="post">
                                        @csrf
                                        <div class="d-flex flex-row ">
                                            <input type="text" name="name" class="form-control" id="name">

                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>

                                    </form>


                                </div>
                            </div>
                            <div class="datatable-container">
                                <table class="table datatable datatable-table">
                                    <thead>
                                        <tr>
                                            {{-- {{(query1.data.offset.toNumber() + ($index + 1))}} --}}
                                            <th data-sortable="true" style="width: 7.320939334637966%;"><button
                                                    class="datatable-sorter">#</button></th>
                                                    <th data-sortable="true" style="width: 7.320939334637966%;"><button
                                                        class="datatable-sorter">picture</button></th>
                                            <th data-sortable="true" style="width: 15.320939334637966%;"><button
                                                    class="datatable-sorter">Name</button></th>
                                                    <th data-sortable="true" style="width: 15.320939334637966%;"><button
                                                        class="datatable-sorter">Last Name</button></th>
                                            <th data-sortable="true" style="width: 20.51859099804305%;"><button
                                                    class="datatable-sorter">Email</button></th>
                                            <th data-sortable="true" style="width: 10.76320939334638%;"><button
                                                    class="datatable-sorter">Role</button></th>
                                            <th data-sortable="true" style="width: 10.76320939334638%;"><button
                                                    class="datatable-sorter">Created_at</button></th>
                                            <th data-sortable="true" style="width: 19.960861056751465%;"><button
                                                    class="datatable-sorter">Action</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($alluser as $user)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    @if($user->user_type==1)
                                                    <img  style="width: 100px; height:100px; " src="{{ asset('public/images/admin/'.$user->profile_pic) }}" alt="">
                                                    @elseif($user->user_type==2)
                                                    <img  style="width: 100px; height:100px; " src="{{ asset('public/images/students/'.$user->profile_pic) }}" alt="">
                                                    @elseif($user->user_type==3)
                                                    <img  style="width: 100px; height:100px; " src="{{ asset('public/images/teachers/'.$user->profile_pic) }}" alt="">
                                                    @elseif($user->user_type==4)
                                                    <img  style="width: 100px; height:100px; " src="{{ asset('public/images/parents/'.$user->profile_pic) }}" alt="">
                                                    @endif

                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user['user_type'] == 1)
                                                        admin
                                                    @elseif ($user['user_type'] == 2)
                                                        Student
                                                    @elseif ($user['user_type'] == 3)
                                                        Teacher
                                                    @elseif ($user['user_type'] == 4)
                                                        Parent
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td style="min-width: 180px;">
                                                    <a href="{{ url('admin/update/' . $user->id) }}"
                                                        class="btn btn-primary btn-sm">Update</a>

                                                    @if ($user['user_type'] == 2)
                                                        <a href={{ url('admin/delete/' . $user->id) }}
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    @elseif ($user['user_type'] == 3)
                                                        <a href={{ url('admin/delete/' . $user->id) }}
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    @elseif ($user['user_type'] == 4)
                                                        <a href={{ url('admin/delete/' . $user->id) }}
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="datatable-bottom">

                                <nav class="datatable-pagination">
                                    <ul class="datatable-pagination-list">
                                        <div class="datatable-info"> {{ $alluser->onEachSide(1)->links() }}</div>

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
