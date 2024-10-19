<?php

namespace App\Imports;

use App\Http\Controllers\Controller;
use App\Models\Shipment;

class ShipmentsImport extends Controller
{
    public function model(array $row)
    {
        return new Shipment([
            'gar' => $row[0],
            'type' => $row[1],
            'mv' => $row[2],
            'bg' => $row[3],
            'sp' => $row[4],
            'fv' => $row[5],
            'fd' => $row[6],
            'bf' => $row[7],
            'rc' => $row[8],
            'ss' => $row[9],
            'arrival_date' => \Carbon\Carbon::parse($row[10]),
            'departure_date' => \Carbon\Carbon::parse($row[11]),
            'cargo' => $row[12],
            'company_id' => $row[13],
            'dt' => $row[14],
            'tg' => $row[15],
            'sv' => $row[16],
        ]);
    }
}
