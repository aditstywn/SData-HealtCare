<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $searchNik = request('nik');

        $pasiens = Pasien::where('user_id', auth()->user()->id)
            ->when($searchNik, function ($query) use ($searchNik) {
                return $query->where('nik', 'like', '%' . $searchNik . '%');
            })
            ->latest()
            ->paginate(10);


        return view('pages.dashboard', [
            'pasiens' => $pasiens,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.input_pasien');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|max:100',
            'nik' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'golongan_darah' => 'required'
        ]);

        $validate['user_id'] = auth()->user()->id;

        Pasien::create($validate);
        return redirect()->route('pasien.index')->with('success', 'Create Pasien Berhasil');
    }

    /**
     * Display the specified resource.
     */

    //  function untuk decrypt image
    public function decryptImage($encryptedBase64)
    {

        $response = Http::timeout(30)->post('http://localhost:8000/image/decrypt', [
            'base64' => $encryptedBase64,
            'token' => 'kamu siapa',
        ]);

        $jsonData = $response->json();

        return $jsonData['data']['base64'];
    }

    public function show(Pasien $pasien)
    {
        $pasien->rekamMedis = $pasien->rekamMedis->where('user_id', Auth::id());

        // Dekripsi gambar sebelum melewatkan data ke tampilan
        foreach ($pasien->rekamMedis as $rekamMedis) {
            $rekamMedis->image = $this->decryptImage($rekamMedis->image);
        }

        return view('pages.detail_pasien', [
            'pasien' => $pasien,
        ]);
    }


    // image belom ke decrypt
    // public function show(Pasien $pasien)
    // {

    //     $pasien->rekamMedis = $pasien->rekamMedis->where('user_id', Auth::id());

    //     return view('pages.detail_pasien', [
    //         'pasien' => $pasien,
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        //
    }
}
