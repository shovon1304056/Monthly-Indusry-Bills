<!--     <?php 
$total_gass = DB::table('gasses')->get()->sum('g_amount');
$total_electricity = DB::table('electricities')->get()->sum('e_amount');

    ?> -->


    @extends('layouts.app')

    @section('title',"Dashboard")

@push('css')


@endpush


@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">directions_boat</i>
                  </div>
                  <p class="card-category">Last Recharge </p>
                  <h3 class="card-title">Date : {{$g_last_recharge_date}}
                  </h3>
                   <br>
                  <h3 class="card-title">Amount : {{$g_last_recharge_amount}}
                  </h3>
                 
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
                  </div>
                </div>
              </div>
            </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">ac_unit</i>
                  </div>
                  <p class="card-category">Total Gass Bill </p>
                  <h3 class="card-title">{{$total_gass ?? ""}} Tk
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Recharging Days</p>
                  <h3 class="card-title">{{$e_years }} Years - <br>{{$e_months}} Months - <br>{{$e_days}} Days</h3>
                </div>
                <div class="card-footer">
                  
                </div>
              </div>
            </div>
     
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">directions_boat</i>
                  </div>
                  <p class="card-category">Last Recharge </p>
                  <h3 class="card-title">Date : {{$e_last_recharge_date}}
                  </h3>
                   <br>
                  <h3 class="card-title">Amount : {{$e_last_recharge_amount}}
                  </h3>
                 
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">ac_unit</i>
                  </div>
                  <p class="card-category">Total Electric Bill </p>
                  <h3 class="card-title">{{$total_electricity ?? ""}} Tk 
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Recharging Days</p>
                  <h3 class="card-title">{{$g_years }} Years - <br>{{$g_months}} Months - <br>{{$g_days}} Days</h3>
                </div>
                <div class="card-footer">
                  
              </div>
            </div>
     
          </div>

        </div>
      </div>


      @endsection

      @push('scripts')


      @endpush
