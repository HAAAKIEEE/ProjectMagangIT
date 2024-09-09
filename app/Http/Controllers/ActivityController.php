<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Activity;
use App\Models\Roa;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
{
    $activityDate = $request->activity_date . '-01'; // Menyimpan tanggal sebagai YYYY-MM-01

    // Validasi duplikasi nama kegiatan pada tanggal yang sama
    $existingName = Activity::where('name', $request->name)
        ->where('activity_date', $activityDate)
        ->exists();

    // Validasi duplikasi waktu kegiatan pada nama yang berbeda
    $existingDate = Activity::where('activity_date', $activityDate)
        ->where('name', '!=', $request->name)
        ->exists();

    // Validasi nama kegiatan yang sudah ada untuk waktu yang berbeda
    $existingNameDifferentDate = Activity::where('name', $request->name)
        ->where('activity_date', '!=', $activityDate)
        ->exists();

    if ($existingName && $existingDate) {
        return redirect()->back()->withErrors([
            'name' => 'Nama kegiatan sudah ada untuk waktu yang sama.',
            'activity_date' => 'Waktu kegiatan sudah ada untuk nama yang berbeda.',
        ])->withInput();
    }

    if ($existingName) {
        return redirect()->back()->withErrors([
            'name' => 'Nama kegiatan sudah ada untuk waktu yang sama.',
        ])->withInput();
    }

    if ($existingDate) {
        return redirect()->back()->withErrors([
            'activity_date' => 'Waktu kegiatan sudah ada untuk nama yang berbeda.',
        ])->withInput();
    }

    if ($existingNameDifferentDate) {
        return redirect()->back()->withErrors([
            'name' => 'Nama kegiatan sudah ada untuk waktu yang berbeda.',
        ])->withInput();
    }

    // Jika tidak ada duplikasi, buat kegiatan baru
    $activity = Activity::create([
        'name' => $request->name,
        'activity_date' => $activityDate, // Menyimpan tanggal sebagai YYYY-MM-01
    ]);

    return redirect()->route('activities.show', $activity->id);
}

public function show($id)
{
    // Ambil aktivitas berdasarkan ID
    $activity = Activity::findOrFail($id);
    

    // Query untuk mengambil shipment dengan relasi 'roas' dan 'coas'
    $query = $activity->shipments()->with(['roas', 'coas', 'ashanls']);
    
    // Ambil nilai pencarian dari request
    $search = request('search');

    if ($search) {
        // Filter berdasarkan pencarian
        $query->where(function ($q) use ($search) {
            $q->where('mv', 'like', "%$search%")
                ->orWhere('bg', 'like', "%$search%")
                ->orWhere('gar', 'like', "%$search%")
                ->orWhere('sv', 'like', "%$search%");
        });
    }

    // Ambil shipments sesuai dengan query yang difilter
    $shipments = $query->get();

    // Ambil data roas dan coas yang unik
    $roas = $shipments->flatMap(function ($shipment) {
        return $shipment->roas;
    })->unique('id');

    $coas = $shipments->flatMap(function ($shipment) {
        return $shipment->coas;
    })->unique('id');

    $ashanls = $shipments->flatMap(function ($shipment) {
        return $shipment->ashanls;
    })->unique('id');

    // Jika pencarian tidak menemukan hasil, tambahkan alert ke session
    if ($search && $shipments->isEmpty()) {
        return redirect()->route('activities.show', $id)
            ->with('alert', "Tidak ditemukan hasil pencarian untuk kata kunci '$search'.");
    }

    // Ambil data coas dan ashanls dari aktivitas
    $allCoas = $activity->coas; 
    $allAshanls = $activity->ashanls; 

    return view('activities.show', compact('activity', 'shipments', 'roas', 'coas', 'allCoas', 'allAshanls', 'ashanls'));
}
    // ActivityController.php
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
