@extends('layouts.app')
@section('title',"Gass")
@push('css')



@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partials.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">exam</h4>


                        </div>
                        <div class="col-md-3">
                            <a href="{{url('/frontend')}}" class="btn btn-danger">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form method="post" action="{{route('exam.upload_file')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="row">
                                        <div class="col-md-6">

                                            <label class="control-label">File</label>
                                            <input type="file"  name="exam_file[]" multiple>


                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Save</button>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')

    <script>
        $(function () {
            $('#my_date').datetimepicker({
                format: "dd MM yyyy ",
                showMeridian: true,
                autoClose: true,
                todayBtn: true
            });
        })
    </script>
@endpush
