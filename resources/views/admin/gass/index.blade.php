@extends('layouts.app')
@section('title',"Gass")
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
                            <h4 class="card-title ">Gass</h4>

                        </div>
                        <div class="col-md-3">
                            <a href="{{route('gass.create')}}" class="btn btn-info">Add New Record</a>
                        </div>


                        @include('layouts.partials.message')

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt" class="table table-striped table-bordered" style="width: 100%">
                                    <thead class="text-primary">
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>File</th>
                                    <th>Action</th>

                                    </thead>
                                    <tbody>
                                    @foreach($gasses as $key=>$gass)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{date('d/m/Y',strtotime($gass->g_date))}}</td>
                                            <td>{{$gass->g_amount}}</td>
                                            <td > @if($gass->g_file != null)

                                                <a href="{{route('download_gass',$gass->id)}}" class="btn btn-success btn-lg"   > <i class="fa fa-download"></i>{{$gass->g_file}}</a>

                                                @endif
                                           
                                        </td>
                                            <td>
                                                <a href="{{route('gass.show',$gass->id)}}" class="btn btn-info">
                                                    <i class="material-icons">details</i>
                                                </a>
                                                <a href="{{route('gass.edit',$gass->id)}}" class="btn btn-primary">
                                                    <i class="material-icons">edit</i>
                                                </a>

                                                <form action="{{route('gass.destroy',$gass->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to Delete??')">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
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
@endpush
