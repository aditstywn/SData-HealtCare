<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // request('nik');
        // $pasiens = Pasien::where('user_id', auth()->user()->id)->latest()->paginate(10);
        // return view('pages.dashboard', [
        //     // 'pasiens' => Pasien::latest()->paginate(10),
        //     'pasiens' => $pasiens,
        // ]);

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
    public function show(Pasien $pasien)
    {

        $pasien->rekamMedis = $pasien->rekamMedis->where('user_id', Auth::id());

        return view('pages.detail_pasien', [
            'pasien' => $pasien,
        ]);
    }

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
