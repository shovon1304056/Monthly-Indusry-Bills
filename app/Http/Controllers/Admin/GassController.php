<?php

namespace App\Http\Controllers\Admin;

use App\Gass;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class GassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gasses = Gass::orderBy('id','DESC')->get();
        return view('admin.gass.index',compact('gasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.gass.create');
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
       /* $request->validate([
           'g_date'=>'required',
           'g_amount'=>'required',
           'g_file'=>'required'
        ]);*/
        if($request->file('g_file'))
        {
            $file = $request->file('g_file');
        $slug = Str::slug($request->g_file->getClientOriginalName());

        if (isset($file))
        {
            $current_date = Carbon::now()->toDateString();
            $fileName = $slug .'.'. $file->getClientOriginalExtension();

            if (!file_exists('uploads/file'))
            {
                mkdir('uploads/file',0777,true);
            }
            $file->move('uploads/file',$fileName);
        }
        }
        
       

        $gass = new  Gass();

        $gass->g_date = $request->g_date;
        $gass->g_amount = $request->g_amount;
        if($request->file('g_file'))
        {
            $gass->g_file = $fileName;
        }
        

        $gass->save();

        if ($gass)
        {
            return redirect()->route('gass.index')->with('success','Record Added');
        }
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
        $gass = Gass::findorFail($id);
        return view('admin.gass.show',compact('gass','id'));
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
        $gass = Gass::findorFail($id);
        return view('admin.gass.edit',compact('gass','id'));
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
       /* $request->validate([
           'g_date'=>'required',
           'g_amount'=>'required',
           'g_file'=>'required'
        ]);*/

        $gass = Gass::findorFail($id);

        if($request->file('g_file'))
        {
            $file = $request->file('g_file');
        $slug = Str::slug($request->g_file->getClientOriginalName());

        if (isset($file))
        {
            $current_date = Carbon::now()->toDateString();
            $fileName = $slug .'.'. $file->getClientOriginalExtension();

            if (!file_exists('uploads/file'))
            {
                mkdir('uploads/file',0777,true);
            }
            $file->move('uploads/file',$fileName);
        }
        }
        
       

        $gass->g_date = $request->g_date;
        $gass->g_amount = $request->g_amount;
         if($request->file('g_file'))
        {
            $gass->g_file = $fileName;
        }
        

        $gass->save();

        if ($gass)
        {
            return redirect()->route('gass.index')->with('success','Data Edited');
        }
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
        $gass = Gass::findorFail($id);

        if($gass->g_file != null)
        {
            if (file_exists('uploads/file/'.$gass->g_file))
        {
            unlink('uploads/file/'.$gass->g_file);
        }
        }

        

        $gass->delete();

        return redirect()->route('gass.index')->with('success','Record Deleted');
    }

    public function download_gass($id)
    {
       
         $file =DB::table('gasses')->where('id',$id)->first();
         $download_file = $file->g_file;
          
         if (file_exists('uploads/file/'.$download_file))
        {
           
           return  response()->download(public_path('uploads/file/'.$download_file));
        }
        else{
            return redirect()->route('gass.index')->with('success','Data Not Found');
        }
   
    }
}
