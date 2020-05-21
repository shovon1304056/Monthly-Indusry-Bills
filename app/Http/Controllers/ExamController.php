<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    //
    public function frontend()
    {
        $exams = Exam::all();
        return view('exam.frontend',compact('exams'));
    }

    public function upload(Request $request)
    {
            return view('exam.upload');
    }
    public function upload_file(Request $request)
    {
        //
        $request->validate([
            'exam_file'=>'required'
        ]);

        $files = $request->file('exam_file');
        foreach ($files as $file) {

            $slug = Str::slug('exam&&');

            if (isset($file)) {
                $current_date = Carbon::now()->toDateString();
                $fileName = $slug . '-' . $current_date . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                if (!file_exists('uploads/file')) {
                    mkdir('uploads/file', 0777, true);
                }
                $file->move('uploads/file', $fileName);
            } else {
                $fileName = 'default.abc';
            }

            $exam = new  Exam();


            $exam->exam_file = $fileName;

            $exam->save();
        }
        if ($exam)
        {
            return redirect()->route('exam.frontend')->with('success','Record Added');
        }
    }
    public function destroy($id)
    {
        //
        $exam = Exam::findorFail($id);
        if (file_exists('uploads/file/'.$exam->exam_file))
        {
            unlink('uploads/file/'.$exam->exam_file);
        }
        $exam->delete();

        return redirect()->route('exam.frontend')->with('success','Record deleted');



    }
    public function deleteAll(Request $request){
        $ids = $request->get('ids');
        $dbs= DB::delete('delete from exams where id in('.implode(",",$ids).')');
        return redirect()->route('exam.frontend')->with('success','Record deleted');

    }

}
