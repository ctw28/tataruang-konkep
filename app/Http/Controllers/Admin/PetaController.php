<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PetaKategori;
use App\Models\Peta;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use XBase\TableReader;
use XBase\TableEditor;

class PetaController extends Controller
{
    public function index()
    {
        $data['title'] = "Peta";
        $data['petaKategori'] = PetaKategori::all();
        $data['dataDokumenJudul'] = "Semua";
        $data['dataPeta'] = Peta::get()->take(25);
        // return $data;
        return view('admin.peta.index', $data);
    }
    public function petaKategoriShow($kategoriId)
    {
        $data['title'] = "Kategori Peta";
        $data['petaKategori'] = PetaKategori::all();
        $data['petaKategoriDetail'] = PetaKategori::with(['peta'])->where('id', $kategoriId)->get();
        // return $data;
        return view('admin.peta.index', $data);
    }
    public function petaKategoriCreate()
    {
        $data['title'] = "Kategori Peta";
        return view('admin.peta.kategori-create', $data);
    }

    public function petaKategoriStore(Request $request)
    {
        try {
            $data = [
                'peta_kategori_nama' => $request->peta_kategori_nama,
                'peta_kategori_slug' => Str::slug($request->peta_kategori_nama, '-'),
                'peta_kategori_deskripsi' => $request->peta_kategori_deskripsi,
            ];
            PetaKategori::create($data);
            File::makeDirectory(public_path() . "/" . Str::slug($request->peta_kategori_nama, '-'));

            return redirect()->route('admin.peta.kategori.index');
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function petaList()
    {
        return Peta::all();
    }
    public function petaCreate($kategoriId)
    {
        $data['title'] = "Tambah Peta";
        $data['petaKategori'] = PetaKategori::where('id', $kategoriId)->first();

        return view('admin.peta.peta-create', $data);
    }
    public function petaStore(Request $request, $kategoriId)
    {
        try {

            // $this->validate($request, [
            //     'filenames' => 'required',
            //     'filenames.*' => 'mimes:doc,pdf,docx,zip'
            // ]);
            $data = [];
            $petaKategori = PetaKategori::find($kategoriId);
            $path = $petaKategori->peta_kategori_slug;
            if ($request->hasfile('files')) {
                foreach ($request->file('files') as $file) {
                    $name = Str::slug($request->peta_nama, '-') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/' . $path, $name);
                    $data[] = $name;
                }
            }
            // return $data;

            $data = [
                'peta_kategori_id' => $kategoriId,
                'peta_nama' => $request->peta_nama,
                'peta_slug' => Str::slug($request->peta_nama, '-'),
                'peta_deskripsi' => $request->peta_deskripsi,
                'peta_folder_path' => $path,
            ];
            Peta::create($data);
            return redirect()->route('admin.peta.kategori.show', $kategoriId);
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function petaShow($petaKategoriId, $petaId)
    {
        try {
            $peta = Peta::with('petaKategori')->find($petaId);
            // return $peta;
            $table = new TableReader($peta->petaKategori->peta_kategori_slug . "/" . $peta->peta_slug . ".dbf");
            $header = [];
            $body = [];
            foreach ($table->getColumns() as $key => $aa) {
                $header[] = $key;
            }
            while ($record = $table->nextRecord()) {
                $rec = [];
                foreach ($header as $col) {
                    $rec[] = $record->get($col);
                }
                $body[] = (object)$rec;
            }
            $data['data'] = PetaKategori::with(['peta' => function ($peta) use ($petaId) {
                $peta->where('id', $petaId);
            }])->where('id', $petaKategoriId)->first();
            $data['title'] = "Pengaturan Peta";

            $data['header'] = $header;
            $data['body'] = $body;
            // return $data;
            return view('admin.peta.peta-pengaturan', $data);
            //             $table = new TableReader('test.dbf');

            // while ($record = $table->nextRecord()) {
            //     echo $record->get('my_column');
            //     //or
            //     echo $record->my_column;
            // }
        } catch (\Throwable $th) {
            return $th;
            return array('status' => "gagal", "info" => $th);
        }
    }

    public function editProperties(Request $request, $petaId)
    {
        try {
            // return $request->all();
            $data = [];
            $id = 0;
            foreach (json_decode($request->data) as $key) {
                foreach ($key as $index => $item) {
                    if ($index == "objectid")
                        $id = $item;
                    $data[$index] = $item;
                }
            }
            // return $data;
            // $i = array_search(20, array_column($request->data, 'objectid'));
            // $element = ($i !== false ? $request->data[$i] : "tidak ada");
            // return $element;
            // return array_search("#93ACBE", array_column(json_decode(json_encode($request->data), TRUE), 'warna'));;
            $peta = Peta::with('petaKategori')->find($petaId);
            $table = new TableEditor($peta->petaKategori->peta_kategori_slug . "/" . $peta->peta_slug . ".dbf");
            // return $table->pickRecord(1);
            $columns = [];
            foreach ($table->getColumns() as $key => $aa) {
                $columns[] = $key;
            }
            // $i = 0;
            while ($record = $table->nextRecord()) {
                $recordId = array_values((array)$record)[1]['objectid'];
                if ($recordId == $id) {
                    foreach ($data as $index => $item) {
                        $record->$index = $item;
                    }
                    $table->writeRecord();
                    break;
                }
                // $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                // $record->warna = $randomColor;
                // $record->set('warna', 'ini warna');
                // }
                // return $cari;
            }

            $table->save()->close();
            return array('status' => "sukses");
        } catch (\Throwable $th) {
            return $th;
            return array('status' => "gagal", "info" => $th);
        }
    }

    public function randomColor($petaId)
    {
        try {
            $peta = Peta::with('petaKategori')->find($petaId);
            $table = new TableEditor($peta->petaKategori->peta_kategori_slug . "/" . $peta->peta_slug . ".dbf");
            while ($record = $table->nextRecord()) {
                $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                $record->warna = $randomColor;
                $table->writeRecord();
            }
            $table->save()->close();
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th;
            return array('status' => "gagal", "info" => $th);
        }
    }
}
