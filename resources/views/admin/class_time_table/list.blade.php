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
    <div class="card">
        <div class="card-header">
            heder
        </div>
        <div class="card-body">

            <form action="">
                @csrf
                <Fdiv class="row">
                    <div class="form-group col-md-3 p-2">
                        <label for="my-input">Class name</label>
                        <select class="form-control getClass" id="getClass" name="class_id" required>
                            <option value=" ">--Select Class--</option>
                            @foreach ($getClass as $class)
                                <option value="{{ $class->id }}"
                                    {{ Request::get('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3 p-2">
                        <label for="my-input">Subject Name</label>
                        <select class="form-control " id="getSubject" name="subject_id">
                            <option value="">Select</option>
                            @if (!empty($getSubject))
                             @foreach ($getSubject as $subject)
                                <option value="{{ $subject->id }}"
                                    {{ Request::get('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}
                                </option>
                            @endforeach
                            @endif

                        </select>
                    </div>
                    <div class="col-auto ">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                        <a href="{{ url('admin/class_timetable/list') }}" class="btn btn-danger mt-4">Reste</a>
                    </div>
        </div>
        </form>
    </div>
    {{-- start  Card  which have table--}}
    <div class="card ">
        <div class="card-body"></div>
    </div>


    </div>

    </div>
@endsection

{{-- ======================================== --}}

@section('scripts')
    <script type="text/javascript">
        $(".getClass").change(function() {
            var class_id = $(this).val();

            $.ajax({
                type: "post",
                url: "{{ url('admin/class_timetable/get_subject') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    class_id: class_id,

                },
                dataType: "json",
                success: function(response) {
                    $("#getSubject").html(response.html);
                },
            });

        });
    </script>
@endsection
