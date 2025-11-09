<?php

namespace App\Http\Controllers;

use App\Models\BansosData;
use Illuminate\Http\Request;

class DataBansosController extends Controller
{
    public function index()
    {
        $bansosData = BansosData::paginate(20);

        return view('data-bansos', compact('bansosData'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_kartu_keluarga' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        BansosData::create($validated);

        return redirect()->route('data-bansos')->with('status', 'Data Bansos berhasil ditambahkan!');
    }
}
