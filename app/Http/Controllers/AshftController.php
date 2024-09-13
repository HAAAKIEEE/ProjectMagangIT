<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\Ashft;
use App\Models\Activity;
use App\Models\Ashanls;
use App\Models\Coa;
use App\Models\ROA;

class AshftController extends Controller
{

    // AshFusionTemperatureController.php

    public function create(Activity $activity, Shipment $shipment)
    {
        // $activityId = $request->input('activity');
        // $shipmentId = $request->input('shipment');

        // // Ambil objek aktivitas dan pengiriman dari database berdasarkan ID
        // $activity = Activity::find($activityId);
        // $shipment = Shipment::find($shipmentId); // Pastikan model Shipment ada
        $data = session()->get('ash_analysis_data', []); // Ambil data dari session

        $id = session('id'); // Atau ambil ID dari sumber lain
        // Menampilkan form untuk membuat ROA baru
        return view('ashfts.create', compact('activity', 'shipment', 'id', 'data'));

        // return view('ashfts.create', [
        //     'activity' => $activity,
        //     'shipment' => $shipment,
        //     'data' => $data // Kirim data ke view
        // ]);
    }



    // app/Http/Controllers/AshftController.php

    public function index($activityId, $shipmentId)
    {
        // Cari activity berdasarkan ID
        $activity = Activity::findOrFail($activityId);

        // Cari shipment berdasarkan ID
        $shipment = Shipment::findOrFail($shipmentId);

        // Ambil semua Ash Fusion Temperature terkait dengan activity dan shipment
        $ashfts = Ashft::where('activity_id', $activityId)
            ->where('shipment_id', $shipmentId)
            ->get();

        // Kirim data ke view ashfts/index.blade.php
        return view('ashfts.index', compact('activity', 'shipment', 'ashfts'));
    }



    public function update(Request $request, Ashft $ashft)
    {
        // Validasi data yang dikirim dari form
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

        $ashft->update($validatedData);

        return redirect()->route('activities.show', $ashft->activity_id)->with('success', 'Ash Analysis berhasil diperbarui.');
        // Redirect kembali ke halaman index dengan pesan sukses
        // return redirect()->route('ashfts.index')
        //     ->with('success', 'Ash Fusion Temperature updated successfully.');
    }




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

    public function edit(Ashft  $ashft)
    {
        // // Cari activity berdasarkan ID
        // $activity = Activity::findOrFail($activityId);

        // // Cari shipment berdasarkan ID
        // $shipment = Shipment::findOrFail($shipmentId);

        // // Cari Ash Fusion Temperature berdasarkan ID
        // $ashft = Ashft::findOrFail($ashftId);
        $activity = $ashft->activity; // Mendapatkan aktivitas terkait dari ROA
        $shipment = $ashft->shipment; // Mendapatkan shipment terkait dari ROA
        $id = session('id'); // Atau ambil ID dari sumber lain
        // Kirim variabel ke view edit.blade.php
        return view('ashfts.edit', compact('activity', 'shipment', 'ashft'));
    }





    // public function show($id)
    // {
    //     $activity = Activity::with('ashfts')->find($id); // Mengambil activity beserta ashfts
    //     if (!$activity) {
    //         return redirect()->route('activities.index')->with('error', 'Activity tidak ditemukan.');
    //     }
    //     $shipments = Shipment::all(); // Ambil shipments berdasarkan activity_id
    //     $roas = ROA::all();
    //     $coas = Coa::all();
    //     $ashanls = Ashanls::all();
    //     $ashfts = $activity->ashfts ?? collect(); // Pastikan $ashfts adalah koleksi, meskipun kosong
    //     return view('activities.show', compact('activity', 'ashfts', 'shipments', 'roas','coas','ashanls'));
    // }
}
