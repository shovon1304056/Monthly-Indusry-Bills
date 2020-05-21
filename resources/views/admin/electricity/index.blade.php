@extends('layouts.app')
@section('title',"Electricity")
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
                            <h4 class="card-title ">Electricity</h4>

                        </div>
                        <div class="col-md-3">
                            <a href="{{route('electricity.create')}}" class="btn btn-info">Add New Record</a>
                        </div>


                        @include('layouts.partials.message')

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt" class="table table-striped table-bordered" style="width: 100%">
                                    <thead class="text-primary">
                                    <th width=10%>SL</th>
                                    <th width=15%>Date</th>
                                    <th width=15%>Amount</th>
                                    <th width=15%>File</th>
                                    <th width=25%>Action</th>

                                    </thead>
                                    <tbody>
                                    @foreach($electricities as $key=>$electricity)
                                        <tr>
                                        <td >{{$key+1}}</td>

                                        <td >{{date('d/m/Y',strtotime($electricity->e_date))}}</td>
                                        <td >{{$electricity->e_amount}}</td>
                                        <td > 
                                            @if($electricity->e_file != null)

                                            <a href="{{route('download_electricity',$electricity->id)}}" class="btn btn-success btn-lg"   > <i class="fa fa-download"></i>{{$electricity->e_file}}</a>

                                            @endif
                                           
                                        </td>
                                        <td >
                                            <a href="{{route('electricity.show',$electricity->id)}}" class="btn btn-info btn-sm"><i class="material-icons">details</i></a>
                                            <a href="{{route('electricity.edit',$electricity->id)}}" class="btn btn-primary btn-sm"><i class="material-icons">edit</i></a>

                                            <form method="post" action="{{route('electricity.destroy',$electricity->id)}}">
                                                {{csrf_field()}}
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete Record??')">
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
