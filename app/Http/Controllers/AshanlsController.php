<?php

namespace App\Http\Controllers;

use App\Models\Ashanls;
use App\Models\Activity;
use App\Models\Shipment;
use Illuminate\Http\Request;

class AshanlsController extends Controller
{
    public function index()
    {

        $ashanls = Ashanls::with('activity')->get();
        return view('ashanls.index', compact('ashanls'));
    }

    public function create(Activity $activity, Shipment $shipment)
    {
        $id = session('id'); // Atau ambil ID dari sumber lain
        // Menampilkan form untuk membuat ROA baru
        return view('ashanls.create', compact('activity', 'shipment', 'id'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi data
        $validatedData = $request->validate([
            'cal' => 'required|numeric',
            'si' => 'required|numeric',
            'ai' => 'required|numeric',
            'fe' => 'required|numeric',
            'ca' => 'required|numeric',
            'mg' => 'required|numeric',
            'un' => 'required|numeric',
            'fofa' => 'required|numeric',
            'slafa' => 'required|numeric',
            'na' => 'required|numeric',
            'k2' => 'required|numeric',
            'ti' => 'required|numeric',
            'so' => 'required|numeric',
            'mn' => 'required|numeric',
            'p2' => 'required|numeric',
        ]);

        // Simpan data ke session
        session()->put('ash_analysis_data', $validatedData);
        $validatedData['shipment_id'] =  $request->input('shipment_id');
        $validatedData['activity_id'] =   $request->input('activity_id');

        Ashanls::create($validatedData);

        // Redirect ke halaman Ash Fusion Temperature
        return redirect()->route('ashfts.create', [
            'activity' => $request->input('activity_id'),
            'shipment' => $request->input('shipment_id')
        ]);
    }

    public function edit(Ashanls $ashanls)
    {
        $activity = $ashanls->activity; // Mendapatkan aktivitas terkait dari ROA
        $shipment = $ashanls->shipment; // Mendapatkan shipment terkait dari ROA
        $id = session('id'); // Atau ambil ID dari sumber lain
        return view('ashanls.edit', compact('ashanls',  'activity', 'shipment', 'id'));
    }

    public function update(Request $request, Ashanls $ashanls)
    {
        $validatedData = $request->validate([
            'cal' => 'required|string',
            'si' => 'required|string',
            'ai' => 'required|string',
            'fe' => 'required|string',
            'ca' => 'required|string',
            'mg' => 'required|string',
            'na' => 'required|string',
            'k2' => 'required|string',
            'ti' => 'required|string',
            'so' => 'required|string',
            'mn' => 'required|string',
            'p2' => 'required|string',
            'un' => 'required|string',
            'fofa' => 'required|string',
            'slafa' => 'required|string',
        ]);

        $ashanls->update($validatedData);

        return redirect()->route('activities.show', $ashanls->activity_id)->with('success', 'Ash Analysis berhasil diperbarui.');
    }
}