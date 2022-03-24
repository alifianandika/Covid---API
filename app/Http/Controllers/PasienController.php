<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class PasienController extends Controller{
    // public function __construct(){
    //     // mencoba berbaur kepada CRUD pasien dengan costruct
    //     $this->costModel = new Pasien(); 
    // }

    public function index(){

        $pasien = Pasien::all();
    
        if($pasien){
            $response = [
                "message" => 'Data Ada',
                "data"  => $pasien
            ];
    
            return response()->json(['post' => $pasien], 200, $response);
        }else{
            $response = [
                "message" => 'Data Kosong'
            ];
    
            return response()->json($response, 200);
        }
    
    }
    

    public function show(Request $request, $id){

        $pasien= Pasien::find($id);
    
        if($pasien){
            $response =[
                'message' => 'mendapatkan detail data',
                'data' => $pasien
            ];
    
            return response()->json($response, 201);
    
        }else{
            $response = [
                'message' => 'data tidak ditemukan',
                'data' => $pasien
            ];
    
            return response()->json($response, 404);
        }
    }

    public function store(Request $request){

        // memberikan hak tambah data
        $pasien = Pasien::create([
            'nama' => $request->nama,
            'handphone' => $request->handphone,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'Tanggal_Masuk' => $request->Tanggal_Masuk,
            'Tanggal_Keluar' => $request->Tanggal_Keluar,

        ]);
    
        // cek data
        $validasi = Validator::make($request->all(),
            [
                'nama' => 'required',
                'handphone' => 'required',
                'alamat' => 'required',
                'status' => 'required',
                'Tanggal_Masuk' => 'required',
                'Tanggal_Keluar' => 'required',

            ]);



            if($validasi->fails()){
               return $validasi->errors();
            }else if($pasien){
                $response = [
                    "message" => 'data berhasil ditambah',
                    "data" => $pasien
                ];

                return response()->json($response, 201);

            }else{
                $response = [
                    "message" => 'data gagal ditambah'
                ];

                return response()->json($response, 404);
            }
    }


    public function delete(Request $request, $id){

        $pasien = Pasien::find($id);
    

        if($pasien){
            $pasien->delete();
            
            $response = [
                'message' => 'data berhasil dihapus'
            ];

            return response()->json($response, 200);
        }else{
            $response = [
                'message' => 'data tidak ada'
            ];

            return response()->json($response, 404);
        }
    
    }


    public function update(){

        $pasien = Pasien::all();
    
        // masih belum paham yang ini
    
    }




    // gunakan query sql dengan where untuk sesi 2 agar mudah
    public function positif(){

        $pasien = Pasien::where('status', 'positif')->get();

        if(!empty($pasien)){
           
            
            $response = [
                "message" => 'data pasien positif',
                "data" => $pasien
            ];

            return response()->json($response, 200);
        }else{
            $response = [
                'message' => 'data tidak terlihat'
            ];

            return response()->json($response, 404);
        }
    
       
    
    }


    public function recorvered(){

        $pasien = Pasien::where('status', 'sembuh')->get();
    
        if(!empty($pasien)){
           
            
            $response = [
                "message" => 'data sembuh pasien',
                "data" => $pasien
            ];

            return response()->json($response, 200);
        }else{
            $response = [
                'message' => 'data tidak terlihat'
            ];

            return response()->json($response, 404);
        }
    
    
    }



    public function search(Request $request){

        $pasien = Pasien::where('nama', $request->nama)->get();
    
        if(!empty($pasien)){
           
            
            $response = [
                "message" => 'data anda terlihat',
                "data" => $pasien
            ];

            return response()->json($response, 200);
        }else{
            $response = [
                'message' => 'data tidak terlihat'
            ];

            return response()->json($response, 404);
        }
    
    }
    

    public function dead(){

        $pasien = Pasien::where('status', 'meninggal')->get();
    
        if(!empty($pasien)){
           
            
            $response = [
                "message" => 'data pasien meninggal',
                "data" => $pasien
            ];

            return response()->json($response, 200);
        }else{
            $response = [
                'message' => 'data tidak ada'
            ];

            return response()->json($response, 404);
        }
    
    
    
    }





    }

