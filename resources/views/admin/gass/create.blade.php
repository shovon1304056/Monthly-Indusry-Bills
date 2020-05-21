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
                            <h4 class="card-title ">Gass</h4>


                        </div>
                        <div class="col-md-3">
                            <a href="{{route('gass.index')}}" class="btn btn-danger">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form method="post" action="{{route('gass.store')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group ">
                                                <label class="control-label">Date</label>
                                                <input type="date" class="form-control" name="g_date" id="my_date">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Amount</label>
                                                <input type="number" class="form-control" name="g_amount">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <label class="control-label">File</label>
                                            <input type="file"  name="g_file">


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
