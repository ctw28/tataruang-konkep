<?php

namespace App\Http\Controllers\Admin;

use App\Models\Survey;
use App\Models\SurveyFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function index()
    {
        $data['title'] = "Survey";
        $data['dataSurvey'] = Survey::all();
        return view('admin.survey.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Survey";
        return view('admin.survey.create', $data);
    }

    public function store(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();
        try {
            $data = [
                'survey_nama' => $request->survey_nama,
                'survey_tanggal' => $request->survey_tanggal,
                'survey_lokasi' => $request->survey_lokasi,
                'survey_catatan' => $request->survey_catatan,
            ];
            $survey = Survey::create($data);
            $dataFile = [];
            // if ($request->hasfile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $name = Str::slug($request->survey_nama, '-') . "-" . $index . "." . $file->getClientOriginalExtension();
                $file->move(public_path() . '/survey/' . Str::slug($request->survey_nama, '-'), $name);
                $dataFile[$index]['survey_id'] = $survey->id;
                $dataFile[$index]['survey_file_lokasi'] = "/survey/" . Str::slug($request->survey_nama, '-') . "/" . $name;
                $dataFile[$index]['created_at'] = \Carbon\Carbon::now();;
            }
            // }
            // return $dataFile;
            SurveyFile::insert($dataFile);
            DB::commit();
            return redirect()->route('admin.survey.index');
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
