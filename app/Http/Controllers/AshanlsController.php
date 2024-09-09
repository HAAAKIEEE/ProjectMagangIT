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

    public function create( Activity $activity, Shipment $shipment)
    {
        $id = session('id'); // Atau ambil ID dari sumber lain
        // Menampilkan form untuk membuat ROA baru
        return view('ashanls.create', compact( 'activity', 'shipment', 'id'));
    }
    
    public function store(Request $request, Activity $activity,  Shipment $shipment )
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
        $ashanls= new Ashanls($validatedData);

        $ashanls->shipment()->associate($shipment);
        $ashanls->activity()->associate($activity);

        $ashanls->save();

        return redirect()->route('activities.show', $activity->id)->with('success', 'Data berhasil ditambahkan.');
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
