<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dokter = dokter::all();
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
            'alamat' => 'required',
            'spesialis' => 'required'
        ]);

        $result = dokter::create($validate);// Simpan ke Table
        if($result){
            $data['success'] = true;
            $data['message'] = 'Data Dokter berhasil disimpan';
            $data['result'] = $result;
            return response()->json(data: $data, status:Response::HTTP_CREATED);
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
            'spesialis' => 'required'
        ]);

        $result = dokter::where('id', $id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "data Dokter Berhasil Di Update";
            $data['result'] = $result;
            return response()->json($data,Response::HTTP_OK);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $dokter = dokter::find($id);
        if($dokter){
            $dokter->delete();//hapus data berdasatkan id
            $data['success'] = true;
            $data['message'] = "data Dokter Berhasil Dihapus";
            return response()->json($data, Response::HTTP_OK);
        }
        else{
            $data['success'] = false;
            $data['message'] = 'Data Dokter Tidak Di temukan';
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }   
    }
}
