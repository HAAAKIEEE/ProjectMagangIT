<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua data shipment
        $shipments = Shipment::all();

        // Ambil data yang diperlukan untuk chart
        $garChartData = $shipments->pluck('gar')->countBy()->toArray();
        $edChartData = $shipments->pluck('type')->countBy()->toArray();
        $buyerChartData = $shipments->pluck('company_id')->countBy()->toArray(); // Misalnya company_id adalah relasi dengan tabel companies
        $surveyorChartData = $shipments->pluck('sv')->countBy()->toArray(); // Misalnya sv adalah kode surveyor

        // Kirim data ke view
        return view('dashboard.index', compact('shipments', 'garChartData', 'edChartData', 'buyerChartData', 'surveyorChartData'));
    }

}


