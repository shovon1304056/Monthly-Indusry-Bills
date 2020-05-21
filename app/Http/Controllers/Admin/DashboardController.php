<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gass;
use App\Electricity;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $electricity = Electricity::all();
        $gass = Gass::all();
        
        $total_gass = DB::table('gasses')->get()->sum('g_amount');
        $total_electricity = DB::table('electricities')->get()->sum('e_amount');

$e_first = DB::table('electricities')->orderBy('e_date', 'asc')->first();
$e_last= DB::table('electricities')->orderBy('e_date', 'desc')->first();

$e_last_recharge_date = $e_last->e_date;
$e_last_recharge_amount = $e_last->e_amount;

$e_start_date = strtotime($e_first->e_date);
$e_last_date = strtotime( $e_last->e_date);
$e_dateDiff = abs($e_start_date - $e_last_date)/ (60 * 60 * 24);

$e_years = intval($e_dateDiff / 365);
$e_months = intval($e_dateDiff / 30);
$e_days = $e_dateDiff % 30;


$g_first = DB::table('gasses')->orderBy('g_date', 'asc')->first();
$g_last= DB::table('gasses')->orderBy('g_date', 'desc')->first();

$g_last_recharge_date = $g_last->g_date;
$g_last_recharge_amount = $g_last->g_amount;


$g_start_date = strtotime($g_first->g_date);
$g_last_date = strtotime( $g_last->g_date);
$g_dateDiff = abs($g_start_date - $g_last_date)/ (60 * 60 * 24);

$g_years = intval($g_dateDiff / 365);
$g_months = intval($g_dateDiff / 30);
$g_days = $g_dateDiff % 30;


/*for($i=0;$i<count($electricity);$i++){
    if($i==0)
    {
         $start_date= $electricity[0]->e_date;
    }*/
   /*if($i==count($electricity)-1)
   {
     echo "Hi";
   }*/
   
        return view('admin.dashboard',compact('total_electricity','total_gass','e_years','e_months','e_days','g_years','g_months','g_days','g_last_recharge_amount','g_last_recharge_date','e_last_recharge_date','e_last_recharge_amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
