<?php

namespace App\Http\Controllers;

use App\Models\rawat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RawatController extends Controller
{
    
    public function index()
    {
        $rawat = rawat::with(['ruang', 'pasien'])->get();
        $data['message'] = true;
        $data['result'] = $rawat;
        return response()->json($data, Response::HTTP_OK);
    }

    
    public function create()
    {      
    }

    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'jadwal_masuk' => 'required',
            'jadwal_keluar' => 'required',
            'ruang_id' => 'required',
            'pasien_id' => 'required'
        ]);

        $result = rawat::create($validate); 
        if($result){
            $data['success'] = true;
            $data['message'] = "Data prodi berhasil disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    
    public function show(rawat $rawat)
    {      
    }

    
    public function edit(rawat $rawat)
    {   
    }

    
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'jadwal_masuk' => 'required',
            'jadwal_keluar' => 'required',
            'ruang_id' => 'required',
            'pasien_id' => 'required'
        ]);

        $result = rawat::where('id', $id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data rawat berhasil diupdate";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    
    public function destroy(rawat $id)
    {
        $rawat = rawat::find($id);
        if($rawat){
            $rawat->delete(); 
            $data['success'] = true;
            $data['message'] = "Data rawat berhasil dihapus";
            return response()->json($data, Response::HTTP_OK);
        } else {
            $data['success'] = false;
            $data['message'] = "Data ra$rawat tidak ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}