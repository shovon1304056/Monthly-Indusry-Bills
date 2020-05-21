@extends('layouts.app')
@section('title',"Electricity")
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
                            <h4 class="card-title ">Details</h4>


                        </div>
                        <div class="col-md-3">
                            <a href="{{route('electricity.index')}}" class="btn btn-danger">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-md-6">


                                        <div class="form-group label-floating">
                                            <label class="control-label">Date</label>
                                            <p>{{date('d/m/Y',strtotime($electricity->e_date))}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">


                                        <div class="form-group label-floating">
                                            <label class="control-label">Amount</label>
                                            <p>{{$electricity->e_amount}}</p>
                                        </div>
                                    </div>
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

@endpush
