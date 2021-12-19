<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\DokumenKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    public function index($dokumenKategoriId)
    {
        $data['title'] = "Dokumen";
        $data['dokumenKategori'] = DokumenKategori::with('dokumen')->find($dokumenKategoriId);
        $data['dokumenKategoriList'] = DokumenKategori::withCount('dokumen')->get();
        $data['dokumenActive'] = $dokumenKategoriId;

        // return $data;

        return view('admin.dokumen.index', $data);

        // $data['dokumenTotal'] = Dokumen::count();
        // if ($slug == "semua") {
        //     $data['dataDokumen'] = Dokumen::get()->take(25);
        //     $data['dataDokumenJudul'] = "Semua Dokumen";
        // } else {
        //     $dataDokumen = DokumenKategori::with(['dokumen'])->where('dokumen_kategori_slug', $slug)->get()->take(25);
        //     // $kategori = DokumenKategori::where('dokumen_kategori_slug',$slug)->first();
        //     // $kategori->with('dokumen')->take(25);
        //     $data['dataDokumen'] = $dataDokumen[0]->dokumen;
        //     // $data['dataDokumen'] = $kategori->with('dokumen')->take(25);
        //     // $data['dataDokumen'] = Dokumen::with(['dokumenK'])->where('dokumen_kategori_slug',$slug)->get()->take(25);
        //     $data['dataDokumenJudul'] = $dataDokumen[0]->dokumen_kategori_nama;
        // }
        // $data['dokumenActive'] = $slug;
        // return $data;
        // return view('admin.dokumen.index');
    }

    public function create($dokumenKategoriId)
    {
        $data['title'] = "Tambah Dokumen";
        $data['dokumenKategori'] = DokumenKategori::with('dokumen')->find($dokumenKategoriId);

        return view('admin.dokumen.create', $data);
    }

    public function store(Request $request, $dokumenKategoriId)
    {
        // return $request->all();
        try {
            $request->validate([
                'dokumen_file' => 'required|mimes:pdf|max:2048',
            ]);
            $dokumenKategori = DokumenKategori::find($dokumenKategoriId);
            $fileName = Str::slug($request->dokumen_nama, '-') . '_' . time() . '.' . $request->file('dokumen_file')->getClientOriginalExtension();
            $request->file('dokumen_file')->move(public_path() . '/dokumen-upload/' . $dokumenKategori->dokumen_kategori_slug, $fileName);
            $userId = Auth::user()->id;
            $data = [
                'dokumen_kategori_id' => $dokumenKategoriId,
                'user_id' => $userId,
                'dokumen_nama' => $request->dokumen_nama,
                'dokumen_slug' => Str::slug($request->dokumen_nama, '-'),
                'dokumen_tanggal' => $request->dokumen_tanggal,
                'dokumen_lokasi_file' => $fileName,
                'dokumen_keterangan' => $request->dokumen_keterangan,
            ];
            // return $data;
            Dokumen::create($data);
            return redirect()->route('admin.dokumen.index', $dokumenKategoriId);
            return $request->all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Dokumen $dokumen)
    {
        //
    }

    public function edit(Dokumen $dokumen)
    {
        //
    }

    public function update(Request $request, Dokumen $dokumen)
    {
        //
    }

    public function destroy(Dokumen $dokumen)
    {
        //
    }
}
