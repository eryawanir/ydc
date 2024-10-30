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
        $layanan = Layanan::create($validateData);

        return redirect()->route('super-admin.layanans.index');
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
