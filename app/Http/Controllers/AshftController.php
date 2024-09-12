<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\Ashft;
use App\Models\Activity;

class AshftController extends Controller
{
      
    // AshFusionTemperatureController.php

    public function create(Request $request)
    {
        $activityId = $request->input('activity');
        $shipmentId = $request->input('shipment');

        // Ambil objek aktivitas dan pengiriman dari database berdasarkan ID
        $activity = Activity::find($activityId);
        $shipment = Shipment::find($shipmentId); // Pastikan model Shipment ada

        $data = session()->get('ash_analysis_data', []); // Ambil data dari session

        return view('ashfts.create', [
            'activity' => $activity,
            'shipment' => $shipment,
            'data' => $data // Kirim data ke view
        ]);
    }



    // app/Http/Controllers/AshftController.php

public function store(Request $request)
{
    $validatedData = $request->validate([
        'idt' => 'required|numeric',
        'st' => 'required|numeric',
        'ht' => 'required|numeric',
        'ft' => 'required|numeric',
        'idt1' => 'required|numeric',
        'st1' => 'required|numeric',
        'ht1' => 'required|numeric',
        'ft1' => 'required|numeric',
        'shipment_id' => 'required|exists:shipments,id', // Pastikan validasi sesuai
        'activity_id' => 'required|exists:activities,id', // Pastikan validasi sesuai
    ]);

    // Buat data Ashft baru
    Ashft::create($validatedData);

    return redirect()->route('activities.show', $request->input('activity_id'))
        ->with('success', 'Data berhasil ditambahkan.');
}



    public function show($id)
    {
        $activity = Activity::with('ashfts')->find($id); // Mengambil activity beserta ashfts
        if (!$activity) {
            return redirect()->route('activities.index')->with('error', 'Activity tidak ditemukan.');
        }

        $ashfts = $activity->ashfts ?? collect(); // Pastikan $ashfts adalah koleksi, meskipun kosong
        return view('activities.show', compact('activity', 'ashfts'));
    }
}
