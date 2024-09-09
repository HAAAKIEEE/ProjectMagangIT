<?php

namespace App\Http\Controllers;

use App\Models\ROA;
use App\Models\Activity;
use App\Models\Shipment;
use Illuminate\Http\Request;

class RoaController extends Controller
{
    public function index()
    {
        // Memuat ROA beserta aktivitas yang terkait
        $roas = ROA::with('activity')->get();
        return view('roa.index', compact('roas'));
    }

    public function show($id)
    {
        // Memuat ROA dan aktivitas terkait dengan ID
        $roa = ROA::with('activity')->findOrFail($id);
        return view('roa.show', compact('roa'));
    }

    public function create(Activity $activity, Shipment $shipment)
    {
        $id = session('id'); // Atau ambil ID dari sumber lain
        // Menampilkan form untuk membuat ROA baru
        return view('roa.create', compact('activity', 'shipment', 'id'));
    }


    public function store(Request $request, Activity $activity, Shipment $shipment)
    {
        $validatedData = $request->validate([
            'tm' => 'required|string|max:255',
            'im' => 'required|string|max:255',
            'ash' => 'required|string|max:255',
            'ash2' => 'nullable|string|max:255',
            'vm' => 'required|string|max:255',
            'fc' => 'nullable|string|max:255',
            'ts' => 'required|string|max:255',
            'Adb' => 'required|string|max:255',
            'Arb' => 'nullable|string|max:255',
            'Daf' => 'nullable|string|max:255',
            'Analisis_Standar' => 'required|string|max:255',
        ]);

        $roa = new ROA($validatedData);

        $roa->shipment()->associate($shipment);
        $roa->activity()->associate($activity);

        $roa->save();

        return redirect()->route('coas.create', ['activity' => $activity->id, 'shipment' => $shipment->id])->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(ROA $roa)
    {
        $activity = $roa->activity; // Mendapatkan aktivitas terkait dari ROA
        $shipment = $roa->shipment; // Mendapatkan shipment terkait dari ROA
        $id = session('id'); // Atau ambil ID dari sumber lain
    
        return view('roa.edit', compact('roa', 'activity', 'shipment', 'id'));
    }
    
    public function update(Request $request, ROA $roa)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tm' => 'required|string|max:255',
            'im' => 'required|string|max:255',
            'ash' => 'required|string|max:255',
            'ash2' => 'nullable|string|max:255',
            'vm' => 'required|string|max:255',
            'fc' => 'nullable|string|max:255',
            'ts' => 'required|string|max:255',
            'Adb' => 'required|string|max:255',
            'Arb' => 'nullable|string|max:255',
            'Daf' => 'nullable|string|max:255',
            'Analisis_Standar' => 'required|string|max:255',
        ]);
    
        // Update data ROA
        $roa->update($validatedData);
    
        // Redirect ke halaman yang sesuai setelah update
        return redirect()->route('activities.show', $roa->activity_id)->with('success', 'Report Of Analysis berhasil diperbarui.');
    }
    
}
