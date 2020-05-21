<?php

namespace App\Http\Controllers\Admin;

use App\Electricity;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class ElectricityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $electricities= Electricity::orderBy('id','DESC')->get();;
        return view('admin.electricity.index',compact('electricities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.electricity.create');
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
           'e_date'=>'required',
           'e_amount'=>'required',
           
        ]);*/
        if($request->file('e_file'))
        {
            $file= $request->file('e_file');
        $slug = Str::slug($request->e_file->getClientOriginalName());
        if(isset($file))
        {
            $currentDate = Carbon::now()->toDateString();
            $fileName = $slug .'.'. $file->getClientOriginalExtension();
            if (!file_exists('uploads/file')){
                mkdir('uploads/file',0777,true);
            }
            $file->move('uploads/file',$fileName);
        }
        
        }
        

        $electricity = new Electricity();
        $electricity->e_date = $request->e_date;
        $electricity->e_amount = $request->e_amount;
        if($request->file('e_file'))
        {
            $electricity->e_file = $fileName;
        }
        

        $electricity->save();

        if($electricity)
        {
            return redirect()->route('electricity.index')->with('success','Data Added');
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
        $electricity = Electricity::findorFail($id);
        return view('admin.electricity.show',compact('electricity','id'));
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
        $electricity = Electricity::findorFail($id);
        return view('admin.electricity.edit',compact('electricity','id'));
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
        

        $electricity = Electricity::findorFail($id);

        if($request->file('e_file'))
        {
        $file = $request->file('e_file');
        $slug = Str::slug($request->e_file->getClientOriginalName());

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

        
        

        $electricity->e_date = $request->e_date;
        $electricity->e_amount = $request->e_amount;
        if($request->file('e_file'))
        {
            $electricity->e_file = $fileName;
        }


        $electricity->save();
        //dd($electricity);
        if ($electricity)
        {
           // return 1;
            return redirect()->route('electricity.index')->with('success',"Data Edited");
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
        $electricity = Electricity::findorFail($id);

        if($electricity->e_file != null)
        {
           if (file_exists('uploads/file/'.$electricity->e_file))
        {
            unlink('uploads/file/'.$electricity->e_file);
        } 
        }

        
        $electricity->delete();

        return redirect()->route('electricity.index')->with('success','Data Deleted');
    }

    public function download_electricity($id)
    {
       
         $file =DB::table('electricities')->where('id',$id)->first();
         $download_file = $file->e_file;
          //print_r($download_file);die();
         //dd(storage_path($download_file));

         if (file_exists('uploads/file/'.$download_file))
        {
           /*return Storage::download($file->path,$download_file);*/
           return  response()->download(public_path('uploads/file/'.$download_file));
        }
        else{
            return redirect()->route('electricity.index')->with('success','Data Not Found');
        }
   
    }

    /*public function download($file)
    {
      $url = Storage::url($file);


        $download=DB::table('electricities')->get();
        return response()->download(storage_path('app/upload/' . $url));
        // view("files.download", compact('$download'));
    }*/
}
