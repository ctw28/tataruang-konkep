<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use App\Models\TkprdKegiatan;
use App\Models\TkprdSurvey;
use App\Models\TkprdSurveyFile;
use App\Models\TkprdSurveyFileKategori;
use Carbon\Carbon;


class TkprdKegiatanController extends Controller
{
    //ini untuk admin
    public function index()
    {
        $data['title'] = "Kegiatan TKPRD";
        $data['dataTkprdKegiatan'] = TkprdKegiatan::all();
        return view('admin.tkprd-kegiatan.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah TKPRD";
        return view('admin.tkprd-kegiatan.create', $data);
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $slug = Str::slug($request->tkprd_kegiatan, '-');
            $name = $slug . "." . $request->file('surat_permohonan')->getClientOriginalExtension();
            $request->file('surat_permohonan')->move(public_path() . '/tkprd/', $name);
            $data = [
                'tkprd_kegiatan' => $request->tkprd_kegiatan,
                'tkprd_kegiatan_slug' => $slug,
                'tkprd_kegiatan_investor' => $request->tkprd_kegiatan_investor,
                'tkprd_kegiatan_surat' => $name,
                'tkprd_kegiatan_catatan' => $request->tkprd_kegiatan_catatan,
            ];
            $tkprdKegiatan = TkprdKegiatan::create($data);
            DB::commit();
            return redirect()->route('admin.tkprd.kegiatan.kelola', $tkprdKegiatan->id);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }


    public function edit($id)
    {
        $data['title'] = "Tambah TKPRD";
        $data['data'] = TkprdKegiatan::find($id);
        return view('admin.tkprd-kegiatan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        try {
            $kegiatan = TkprdKegiatan::find($id);
            $kegiatan->tkprd_kegiatan = $request->tkprd_kegiatan;
            $kegiatan->tkprd_kegiatan_slug = Str::slug($request->tkprd_kegiatan, '-');
            $kegiatan->tkprd_kegiatan_investor = $request->tkprd_kegiatan_investor;
            $kegiatan->tkprd_kegiatan_catatan = $request->tkprd_kegiatan_catatan;
            $kegiatan->save();
            return redirect()->route('admin.tkprd.kegiatan.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $kegiatan = TkprdKegiatan::find($id);
            $kegiatan->delete();
            return redirect()->route('admin.tkprd.kegiatan.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //ini untuk kelola kegiatan TKPRD
    public function kelola($id)
    {
        // return $id;
        $data['title'] = "Kelola TKPRD";
        $data['data'] = TkprdKegiatan::find($id);
        $data['dataSurvey'] = TkprdSurvey::where('tkprd_kegiatan_id', $id)->get();

        return view('admin.tkprd-kegiatan.kelola', $data);
    }
    public function kelolaSurvey($kegiatanId)
    {
        // return $id;
        $data['title'] = "Kelola TKPRD";
        $data['data'] = TkprdKegiatan::find($kegiatanId);
        $data['dataFileKategori'] = TkprdSurveyFileKategori::all();

        return view('admin.tkprd-kegiatan.kelola', $data);
    }

    public function surveyStore(Request $request, $kegiatanId)
    {
        // return $request->all();
        DB::beginTransaction();
        try {
            $data = [
                'tkprd_kegiatan_id' => $kegiatanId,
                'tkprd_survey_tanggal' => $request->tkprd_survey_tanggal,
                'tkprd_survey_lokasi' => $request->tkprd_survey_lokasi,
                'tkprd_survey_catatan' => $request->tkprd_survey_catatan,
            ];
            TkprdSurvey::create($data);
            DB::commit();
            return array('status' => true, 'data' => $data);
        } catch (\Throwable $th) {
            DB::rollback();
            return array('status' => false);
            throw $th;
        }
    }

    public function surveyIndex($kegiatanId)
    {
        try {
            $data = TkprdSurvey::where('tkprd_kegiatan_id', $kegiatanId)->orderBy('tkprd_survey_tanggal', 'DESC')->get();
            return array('status' => true, 'data' => $data);
        } catch (\Throwable $th) {
            return array('status' => false, 'data' => []);
            throw $th;
        }
    }

    public function surveyGet($kegiatanId, $surveyId)
    {
        try {
            $data = TkprdSurvey::find($surveyId);
            return array('status' => true, 'data' => $data);
        } catch (\Throwable $th) {
            return array('status' => false, 'data' => []);
            throw $th;
        }
    }

    public function surveyUpdate(Request $request, $kegiatanId, $surveyId)
    {
        // return $request->all();
        try {
            $survey = TkprdSurvey::find($surveyId);
            $survey->tkprd_survey_tanggal = $request->tkprd_survey_tanggal;
            $survey->tkprd_survey_lokasi = $request->tkprd_survey_lokasi;
            $survey->tkprd_survey_catatan = $request->tkprd_survey_catatan;
            $survey->save();
            return array('status' => true, 'data' => $survey);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function surveyDelete($surveyId)
    {
        try {
            $survey = TkprdSurvey::find($surveyId);
            $survey->delete();
            return array('status' => true, 'data' => $survey);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function surveyKelolaIndex($kegiatanId, $surveyId)
    {
        $data['title'] = "Kelola Survey";
        $data['kegiatan'] = TkprdKegiatan::find($kegiatanId);
        $data['survey'] = TkprdSurvey::find($surveyId);
        // $data['kategoriFile'] = TkprdSurveyFileKategori::all();
        $data['kategoriFile'] = TkprdSurveyFileKategori::with(['tkprdSurveyFile' => function ($surveyFile) use ($surveyId) {
            $surveyFile->where('tkprd_survey_id', $surveyId);
        }])->get();

        // return $data;
        return view('admin.tkprd-kegiatan.survey-kelola-index', $data);
    }
    public function surveyKelolaGet($kegiatanId, $surveyId, $fileKategori)
    {
        $data['kategoriFile'] = TkprdSurveyFileKategori::with(['tkprdSurveyFile' => function ($surveyFile) use ($surveyId) {
            $surveyFile->where('tkprd_survey_id', $surveyId);
        }])->where('id', $fileKategori)->get();
        return array('status' => true, 'data' => $data);

        // return $data;
        // return view('admin.tkprd-kegiatan.survey-kelola-index', $data);
    }

    public function surveyKelolaStore(Request $request, $kegiatanId, $surveyId)
    {
        // return $request->file('formnya');
        $file = $request->file('formnya');
        $name = Str::random(5) . "_" . $file->getClientOriginalName();
        if ($file->move('survey/', $name)) {
            // $surveyFile = TkprdSurvey::find($surveyId);
            $data = [
                'tkprd_survey_id' => $surveyId,
                'tkprd_survey_file_kategori_id' => $request->kategori,
                'tkprd_survey_file_path' => $name,
            ];
            TkprdSurveyFile::create($data);
            return array('status' => 'sukses');
        }
        return array('status' => 'gagal');
    }

    public function surveyKelolaDelete($fileId)
    {
        try {
            $file = TkprdSurveyFile::find($fileId);
            $file->delete();
            unlink(public_path() . '/survey/' . $file->tkprd_survey_file_path);
            return array('status' => true, 'data' => public_path() . 'survey/' . $file->tkprd_survey_file_pat);
        } catch (\Throwable $th) {
            return array('status' => $fileId);

            //throw $th;
        }
    }
}