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

    public function export()
    {
        // Ambil semua data dari tabel ashfts
        $ashfts = Ashft::all();

        // Kirim data ke view export
        return view('export', ['ashfts' => $ashfts]);
    }
                                                // bagian baru ditambahkan untuk excel    
    public function index()                         
    {
        $coas = Coa::with('activity')->get();
        return view('ashfts.index', compact('ashfts'));
    }

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

        return redirect()->route('tems.create', [
            'activity' => $request->input('activity_id'),
            'shipment' => $request->input('shipment_id')
        ])
            ->with('success', 'Data berhasil ditambahkan.');
    }
    public function edit(Ashft $ashft)
    {
        $activity = $ashft->activity; // Mendapatkan aktivitas terkait dari ROA
        $shipment = $ashft->shipment; // Mendapatkan shipment terkait dari ROA
        $id = session('id'); // Atau ambil ID dari sumber lain
        return view('ashfts.edit', compact('ashft',  'activity', 'shipment', 'id'));
    }

    public function update(Request $request, Ashft $ashft)
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

        $ashft->update($validatedData);

        return redirect()->route('activities.show', $ashft->activity_id)->with('success', 'Ash Analysis berhasil diperbarui.');
    }
}
