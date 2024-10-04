<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Shipment;
use App\Models\Activity;
use Carbon\Carbon; // Pastikan Anda mengimpor Carbon

class ExportController extends Controller
{
    public function index()
    {
        return view('index'); // Pastikan Anda memiliki view 'index' yang sesuai
    }

    public function export($id)
    {
        // Mengambil data dari database berdasarkan ID kegiatan
        $activity = Activity::with('shipments')->findOrFail($id);
        $activity = Activity::with('roas')->findOrFail($id);
        $activity = Activity::with('coas')->findOrFail($id);
        $activity = Activity::with('ashanls')->findOrFail($id);
        $activity = Activity::with('ashfts')->findOrFail($id);
        $activity = Activity::with('tems')->findOrFail($id);
        $activity = Activity::with('tems')->findOrFail($id);
        $activity = Activity::with('uas')->findOrFail($id);
        $activity = Activity::with('sas')->findOrFail($id);
        $shipments = $activity->shipments;
        $roas = $activity->roas;
        $coas = $activity->coas;
        $ashanls = $activity->ashanls;
        $ashfts = $activity->ashfts;
        $tems = $activity->tems;
        $afcships = $activity->afcships;
        $uas = $activity->uas;
        $sas = $activity->sas;

        // Konversi activity_date menjadi objek Carbon jika belum
        $activityDate = Carbon::parse($activity->activity_date);

        // Memuat template Excel
        $templatePath = public_path('Template.Excel.xlsx'); // Ganti dengan path template Anda
        $spreadsheet = IOFactory::load($templatePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan data ke spreadsheet
        $row = 7;
        foreach ($shipments as $shipment) {
            $sheet->setCellValue('A' . $row, $shipment->gar);
            $sheet->setCellValue('B' . $row, $shipment->type);
            $sheet->setCellValue('C' . $row, $shipment->mv ?? '-');
            $sheet->setCellValue('D' . $row, $shipment->bg ?? '-');
            $sheet->setCellValue('E' . $row, $shipment->sp);
            $sheet->setCellValue('F' . $row, $shipment->fv);
            $sheet->setCellValue('G' . $row, $shipment->fd);
            $sheet->setCellValue('H' . $row, $shipment->bf);
            $sheet->setCellValue('I' . $row, $shipment->rc); 
            $sheet->setCellValue('J' . $row, $shipment->ss);
            $sheet->setCellValue('K' . $row, Carbon::parse($shipment->arrival_date)->format('Y-m-d'));
            $sheet->setCellValue('L' . $row, Carbon::parse($shipment->departure_date)->format('Y-m-d'));
            $sheet->setCellValue('M' . $row, $shipment->duration ?? 'N/A');
            $sheet->setCellValue('N' . $row, $shipment->Bl1);
            $sheet->setCellValue('O' . $row, $shipment->Bl2);
            $sheet->setCellValue('P' . $row, $shipment->Bl3);
            $sheet->setCellValue('Q' . $row, $shipment->Bl4);
            $sheet->setCellValue('R' . $row, $shipment->Bl5);
            $sheet->setCellValue('S' . $row, $shipment->company ? $shipment->company->name : 'N/A');
            $sheet->setCellValue('T' . $row, $shipment->dt);
            $sheet->setCellValue('U' . $row, $shipment->tg);
            $sheet->setCellValue('V' . $row, $shipment->sv);

            $row++;
        }
        $row = 7;
        foreach ($roas as $roa) {
            $sheet->setCellValue('S' . $row, $roa->tm);
            $sheet->setCellValue('T' . $row, $roa->im);
            $sheet->setCellValue('U' . $row, $roa->ash);
            $sheet->setCellValue('V' . $row, $roa->ash2);
            $sheet->setCellValue('W' . $row, $roa->vm);
            $sheet->setCellValue('X' . $row, $roa->fc);
            $sheet->setCellValue('Y' . $row, $roa->ts);
            $sheet->setCellValue('Z' . $row, $roa->Adb);
            $sheet->setCellValue('AA' . $row,  $roa->Arb);
            $sheet->setCellValue('AB' . $row, $roa->Daf);
            $sheet->setCellValue('AC' . $row, $roa->Analisis_Standar);

            $row++;
        }
        $row = 7;
        foreach ($coas as $coa) {
            $sheet->setCellValue('AD' . $row, $coa->number);
            $sheet->setCellValue('AE' . $row, $coa->tm2);
            $sheet->setCellValue('AF' . $row, $coa->im2);
            $sheet->setCellValue('AG' . $row, $coa->ash1);
            $sheet->setCellValue('AH' . $row, $coa->ash3);
            $sheet->setCellValue('AI' . $row, $coa->vm2);
            $sheet->setCellValue('AJ' . $row, $coa->fc2);
            $sheet->setCellValue('AK' . $row, $coa->ts3);
            $sheet->setCellValue('AL' . $row, $coa->ts2);
            $sheet->setCellValue('AM' . $row,  $coa->adb);
            $sheet->setCellValue('AN' . $row, $coa->arb);
            $sheet->setCellValue('AO' . $row, $coa->daf);   

            $row++;
        }

        $row = 7;
        foreach ($ashanls as $ashanls) {
            $sheet->setCellValue('AP' . $row, $ashanls->cal);
            $sheet->setCellValue('AQ' . $row, $ashanls->si);
            $sheet->setCellValue('AR' . $row, $ashanls->ai);
            $sheet->setCellValue('AS' . $row, $ashanls->fe);
            $sheet->setCellValue('AT' . $row, $ashanls->ca);
            $sheet->setCellValue('AU' . $row, $ashanls->mg);
            $sheet->setCellValue('AV' . $row, $ashanls->na);
            $sheet->setCellValue('AW' . $row, $ashanls->k2);
            $sheet->setCellValue('AX' . $row, $ashanls->ti);
            $sheet->setCellValue('AY' . $row,  $ashanls->so);
            $sheet->setCellValue('AZ' . $row, $ashanls->mn);
            $sheet->setCellValue('BA' . $row, $ashanls->p2);
            $sheet->setCellValue('BB' . $row,  $ashanls->un);
            $sheet->setCellValue('BC' . $row, $ashanls->fofa);
            $sheet->setCellValue('BD' . $row, $ashanls->slafa);
            
            $row++;
        }

        $row = 7;
        foreach ($ashfts as $ashft) {
            $sheet->setCellValue('BE' . $row, $ashft->idt);
            $sheet->setCellValue('BF' . $row, $ashft->st);
            $sheet->setCellValue('BG' . $row, $ashft->ht);
            $sheet->setCellValue('BH' . $row, $ashft->ft);
            $sheet->setCellValue('BI' . $row, $ashft->idt1);
            $sheet->setCellValue('BJ' . $row, $ashft->st1);
            $sheet->setCellValue('BK' . $row, $ashft->ht1);
            $sheet->setCellValue('BL' . $row, $ashft->ft1);  

            // $sheet->getStyle('A' . $row . ':BL' . $row)->applyFromArray([
            //     'borders' => [
            //         'allBorders' => [
            //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            //             'color' => ['argb' => '000000'],
            //         ],
            //     ],
            //     'alignment' => [
            //         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            //         'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            //     ],
            // ]);
            

            $row++;
        }

        $row = 7;
        foreach ($tems as $tem) {
            $sheet->setCellValue('BM' . $row, $tem->ci);
            $sheet->setCellValue('BN' . $row, $tem->f);
            $sheet->setCellValue('BO' . $row, $tem->p);
            $sheet->setCellValue('BP' . $row, $tem->b);
            $sheet->setCellValue('BQ' . $row, $tem->as);
            $sheet->setCellValue('BR' . $row, $tem->hg);
            $sheet->setCellValue('BS' . $row, $tem->se); 

            $row++;
        }

        $row = 7;
        foreach ($afcships as $afcship) {
            $sheet->setCellValue('BT' . $row, $afcship->vm_pct);
            $sheet->setCellValue('BU' . $row, $afcship->cv_cg);
            $sheet->setCellValue('BV' . $row, $afcship->pm);
            $sheet->setCellValue('BW' . $row, $afcship->radioactiv);

            $row++;
        }

        $row = 7;
        foreach ($uas as $ua) {
            $sheet->setCellValue('BX' . $row, $ua->m);
            $sheet->setCellValue('BY' . $row, $ua->ac);
            $sheet->setCellValue('BZ' . $row, $ua->c);
            $sheet->setCellValue('CA' . $row, $ua->h);
            $sheet->setCellValue('CB' . $row, $ua->n);
            $sheet->setCellValue('CC' . $row, $ua->s);
            $sheet->setCellValue('CD' . $row, $ua->o); 
            $sheet->setCellValue('CE' . $row, $ua->index);
            $sheet->setCellValue('CF' . $row, $ua->persen); 

            $row++;
        }

        $row = 7;
        foreach ($sas as $sa) {
            $sheet->setCellValue('CG' . $row, $sa->mm_70);
            $sheet->setCellValue('CH' . $row, $sa->mm_50);
            $sheet->setCellValue('CI' . $row, $sa->mm_50_315);
            $sheet->setCellValue('CJ' . $row, $sa->mm_315_224);
            $sheet->setCellValue('CK' . $row, $sa->mm_315_16);
            $sheet->setCellValue('CL' . $row, $sa->mm_224_112);
            $sheet->setCellValue('CM' . $row, $sa->mm_112_63); 
            $sheet->setCellValue('CN' . $row, $sa->mm_8);
            $sheet->setCellValue('CO' . $row, $sa->mm_164_75); 
            $sheet->setCellValue('CP' . $row, $sa->mm_63_475);
            $sheet->setCellValue('CQ' . $row, $sa->mm_475_2);
            $sheet->setCellValue('CR' . $row, $sa->mm_2_1);
            $sheet->setCellValue('CS' . $row, $sa->mm_1_05);
            $sheet->setCellValue('CT' . $row, $sa->mm_05);
            $sheet->setCellValue('CU' . $row, $sa->total);
            $sheet->setCellValue('CV' . $row, $sa->size1); 
            $sheet->setCellValue('CW' . $row, $sa->size2);
            $sheet->setCellValue('CX' . $row, $sa->mm_050_persen); 
            $sheet->setCellValue('CY' . $row, $sa->mm_070_persen); 

            $sheet->getStyle('A' . $row . ':CY' . $row)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ]);

            $row++;
        }

        // Membuat file Excel
        $writer = new Xlsx($spreadsheet);

        // Nama file yang akan didownload
        $fileName = 'shipments_export_' . $activityDate->format('Y-m') . '.xlsx';

        // Mengatur header untuk download file
        $response = Response::streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);

        // Mengatur tipe konten
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        return $response;
    }
}
