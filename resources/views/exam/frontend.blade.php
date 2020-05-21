@extends('layouts.app')
@section('title',"Exam")
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Exam</h4>

                        </div>
                        <div class="col-md-3">
                            <a href="{{route('exam.upload')}}" class="btn btn-info">Add New Record</a>
                        </div>


                        @include('layouts.partials.message')


                        <div class="card-body">
                            <div class="table-responsive">
                                <form  method="post">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" formaction="/deleteall">DeleteAll</button>
                                    <table id="dt" class="table table-striped table-bordered" style="width: 100%">
                                        <thead class="text-primary">
                                        <th><input type="checkbox" class="selectall"></th>

                                        <th>File</th>
                                        <th>Action</th>

                                        </thead>
                                        <tbody>
                                        @foreach($exams as $key=>$exam)
                                            <tr>
                                                <td><input type="checkbox" name="ids[]" class="selectbox"
                                                           value="{{$exam->id}}"></td>
                                                <td>{{$exam->exam_file}}</td>
                                                <td>
                                                    <form method="post" action="{{route('exam.destroy',$exam->id)}}">
                                                        {{csrf_field()}}
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"
                                                                onclick="return confirm('Are You Sure to Delete Record??')">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th><input type="checkbox" class="selectall2"></th>

                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>

                                    </table>
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
        $(document).ready(function () {
            $('#dt').DataTable();
        });
    </script>

    <script type="text/javascript">
        $('.selectall').click(function () {
            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selectall2').prop('checked', $(this).prop('checked'));
        })

        $('.selectall2').click(function () {
            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selectall').prop('checked', $(this).prop('checked'));
        })

        $('.selectbox').change(function () {
            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if (total == number) {
                $('.selectall').prop('checked', true);
                $('.selectall2').prop('checked', true);
            } else {
                $('.selectall').prop('checked', false);
                $('.selectall2').prop('checked', false);
            }
        })

    </script>


@endpush
