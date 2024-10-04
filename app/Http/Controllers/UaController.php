<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Shipment;
use App\Models\Ua;
use Illuminate\Http\Request;

class UaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('uas.index',[
            'uas'=>Ua::all()
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Activity $activity, Shipment $shipment)
    {
        return view("uas.create", compact('activity', 'shipment'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'm' => 'required|string|max:255',
            'ac' => 'required|string|max:255',
            'c' => 'required|string|max:255',
            'h' => 'nullable|string|max:255',
            'n' => 'required|string|max:255',
            's' => 'required|string|max:255',
            'o' => 'required|string|max:255',
            'index' => 'nullable|string|max:255',
            'persen' => 'nullable|string|max:255',
        //
    ]);
    $validatedData['shipment_id'] =  $request->input('shipment_id');
    $validatedData['activity_id'] =   $request->input('activity_id');
    Ua::create($validatedData);
    return redirect()->route('sa.create', ['activity' => $request->input('activity_id'),
    'shipment' => $request->input('shipment_id')])
        ->with('success', 'Data berhasil disimpan.');
    // return redirect()->route('activities.show', ['activity' => $request->input('activity_id'),
    // 'shipment' => $request->input('shipment_id')])
    //     ->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ua  $ua
     * @return \Illuminate\Http\Response
     */
    public function show(Ua $ua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ua  $ua
     * @return \Illuminate\Http\Response
     */
    public function edit(Ua $uas)
    {
        $activity = $uas->activity; // Mendapatkan aktivitas terkait dari ROA
        $shipment = $uas->shipment; // Mendapatkan shipment terkait dari ROA
        $id = session('id'); // Atau ambil ID dari sumber lain
        return view('uas.edit', compact('uas',  'activity', 'shipment', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ua  $ua
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ua $uas)
    {
        //
          $validatedData = $request->validate([
            'm' => 'required|string|max:255',
            'ac' => 'required|string|max:255',
            'c' => 'required|string|max:255',
            'h' => 'nullable|string|max:255',
            'n' => 'required|string|max:255',
            's' => 'required|string|max:255',
            'o' => 'required|string|max:255',
            'index' => 'nullable|string|max:255',
            'persen' => 'nullable|string|max:255',
        //
    ]);

        $uas->update($validatedData);

        return redirect()->route('activities.show', $uas->activity_id)->with('success', 'Ash Analysis berhasil diperbarui.');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ua  $ua
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ua $ua)
    {
        //
    }
}