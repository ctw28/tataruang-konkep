<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Shapefile\Shapefile;
use Shapefile\ShapefileException;
use Shapefile\ShapefileReader;
use org\majkel\dbase\Table;
use XBase\TableReader;
use XBase\TableEditor;
use XBase\Header\HeaderFactory;
use XBase\Enum\TableType;
use XBase\Header\Column;
use XBase\TableCreator;
use App\Models\PetaKategori;
use App\Models\Peta;

class MapController extends Controller
{
    // public function __construct(){
    //     $closed_rings = Shapefile::ACTION_FORCE;
    // }
    private $originPath;
    public function __construct()
    {
        $this->originPath = "./data";
    }

    public function index()
    {
        $data['peta'] = Peta::all();
        return view('web.map-view', $data);
    }

    public function convertType($type)
    {
        if ($type == 'PolygonM')
            return "Polygon";
        else if ($type == 'PointM')
            return "Point";
        else if ($type == 'MultiLineStringM')
            return "MultiLineString";
        else if ($type == 'MultiPointM')
            return "MultiPoint";
        else if ($type == 'MultiPolygonM')
            return "MultiPolygon";
        return $type;
    }

    public function shpToGeojson($petaId)
    {
        try {
            // $Shapefile = new ShapefileReader('mygeodata/TES-polygon.shp');
            $peta  = Peta::with('petaKategori')->find($petaId);
            // $testShp = 1;
            // $geoData=[];
            // $shpData = [
            //     ["path" => $this->originPath."/Administrasi/Batas_Desa/Batas_Desa.shp", "geotype"=>"Polygon"],
            //     ["path" => $this->originPath."/Administrasi/Batas_Kecamatan/Batas_Kecamatan.shp", "geotype"=>"MultiPolygon"],
            // ];

            // $Shapefile = new ShapefileReader($shpData[$testShp]["path"]);
            $Shapefile = new ShapefileReader(public_path() . "/" . $peta->petaKategori->peta_kategori_slug . "/" . $peta->peta_slug);
            foreach ($Shapefile as $i => $Geometry) {
                if ($Geometry->isDeleted()) {
                    continue;
                }
                $geoJson = json_decode($Geometry->getGeoJSON($flag_bbox = false, $flag_feature = true));
                $geoJson->geometry->type = $this->convertType($geoJson->geometry->type);
                $geoData[] = $geoJson;
            }
            return json_encode($geoData);
        } catch (ShapefileException $e) {
            // Print detailed error information
            echo "Error Type: " . $e->getErrorType()
                . "\nMessage: " . $e->getMessage()
                . "\nDetails: " . $e->getDetails();
        }
    }

    public function dbf_reader()
    {
        try {
            $table = new TableEditor($this->originPath . "/Administrasi/Batas_Kecamatan/Batas_Kecamatan.dbf");
            //             $table = new TableReader('test.dbf');

            // while ($record = $table->nextRecord()) {
            //     echo $record->get('my_column');
            //     //or
            //     echo $record->my_column;
            // }
            $columns = [];
            $render = "<table border='1'>";
            $render .= "<thead>";
            $render .= "<tr>";
            foreach ($table->getColumns() as $key => $aa) {
                $render .= "<th>$key</th>";
                $columns[] = $key;
            }
            $render .= "</tr>";
            $render .= "</thead>";
            $render .= "<tbody>";
            $i = 1;
            while ($record = $table->nextRecord()) {
                // if($record->get('id')==1){
                //     // $record->set('name')="aaaa";
                //     $record->set('name', 'beaaaaarubah');
                // }
                $render .= "<tr>";
                foreach ($columns as $col) {
                    $render .= "<td>" . $record->get($col) . "</td>";
                }

                $render .= "</tr>";
                $i++;
                $table->writeRecord();
            }
            $render .= "</tbody>";
            $render .= "</table>";

            $table
                ->save()
                ->close();
            echo $render;
            // return array('status'=>"sukses");
        } catch (\Throwable $th) {
            return $th;
            return array('status' => "gagal", "info" => $th);
        }

        // var_dump($record);
    }
    public function dbf_add_column()
    {
        $totalSum = 0;

        $dbf = Table::fromFile('/media/bandrigo/WORK/My Project/Data/Garis_Pantai1984.dbf');

        foreach ($dbf as $record) {
            // returns all records includeing deleted ones
            if (!$record->isDeleted()) {
                $totalSum += $record->int_val;
            }
        }

        // echo "Total sum is $totalSum, 5th description: {$record[4]['description']}\n";
        // try {
        //     $header = HeaderFactory::create(TableType::DBASE_III_PLUS_MEMO);
        //     $filepath = '/media/bandrigo/WORK/My Project/Data/Garis_Pantai1984.dbf';

        //     $table = new TableEditor('/media/bandrigo/WORK/My Project/Data/Garis_Pantai1984.dbf');
        //     return $table->getMemoColumns();
        //     $table
        //         ->addColumn(new Column([
        //             'name'   => 'warna',
        //             'type'   => FieldType::CHAR,
        //             'length' => 20,
        //         ]))
        //         ->save(); //creates file

        //         // $table = new TableEditor($filepath);
        //     return array('status'=>"sukses");
        // } catch (\Throwable $th) {
        //     return $th;
        //     // return array('status'=>"gagal");
        // }

        // var_dump($record);
    }
}
