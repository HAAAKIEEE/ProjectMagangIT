<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Shipment;
use App\Models\Tem;
use Illuminate\Http\Request;

class TemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cari activity berdasarkan ID
        // $activity = Activity::findOrFail($activityId);

        // // Cari shipment berdasarkan ID
        // $shipment = Shipment::findOrFail($shipmentId);
        // $tems = Tem::where('activity_id', $activityId)
        // ->where('shipment_id', $shipmentId)
        // ->get();
         $tems = Tem::all();
        return view("tems.index", compact('tems'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Activity $activity, Shipment $shipment)
    {
        //
        $tems = Tem::all();
        return view("tems.create", compact('activity', 'shipment','tems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Tampilkan semua input yang masuk dalam request
        // dd($request->all());
   
        // Validate the request
        $request->validate([
            'ci' => 'required|string|max:255',
            'f' => 'required|string|max:255',
            'p' => 'required|string|max:255',
            'b' => 'nullable|string|max:255',
            'as' => 'required|string|max:255',
            'hg' => 'nullable|string|max:255',
            'se' => 'required|string|max:255',
        ]);
    
        // Tentukan activity_id dan shipment_id secara manual
        $activity_id = 1;
        $shipment_id = 1;
    
        // Buat data shipment dan tambahkan nilai activity_id dan shipment_id
        $tem = Tem::create(array_merge(
            $request->all(),
            ['activity_id' => $activity_id, 'shipment_id' => $shipment_id] // Tetapkan activity_id dan shipment_id
        ));
    
        // Redirect with success message
        return redirect()->route('tem_index')
            ->with('success', 'Data berhasil disimpan.');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tem  $tem
     * @return \Illuminate\Http\Response
     */
    public function show(Tem $tem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tem  $tem
     * @return \Illuminate\Http\Response
     */
    public function edit(Tem $tem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tem  $tem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tem $tem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tem  $tem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tem $tem)
    {
        //
    }
}
