<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\DokumenKategori;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index($slug)
    {
        $data['title'] = "Dokumen";
        $data['dokumenKategori'] = DokumenKategori::withCount('dokumen')->get();
        // $data['dokumenActive'] = 1;
        $data['dokumenTotal'] = Dokumen::count();
        if ($slug == "semua") {
            $data['dataDokumen'] = Dokumen::get()->take(25);
            $data['dataDokumenJudul'] = "Semua Dokumen";
        } else {
            $dataDokumen = DokumenKategori::with(['dokumen'])->where('dokumen_kategori_slug', $slug)->get()->take(25);
            // $kategori = DokumenKategori::where('dokumen_kategori_slug',$slug)->first();
            // $kategori->with('dokumen')->take(25);
            $data['dataDokumen'] = $dataDokumen[0]->dokumen;
            // $data['dataDokumen'] = $kategori->with('dokumen')->take(25);
            // $data['dataDokumen'] = Dokumen::with(['dokumenK'])->where('dokumen_kategori_slug',$slug)->get()->take(25);
            $data['dataDokumenJudul'] = $dataDokumen[0]->dokumen_kategori_nama;
        }
        $data['dokumenActive'] = $slug;
        // return $data;
        return view('web.dokumen', $data);
    }
}
