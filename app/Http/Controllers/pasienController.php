<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pasien;
use Illuminate\Http\Response;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasien = pasien::with('dokter')->get();
        $data['success'] = true;
        $data['result'] = $pasien;
        return response()->json($data,Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'keluhan' => 'required',
            'dokter_id' => 'required'
        ]);

        $result = pasien::create($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data pasien Berhasil Disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'keluhan' => 'required',
            'dokter_id' => 'required'
        ]);

        $result = pasien::where('id', $id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "data Pasien Berhasil Di Update";
            $data['result'] = $result;
            return response()->json($data,Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = pasien::find($id);
        if($pasien){
            $pasien->delete();//hapus data berdasatkan id
            $data['success'] = true;
            $data['message'] = "data Pasien Berhasil Dihapus";
            return response()->json($data, Response::HTTP_OK);
        }
        else{
            $data['success'] = false;
            $data['message'] = 'Data Pasien Tidak Di temukan';
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
