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
        return view('ashfts.create', compact('activity', 'shipment', 'id','data'));

        // return view('ashfts.create', [
        //     'activity' => $activity,
        //     'shipment' => $shipment,
        //     'data' => $data // Kirim data ke view
        // ]);
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
         // Simpan data ke session
         session()->put('ash_analysis_data', $validatedData);
         $validatedData['shipment_id'] =  $request->input('shipment_id');
         $validatedData['activity_id'] =   $request->input('activity_id');

        // Buat data Ashft baru
        Ashft::create($validatedData);

        return redirect()->route('tems.create', ['activity' => $request->input('activity_id'),
        'shipment' => $request->input('shipment_id')])
            ->with('success', 'Data berhasil ditambahkan.');
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