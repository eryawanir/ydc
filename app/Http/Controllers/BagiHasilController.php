<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Tindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class BagiHasilController extends Controller
{
    public function index(Request $request)
    {

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $tindakans = Tindakan::with(['rekam_medis.dokter', 'layanan'])->whereHas('rekam_medis', function ($q) use ($bulan, $tahun) {
            $q->when($bulan, function ($query, $bulan) {
                $query->whereMonth('waktu_kunjungan', $bulan);
            })->when($tahun, function ($query, $tahun) {
                $query->whereYear('waktu_kunjungan', $tahun);
            });
        })->get();
        return view('bagi-hasil.index', [
            'tindakans' => $tindakans,
            'dokters' => Dokter::all(),
            'total_fee_dokter' =>  'Rp ' . number_format($tindakans->sum('fee_dokter'), 0, ',', '.'),
            'total_pendapatan_klinik' =>
            'Rp ' . number_format($tindakans->sum('pendapatan_klinik'), 0, ',', '.'),
            'total_pemasukan' =>
            'Rp ' . number_format($tindakans->sum('uang_masuk'), 0, ',', '.'),
        ]);
    }
}
