<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruang;
use Illuminate\Http\Response;

class ruangController extends Controller
{
    public function index()
    {
        $ruang = ruang::with('ruang')->get();
        $data['success'] = true;
        $data['result'] = $ruang;
        return response()->json($data, Response::HTTP_OK);
}
public function store(Request $request)
    {
        $validate = $request->validate([
            'ruangan' => 'required',
            'id_ruangan' => 'required',
            'nama_gedung'=>'required'
        ]);

        $result = ruang::create($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "data ruangan berhasil disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }
    public function update(Request $request, string $id_ruangan)
    {
        $validate = $request->validate([
            'ruangan' => 'required',
            'id_ruangan' => 'required',
            'nama_gedung'=>'required'
        ]);

        $result = ruang::where('id_ruangan', $id_ruangan)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "data ruangan berhasil disimpan";
            $data['result'] = $result;
            return response()->json($data,Response::HTTP_OK);
        }
    }
    public function destroy(string $id_ruangan)
    {
        $ruang = ruang::find($id_ruangan);
        if ($ruang){
            $ruang->delete();
            $data['success'] = true;
            $data['message'] = 'Data ruangan Berhasil Dihapus';
            return response()->json($data, Response::HTTP_OK);
        }
        else{
            $data['success'] = false;
            $data['message'] = 'Data Tidak Ditemukan';
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }


}
