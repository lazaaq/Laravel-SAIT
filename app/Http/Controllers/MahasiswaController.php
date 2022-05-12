<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
        ]);
        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json([
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return response()->json([
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Mahasiswa $mahasiswa, Request $request)
    {
        $mahasiswa->update($request->all());
        return response()->json([
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return response()->json([
            'success' => true
        ]);
    }

    public function show_data_to_browser()
    {
        $mahasiswa_lokal = Mahasiswa::all();
        $client = new Client();
        $response = $client->request('GET', 'http://192.168.56.69:8080/api/mahasiswa');
        $mahasiswa_ubuntu = json_decode($response->getBody()->getContents());
        // dd($mahasiswas);
        // return response()->json([
        //     'mahasiswas' => $mahasiswas
        // ]);
        return view('mahasiswa.index', [
            'mahasiswa_lokal' => $mahasiswa_lokal,
            'mahasiswa_ubuntu' => $mahasiswa_ubuntu->mahasiswas
        ]);
    }
}
