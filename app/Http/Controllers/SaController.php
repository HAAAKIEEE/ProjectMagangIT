<?php

namespace App\Http\Controllers;

use App\Models\Sa;
use Illuminate\Http\Request;

class SaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('uas.index',[
            'uas'=>Sa::all()
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("sas.create", compact('activity', 'shipment'));
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
        $validatedData = $request->validate([
            '70_mm' => 'required|string|max:255',
            '50_mm' => 'required|string|max:255',
            '50_315_mm' => 'required|string|max:255',
            '315_224_mm' => 'nullable|string|max:255',
            '315_16_mm' => 'required|string|max:255',
            '224_112_mm' => 'required|string|max:255',
            '112_63_mm' => 'required|string|max:255',
            '8_mm' => 'nullable|string|max:255',
            '164_75_mm' => 'nullable|string|max:255',
            '63_475_mm' => 'required|string|max:255',
            '475_2_mm' => 'required|string|max:255',
            '2_1_mm' => 'required|string|max:255',
            '1_05_mm' => 'nullable|string|max:255',
            '05_mm' => 'nullable|string|max:255',
            'total' => 'required|string|max:255',
            'size1' => 'required|string|max:255',
            'size2' => 'required|string|max:255',
            '050_mm_persen' => 'nullable|string|max:255',
            '070_mm_persen' => 'nullable|string|max:255',
        //
    ]);
    $validatedData['shipment_id'] =  $request->input('shipment_id');
    $validatedData['activity_id'] =   $request->input('activity_id');
    Sa::create($validatedData);
    return redirect()->route('activities.show', ['activity' => $request->input('activity_id'),
    'shipment' => $request->input('shipment_id')])
        ->with('success', 'Data berhasil disimpan.');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sa  $sa
     * @return \Illuminate\Http\Response
     */
    public function show(Sa $sa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sa  $sa
     * @return \Illuminate\Http\Response
     */
    public function edit(Sa $sa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sa  $sa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sa $sa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sa  $sa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sa $sa)
    {
        //
    }
}
