<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Sa;
use App\Models\Shipment;
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
        return view('sas.index', [
            'sas' => Sa::all()
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
        // dd($request->all());
        $validatedData = $request->validate([
            'mm_70' => 'required|string|max:255',
            'mm_50' => 'required|string|max:255',
            'mm_50_315' => 'required|string|max:255',
            'mm_315_224' => 'nullable|string|max:255',
            'mm_315_16' => 'required|string|max:255',
            'mm_224_112' => 'required|string|max:255',
            'mm_112_63' => 'required|string|max:255',
            'mm_8' => 'nullable|string|max:255',
            'mm_164_75' => 'nullable|string|max:255',
            'mm_63_475' => 'required|string|max:255',
            'mm_475_2' => 'required|string|max:255',
            'mm_2_1' => 'required|string|max:255',
            'mm_1_05' => 'required|string|max:255',
            'mm_05' => 'required|string|max:255',
            'total' => 'required|string|max:255',
            'size1' => 'required|string|max:255',
            'size2' => 'required|string|max:255',
            'mm_050_persen' => 'required|string|max:255',
            'mm_070_persen' => 'required|string|max:255',

        ]);
        $validatedData['shipment_id'] =  $request->input('shipment_id');
        $validatedData['activity_id'] =   $request->input('activity_id');
        Sa::create($validatedData);

        return redirect()->route('activities.show', [
            'activity' => $request->input('activity_id'),
            'shipment' => $request->input('shipment_id')
        ])
            ->with('success', 'Data berhasil disimpan.');
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
        $activity = $sa->activity; // Mendapatkan aktivitas terkait dari ROA
        $shipment = $sa->shipment; // Mendapatkan shipment terkait dari ROA
        $id = session('id');
        // Kirim variabel ke view
        return view('sas.edit', compact('sa', 'activity', 'shipment', 'id'));
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
        $validatedData = $request->validate([
            // Di bagian validation (misalnya dalam Request atau Controller):
            'mm_70' => 'required|string|max:255',
            'mm_50' => 'required|string|max:255',
            'mm_50_315' => 'required|string|max:255',
            'mm_315_224' => 'nullable|string|max:255',
            'mm_315_16' => 'required|string|max:255',
            'mm_224_112' => 'required|string|max:255',
            'mm_112_63' => 'required|string|max:255',
            'mm_8' => 'nullable|string|max:255',
            'mm_164_75' => 'nullable|string|max:255',
            'mm_63_475' => 'required|string|max:255',
            'mm_475_2' => 'required|string|max:255',
            'mm_2_1' => 'required|string|max:255',
            'mm_1_05' => 'required|string|max:255',
            'mm_05' => 'required|string|max:255',
            'total' => 'required|string|max:255',
            'size1' => 'required|string|max:255',
            'size2' => 'required|string|max:255',
            'mm_050_persen' => 'required|string|max:255',
            'mm_070_persen' => 'required|string|max:255',


            //  
        ]);
        $sa->update($validatedData);

        return redirect()->route('activities.show', $sa->activity_id)->with('success', 'Ash Analysis berhasil diperbarui.');
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
