<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function store(Request $request) {
        // validate
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
        ]);
        
        // create data in local
        $mahasiswa = Mahasiswa::create($request->all());

        // create data in ubuntu server
        $client = new Client();
        $res = $client->request('POST', 'http://192.168.56.69:8080/api/mahasiswa', ['form_params' => [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
        ]]);

        // redirect to index page
        return redirect('/mahasiswa');
    }

    public function update(Request $request, $id) {
        // validate
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
        ]);
        if ($validator->fails()) {
            return "gagal"; 
        }

        // update data in local
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->save();

        // update data in ubuntu server
        $client = new Client();
        $response = $client->request('PUT', 'http://192.168.56.69:8080/api/mahasiswa/' . $id . '/update', ['form_params' => [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
        ]]);

        // redirect to index page
        return redirect('/mahasiswa');
    }

    public function destroy(Request $request, $id) {
        // delete data in local
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        // delete data in ubuntu server
        $client = new Client();
        $response = $client->request('DELETE', 'http://192.168.56.69:8080/api/mahasiswa/' . $id . '/delete');

        // redirect to index page
        return redirect('/mahasiswa');
    }
}
