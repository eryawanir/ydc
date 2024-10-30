<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tindakans.index', [
            'tindakans' => Tindakan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tindakans.create', [
            'layanans' => Layanan::orderBy('jenis')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'layanan_id' => 'required',
        ]);
        $tindakan  = new Tindakan;
        $tindakan->layanan_id = $validateData['layanan_id'];
        $layanan = Layanan::find($tindakan->layanan_id);
        $jenis = $layanan->jenis;
        if ($jenis == 1) {
            $tindakan->utk_dokter = $tindakan->layanan->harga * 0.35;
            $tindakan->utk_bahan = $tindakan->layanan->harga * 0.30;
            $tindakan->utk_zis = $tindakan->layanan->harga * 0.025;
            $tindakan->utk_pribadi = $tindakan->layanan->harga * 0.325;
        } elseif ($jenis == 2) {
            $tindakan->utk_dokter = $tindakan->layanan->harga * 0.35;
            $tindakan->utk_bahan = $tindakan->layanan->harga * 0.30;
            $tindakan->utk_zis = $tindakan->layanan->harga * 0.025;
            $tindakan->utk_pribadi = $tindakan->layanan->harga * 0.325;
        } elseif ($jenis == 3) {
            $tindakan->utk_dokter = $tindakan->layanan->harga * 0.35;
            $tindakan->utk_bahan = $tindakan->layanan->harga * 0.30;
            $tindakan->utk_zis = $tindakan->layanan->harga * 0.025;
            $tindakan->utk_pribadi = $tindakan->layanan->harga * 0.325;
        } elseif ($tindakan->layanan->jenis == 3) {
            $tindakan->utk_dokter = $tindakan->layanan->harga * 0.35;
            $tindakan->utk_bahan = $tindakan->layanan->harga * 0.30;
            $tindakan->utk_zis = $tindakan->layanan->harga * 0.025;
            $tindakan->utk_pribadi = $tindakan->layanan->harga * 0.325;
        }

        $tindakan->save();
        return redirect()->route('super-admin.tindakans.index');
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
