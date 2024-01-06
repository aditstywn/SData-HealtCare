<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedisRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class RequestPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    //     $searchNik = request('query');

    //     if (strlen($searchNik) > 1) {
    //         $pasiens = Pasien::when($searchNik, function ($query) use ($searchNik) {
    //             return $query->where('nik', 'like', '%' . $searchNik . '%');
    //         })
    //             ->latest()
    //             ->paginate(10);
    //     } else {
    //         $pasiens = Pasien::paginate(10);
    //     }

    //     return view('pages.request_pasien', [
    //         'pasiens' => $pasiens,
    //     ]);
    // }

    public function index()
    {
        $searchNik = request('query');
        $pasiens = [];

        if ($searchNik && strlen($searchNik) > 1) {
            $pasiens = Pasien::when($searchNik, function ($query) use ($searchNik) {
                return $query->where('nik', 'like', '%' . $searchNik . '%');
            })
                ->latest()
                ->paginate(10);
        }

        return view('pages.request_pasien', [
            'pasiens' => $pasiens,
        ]);
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
        //
    }

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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tanggalSekarang = now();
        $pasien = Pasien::find($id);

        $pasien->rekamMedis = $pasien->rekamMedis;

        // Dekripsi gambar sebelum melewatkan data ke tampilan
        foreach ($pasien->rekamMedis as $rekamMedis) {
            $rekamMedis->image = $this->decryptImage($rekamMedis->image);
        }
        return view('pages.detail_request', [
            'pasien' => $pasien,
            'message' => 'Yes Terkirim',
            'dateNow' => $tanggalSekarang,
        ]);
    }

    /**`
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { //
    }


    public function statusRequestShow()
    {
        //
        $rekamMedisRequest = RekamMedisRequest::where('user_id', Auth::id())->orderBy('is_request', 'desc')->get();
        // dd($rekamMedisRequest);
        return view('pages.request_expired', [
            'rekamMedisRequest' => $rekamMedisRequest,
            'title' => 'Status Request Pasien',
        ]);
    }

    public function statusRequestDestroy($id)
    {
        //
        RekamMedisRequest::destroy($id);

        return redirect()->route('request_status');
    }
}
