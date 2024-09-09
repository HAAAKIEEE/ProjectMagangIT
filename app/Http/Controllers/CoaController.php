<?php

namespace App\Http\Controllers;

use App\Models\Coa;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Shipment;

class CoaController extends Controller
{
    public function index()
    {
        $coas = Coa::with('activity')->get();
        return view('coas.index', compact('coas'));
    }

    public function create(Activity $activity, Shipment $shipment)
    {
        $id = session('id'); // Atau ambil ID dari sumber lain
        return view('coas.create', compact( 'activity', 'shipment', 'id'));
    }


    public function store(Request $request, Activity $activity,  Shipment $shipment)
    {
        $validatedData = $request->validate([
            'number' => 'required|string|max:255',
            'tm2' => 'required|string|max:255',
            'im2' => 'required|string|max:255',
            'ash1' => 'required|string|max:255',
            'ash3' => 'required|string|max:255',
            'vm2' => 'required|string|max:255',
            'fc2' => 'required|string|max:255',
            'ts3' => 'required|string|max:255',
            'ts2' => 'required|string|max:255',
            'adb' => 'required|string|max:255',
            'arb' => 'required|string|max:255',
            'daf' => 'required|string|max:255',
        ]);

        $coa= new Coa($validatedData);

        $coa->shipment()->associate($shipment);
        $coa->activity()->associate($activity);

        $coa->save();

        return redirect()->route('ashanls.create',  ['activity' => $activity->id, 'shipment'=> $shipment->id])->with('success', 'Berhasil disimpan.');
    }

    public function edit(Coa $coa)
    {
        $activity = $coa->activity; // Mendapatkan aktivitas terkait dari ROA
        $shipment = $coa->shipment; // Mendapatkan shipment terkait dari ROA
        $id = session('id'); // Atau ambil ID dari sumber lain
        return view('coas.edit', compact('coa', 'activity', 'shipment', 'id'));
    }
   
    public function update(Request $request, Coa $coa)
    {
        $validatedData = $request->validate([
            'number' => 'required|string|max:255',
            'tm2' => 'required|string|max:255',
            'im2' => 'required|string|max:255',
            'ash1' => 'required|string|max:255',
            'ash3' => 'required|string|max:255',
            'vm2' => 'required|string|max:255',
            'fc2' => 'required|string|max:255',
            'ts3' => 'required|string|max:255',
            'ts2' => 'required|string|max:255',
            'adb' => 'required|string|max:255',
            'arb' => 'required|string|max:255',
            'daf' => 'required|string|max:255',
        ]);

        $coa->update($validatedData);
        return redirect()->route('activities.show', $coa->activity_id)->with('success', 'Certificate Of Analysis berhasil diperbarui.');
    }
}
