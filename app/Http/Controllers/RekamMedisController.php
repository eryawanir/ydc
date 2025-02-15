<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rekam-medis.index', [
            'rekam_medis' => RekamMedis::with(['dokter', 'pasien'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pasien $pasien)
    {

        return view('rekam-medis.create', [
            'pasien' => $pasien,
            'dokters' => Dokter::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rekamMedis = RekamMedis::create($request->all());
        $rm = RekamMedis::find($rekamMedis->id);
        return redirect()->route('super-admin.rekam-medis.edit', $rm);
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
    public function edit($rekamMedis)
    {
        $rm = RekamMedis::find($rekamMedis);
        return view('rekam-medis.edit', [
            'pasien' => $rm->pasien,
            'dokters' => Dokter::all(),
            'rm' => $rm,
            'total' => 0
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekamMedis $rekamMedi)
    {
        $rekamMedi->update($request->all());
        return redirect()->route('super-admin.rekam-medis.edit', $rekamMedi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        //
    }
}
