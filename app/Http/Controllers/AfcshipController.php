<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Afcship;
use App\Models\Shipment;
use Illuminate\Http\Request;

class AfcshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('afcships.index',[
            'afcships'=>Afcship::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Activity $activity, Shipment $shipment)
    {
        // $tems = Tem::all();
        return view("afcships.create", compact('activity', 'shipment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
         // Validate the request
         $validatedData = $request->validate([
            'vm_pct' => 'required|string|max:255',
            'cv_cg' => 'required|string|max:255',
            'pm' => 'required|string|max:255',
            'radioactiv' => 'nullable|string|max:255',
        ]);
    
        // Tentukan activity_id dan shipment_id secara manual
        // $activity_id = 1;
        // $shipment_id = 1;
        // session()->put('ash_analysis_data', $validatedData);
        $validatedData['shipment_id'] =  $request->input('shipment_id');
        $validatedData['activity_id'] =   $request->input('activity_id');
    
        // Buat data shipment dan tambahkan nilai activity_id dan shipment_id
        Afcship::create($validatedData);
        return redirect()->route('ua.create', ['activity' => $request->input('activity_id'),
        'shipment' => $request->input('shipment_id')])
            ->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Afcship  $afcship
     * @return \Illuminate\Http\Response
     */
    public function show(Afcship $afcship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Afcship  $afcship
     * @return \Illuminate\Http\Response
     */
    public function edit(Afcship $afcship)
    {
        $activity = $afcship->activity; // Mendapatkan aktivitas terkait dari ROA
        $shipment = $afcship->shipment; // Mendapatkan shipment terkait dari ROA
        $id = session('id'); 
        return view('afcships.edit', compact('afcship', 'activity', 'shipment', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Afcship  $afcship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Afcship $afcship)
    {
        //
        $validatedData = $request->validate([
            'vm_pct' => 'required|string|max:255',
            'cv_cg' => 'required|string|max:255',
            'pm' => 'required|string|max:255',
            'radioactiv' => 'nullable|string|max:255',
        ]);

        // Update data afcship dengan nilai dari form
        $afcship->update($validatedData);

        // Redirect kembali ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('activities.show', $afcship->activity_id)->with('success', 'Ash Analysis berhasil diperbarui.');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Afcship  $afcship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Afcship $afcship)
    {
        //
    }
}
