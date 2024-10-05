<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Shipment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Ambil semua data activity
        $activity = Activity::all();
        
        // Ambil filter dari request (dropdown)
        $activityFilter = $request->input('activity_filter');
    
        // Query untuk mendapatkan shipment
        $query = Shipment::query();
    
        // Jika ada filter berdasarkan activity, tambahkan query untuk memfilter
        if ($activityFilter) {
            $query->whereHas('activity', function ($q) use ($activityFilter) {
                $q->where('name', $activityFilter);
            });
        }
    
        // Ambil hasil query shipments
        $shipments = $query->get();
    
        // Ambil data yang diperlukan untuk chart
        $garChartData = $shipments->pluck('gar')->countBy()->toArray();
        $edChartData = $shipments->pluck('type')->countBy()->toArray();
        $buyerChartData = $shipments->pluck('company_id')->countBy()->toArray(); // Asumsikan company_id relasi dengan tabel companies
        $surveyorChartData = $shipments->pluck('sv')->countBy()->toArray(); // Misalnya sv adalah kode surveyor
    
        // Kirim data ke view dengan hasil filter
        return view('dashboard.index', compact('activity', 'shipments', 'garChartData', 'edChartData', 'buyerChartData', 'surveyorChartData'));
    }
    

}


