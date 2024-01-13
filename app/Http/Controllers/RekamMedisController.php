<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\RekamMedisRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'expired' => 'required|date',
        ]);

        //  disini terjadinya proses encrypting gambar sebelum masuk ke database
        $validate['image'] = base64_encode(file_get_contents($validate['image']));


        $response = Http::timeout(60)->post('http://localhost:8000/image/encrypt', [
            'base64' => $validate['image'],
            'token' => 'kamu siapa',
        ]);

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
    public function update(Request $request)
    {
        //
        $validate = $request->validate([
            'rekam_medis_id' => 'required',
            'user_id' => 'required',
            'is_request' => 'required',
            'request_date' => 'required|date',
        ]);
        $rekamMedisRequest = RekamMedisRequest::create($validate);

        // return view('pages.detail_request', [
        //     'pasien' => $rekamMedisRequest->rekamMedis->pasien,
        //     'message' => 'Yes Terkirim',
        //     'dateNow' => now(),
        // ]);

        return redirect()->route('request_status');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekamMedis $rekamMedis)
    {
    }



    // custom
    public function expiredIndex()
    {
        //
        // $rekamMedisRequest = RekamMedisRequest::orderBy('is_request', 'desc')->get();
        $rekamMedisRequest = rekamMedisRequest::whereHas('rekamMedis', function ($query) {
            $query->where('user_id', Auth::id());
        })->orderBy('is_request', 'desc')->get();
        // dd($rekamMedisRequest);
        return view('pages.request_expired', [
            'rekamMedisRequest' => $rekamMedisRequest,
            'title' => 'List Data Request'
        ]);
    }

    public function expiredUpdate($id)
    {
        //
        $rekamMedisRequest = RekamMedisRequest::find($id);

        $rekamMedisRequest->is_request = 0;

        $rekamMedis = RekamMedis::find($rekamMedisRequest->rekam_medis_id);
        $rekamMedis->expired = $rekamMedisRequest->request_date;

        $rekamMedis->save();
        $rekamMedisRequest->save();





        return redirect()->route('request_expired');
    }
}
