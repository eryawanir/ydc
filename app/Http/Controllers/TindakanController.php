<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\RekamMedis;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'tindakans.index',
            [
                'tindakans' => Tindakan::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RekamMedis $rekamMedi)
    {
        return view('tindakans.create', [
            'layanans' => Layanan::orderBy('jenis')->get(),
            'rm' => $rekamMedi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tindakan = new Tindakan;
        $tindakan->rekam_medis_id = $request->rekam_medis_id;
        $tindakan->layanan_id = $request->layanan_id;
        $tindakan->diagnosa = $request->diagnosa;
        $tindakan->lokasi = $request->lokasi;
        $tindakan->save();

        $uang_masuk = $tindakan->layanan->harga;
        $fee_dokter =  $uang_masuk * $tindakan->layanan->persenanDokter;
        $tindakan->uang_masuk = $uang_masuk;
        $tindakan->fee_dokter = $fee_dokter;
        $tindakan->pendapatan_klinik = $uang_masuk - $fee_dokter;
        $tindakan->save();

        return redirect()->route('super-admin.rekam-medis.edit', $request->rekam_medis_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tindakan $tindakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tindakan $tindakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tindakan $tindakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tindakan $tindakan)
    {
        //
    }
}
