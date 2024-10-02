<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class dokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokter = Dokter::all();
        $data['success'] = true;
        $data['result'] = $dokter;
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
            'alamat'=> 'required',
            'spesialis'=> 'required',
        ]);
        
        $result = Dokter::create($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = 'Data Dokter Berhasil Di Simpan';
            $data['result'] = $result;
            return response()->json($data,Response::HTTP_CREATED);
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
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat'=> 'required',
            'spesialis'=> 'required',
        ]);

        $result = Dokter::where('id', $id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = 'Data Dokter Berhasil Di update';
            $data['result'] = $result;
            return response()->json($data,Respones::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::find($id);
        if($dokter){
            $dokter->delete();
            $data['success'] = true;
            $data['message'] = 'Data Dokter Berhasil Dihapus';
            return response()->json($data,Response::HTTP_OK);
        }
        else{
            $data['success'] = false;
            $data['message'] = 'Data Tidak Ditemukan';
            return response()->json($data,Response::HTTP_NOT_FOUND);
        }
    }
}
