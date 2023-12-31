<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        return view('pages.rekam_medis.add_rekam_medis', [
            'pasien_id' => $request->input('pasien_id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;d
        $validate = $request->validate([
            'pasien_id' => 'required',
            'deskripsi' => 'required|max:255',
            'image' => 'required|image|file',
            'tanggal_periksa' => 'required|date',
        ]);

        $validate['image'] = base64_encode(file_get_contents($validate['image']));


        $response = Http::timeout(30)->post('http://localhost:8000/image/encrypt', [
            'base64' => $validate['image'],
            'token' => 'kamu siapa',
        ]);

        // if ($response->status() != 200) {
        //     return redirect()->route('rekam-medis.create')->with('error', 'Encrypt Gambar Tidak Berhasil');
        // }

        $jsonData = $response->json();
        $validate['image'] = $jsonData['data']['base64'];

        $pasienId = $validate['pasien_id'];

        $validate['user_id'] = auth()->user()->id;



        RekamMedis::create($validate);
        return redirect()->route('pasien.show', ['pasien' => $pasienId])->with('success', 'Add RM Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        //
    }
}
