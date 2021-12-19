<?php

namespace App\Http\Controllers;

use App\Models\DokumenKategori;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class DokumenKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Dokumen";
        $data['dokumenKategori'] = DokumenKategori::withCount('dokumen')->get();
        return view('admin.dokumen.kategori-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = "Tambah Kategori Dokumen";
        return view('admin.dokumen.kategori-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->request->add(['dokumen_kategori_slug' => Str::slug($request->dokumen_kategori_nama, '-')]); //add request
            DokumenKategori::create($request->all());
            return redirect()->route('admin.dokumen.kategori.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DokumenKategori  $dokumenKategori
     * @return \Illuminate\Http\Response
     */
    public function show(DokumenKategori $dokumenKategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DokumenKategori  $dokumenKategori
     * @return \Illuminate\Http\Response
     */
    public function edit(DokumenKategori $dokumenKategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DokumenKategori  $dokumenKategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DokumenKategori $dokumenKategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DokumenKategori  $dokumenKategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(DokumenKategori $dokumenKategori)
    {
        //
    }
}
