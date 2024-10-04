@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3 class="mt-4">{{ \Carbon\Carbon::parse($activity->activity_date)->format('F Y') }}</h3>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="d-flex align-items-center mb-3">
                <!-- Tombol Kembali -->
                <a href="{{ route('activities.index') }}" class="btn btn-link p-0 me-2">
                    <i class="fas fa-arrow-left" style="font-size: 1.5rem; color: #d3d3d3;"></i>
                </a>
                <div>
                    <a href="{{ route('shipments.create', $activity->id) }}" class="btn btn-primary mr-2">Tambah Data
                        {{ \Carbon\Carbon::parse($activity->activity_date)->format('F') }}</a>
                    <a href="{{ route('export', $activity->id) }}" class="btn btn-success">Download Excel</a>
                    <a href="{{ route('shipments.create', $activity->id) }}" class="btn btn-primary mr-2"
                        style="background-color: rgb(10, 0, 109);">Upload File</a>
                </div>
            </div>
            <form method="GET" action="{{ route('activities.show', $activity->id) }}"
                class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Search for MV, Barge, or Surveyor..." aria-label="Search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i
                            class="fas fa-search"></i></button>
                </div>
            </form>
        </div>

        <!-- Tampilkan alert jika pencarian tidak menemukan hasil -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        <!-- Tampilkan alert jika ada -->
        @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                {{ session('alert') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
        <h4>Shipment</h4>
        @if ($activity->shipments->isEmpty())
            <div class="alert alert-warning mt-4" role="alert">
                Belum ada data yang ditambahkan.
            </div>
        @else
            <div class="table-responsive mt-4">
                <table class="table table-bordered text-center table-hover">
                    <thead class="thead-dark thead-custom">
                        <tr>
                            <th colspan="2">SHIPMENT</th>
                            <th rowspan="3">MV</th>
                            <th rowspan="3">BARGE</th>
                            <th rowspan="3">STOWAGE PLAN</th>
                            <th rowspan="3">FIGURE VESSEL</th>
                            <th rowspan="3">FINAL DRAFT</th>
                            <th colspan="3">RETURN CARGO</th>
                            <th colspan="3">LOADING TIME</th>
                            <th colspan="10">CARGO</th>
                            <th rowspan="3">TOTAL</th>
                            <th colspan="2" rowspan="3">SISIPAN</th>
                            <th colspan="2" rowspan="3">INCREASE</th>
                            <th rowspan="3">BUYER</th>
                            <th rowspan="3">DESTINATION</th>
                            <th rowspan="3">B/L</th>
                            <th rowspan="3">SURVEYOR</th>
                            <th rowspan="3">Actions</th>
                        </tr>
                        <tr>
                            <th rowspan="3">GAR</th>
                            <th rowspan="3">E/D</th>
                            <th rowspan="3">BARGE FIGURE (R/C)</th>
                            <th rowspan="3">R/C BARGE</th>
                            <th rowspan="3">SHORTAGE/SURPLUS</th>
                            <th rowspan="3">Commence</th>
                            <th rowspan="3">Completed</th>
                            <th rowspan="3">Duration (Day)</th>
                            <th colspan="6">BLOCK 2</th>
                            <th colspan="2" rowspan="3">BLOCK 3</th>
                            <th colspan="2" rowspan="3">BLOCK 4</th>
                        </tr>
                        <tr>
                            <th colspan="2">BLOCK 2-HS</th>
                            <th colspan="2">BLOCK 2-LS</th>
                            <th colspan="2">BLOCK 2-HA</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $totalSp = 0;
                            $totalFv = 0;
                            $totalFd = 0;
                            $totalBf = 0;
                            $totalRc = 0;
                            $totalSs = 0;
                            $totalBl1 = 0;
                            $totalBl2 = 0;
                            $totalBl3 = 0;
                            $totalBl4 = 0;
                            $totalBl5 = 0;
                            $totalTtl = 0;
                            $totalSsn = 0;
                            $totalInc = 0;
                        @endphp

                        @foreach ($shipments as $shipment)
                            <tr>
                                <td>{{ $shipment->gar }}</td>
                                <td>{{ $shipment->type }}</td>
                                <td>{{ $shipment->mv ?? '-' }}</td>
                                <td>{{ $shipment->bg ?? '-' }}</td>
                                <td>{{ $shipment->sp }}</td>
                                <td>{{ $shipment->fv }}</td>
                                <td>{{ $shipment->fd }}</td>
                                <td>{{ $shipment->bf }}</td>
                                <td>{{ $shipment->rc }}</td>
                                <td>{{ $shipment->ss }}</td>
                                <td>{{ \Carbon\Carbon::parse($shipment->arrival_date)->format('Y-m-d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($shipment->departure_date)->format('Y-m-d') }}</td>
                                <td>{{ $shipment->duration ?? 'N/A' }}</td>
                                <td>{{ $shipment->Bl1 }}</td>
                                <td>{{ $shipment->pr1 }}</td>
                                <td>{{ $shipment->Bl2 }}</td>
                                <td>{{ $shipment->pr2 }}</td>
                                <td>{{ $shipment->Bl3 }}</td>
                                <td>{{ $shipment->pr3 }}</td>
                                <td>{{ $shipment->Bl4 }}</td>
                                <td>{{ $shipment->pr4 }}</td>
                                <td>{{ $shipment->Bl5 }}</td>
                                <td>{{ $shipment->pr5 }}</td>
                                <td>{{ $shipment->ttl }}</td>
                                <td>{{ $shipment->ssn }}</td>
                                <td>{{ $shipment->pr6 }}</td>
                                <td>{{ $shipment->inc }}</td>
                                <td>{{ $shipment->pr7 }}</td>
                                <td>{{ $shipment->company ? $shipment->company->name : '-' }}</td>
                                <td>{{ $shipment->dt }}</td>
                                <td>{{ $shipment->tg }}</td>
                                <td>{{ $shipment->sv }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('shipments.edit', $shipment->id) }}"
                                            class="btn btn-warning btn-sm mr-3" style="margin-right: 10px;">Edit</a>
                                    </div>
                                </td>
                            </tr>

                            @php
                                $totalSp += floatval($shipment->sp ?? 0);
                                $totalFv += floatval($shipment->fv ?? 0);
                                $totalFd += floatval($shipment->fd ?? 0);
                                $totalBf += floatval($shipment->bf ?? 0);
                                $totalRc += floatval($shipment->rc ?? 0);
                                $totalSs += floatval($shipment->ss ?? 0);
                                $totalBl1 += floatval($shipment->Bl1 ?? 0);
                                $totalBl2 += floatval($shipment->Bl2 ?? 0);
                                $totalBl3 += floatval($shipment->Bl3 ?? 0);
                                $totalBl4 += floatval($shipment->Bl4 ?? 0);
                                $totalBl5 += floatval($shipment->Bl5 ?? 0);
                                $totalTtl += floatval($shipment->ttl ?? 0);
                                $totalSsn += floatval($shipment->ssn ?? 0);
                                $totalInc += floatval($shipment->inc ?? 0);
                            @endphp

                            @php
                                // Menghitung total pr1 sampai pr7 berdasarkan total ttl
                                $totalPr1 = $totalTtl != 0 ? $totalBl1 / $totalTtl : 0;
                                $totalPr2 = $totalTtl != 0 ? $totalBl2 / $totalTtl : 0;
                                $totalPr3 = $totalTtl != 0 ? $totalBl3 / $totalTtl : 0;
                                $totalPr4 = $totalTtl != 0 ? $totalBl4 / $totalTtl : 0;
                                $totalPr5 = $totalTtl != 0 ? $totalBl5 / $totalTtl : 0;
                                $totalPr6 = $totalTtl != 0 ? $totalSsn / $totalTtl : 0;
                                $totalPr7 = $totalTtl != 0 ? $totalInc / $totalTtl : 0;
                            @endphp
                        @endforeach

                        <!-- Row for totals -->
                        <tr>
                            <td colspan="4"><strong>Total</strong></td>
                            <td><strong>{{ $totalSp }}</strong></td>
                            <td><strong>{{ $totalFv }}</strong></td>
                            <td><strong>{{ $totalFd }}</strong></td>
                            <td><strong>{{ $totalBf }}</strong></td>
                            <td><strong>{{ $totalRc }}</strong></td>
                            <td><strong>{{ $totalSs }}</strong></td>
                            <td colspan="3"></td> <!-- Commence, Completed, Duration -->
                            <td><strong>{{ $totalBl1 }}</strong></td>
                            <td><strong>{{ number_format($totalPr1, 2) }}</strong></td> <!-- PR1 -->
                            <td><strong>{{ $totalBl2 }}</strong></td>
                            <td><strong>{{ number_format($totalPr2, 2) }}</strong></td> <!-- PR2 -->
                            <td><strong>{{ $totalBl3 }}</strong></td>
                            <td><strong>{{ number_format($totalPr3, 2) }}</strong></td> <!-- PR3 -->
                            <td><strong>{{ $totalBl4 }}</strong></td>
                            <td><strong>{{ number_format($totalPr4, 2) }}</strong></td> <!-- PR4 -->
                            <td><strong>{{ $totalBl5 }}</strong></td>
                            <td><strong>{{ number_format($totalPr5, 2) }}</strong></td> <!-- PR5 -->
                            <td><strong>{{ $totalTtl }}</strong></td>
                            <td><strong>{{ $totalSsn }}</strong></td>
                            <td><strong>{{ number_format($totalPr6, 2) }}</strong></td> <!-- PR6 -->
                            <td><strong>{{ $totalInc }}</strong></td>
                            <td><strong>{{ number_format($totalPr7, 2) }}</strong></td> <!-- PR7 -->
                            <td colspan="7"></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        @endif


        <h4>Report of Analysis </h4>
        <!-- Tampilkan tabel jika ada data ROA -->
        @if ($roas->isNotEmpty())
            <div class="table-responsive mt-4">
                <table class="table table-bordered text-center table-hover">
                    <thead class="thead-dark thead-custom">
                        <tr>
                            <th colspan="1">TM</th>
                            <th colspan="1">IM</th>
                            <th colspan="1">ASH</th>
                            <th colspan="1">ASH</th>
                            <th colspan="1">VM</th>
                            <th colspan="1">FC</th>
                            <th colspan="1">TS</th>
                            <th colspan="3">CV</th>
                            <th rowspan="2">Analisis Standar</th>
                            <th rowspan="2">Actions</th>
                        </tr>
                        <tr>
                            <th> % Arb </th>
                            <th> % Adb </th>
                            <th> % Adb </th>
                            <th> % db </th>
                            <th> % Adb </th>
                            <th> % Adb </th>
                            <th> % Adb </th>
                            <th> Adb </th>
                            <th> Arb </th>
                            <th> Daf </th>

                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($roas as $roa)
                            <tr>
                                <td>{{ $roa->tm }}</td>
                                <td>{{ $roa->im }}</td>
                                <td>{{ $roa->ash }}</td>
                                <td>{{ $roa->ash2 }}</td>
                                <td>{{ $roa->vm }}</td>
                                <td>{{ $roa->fc }}</td>
                                <td>{{ $roa->ts }}</td>
                                <td>{{ $roa->Adb }}</td>
                                <td>{{ $roa->Arb }}</td>
                                <td>{{ $roa->Daf }}</td>
                                <td>{{ $roa->Analisis_Standar }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('roa.edit', $roa->id) }}" class="btn btn-warning btn-sm mr-3"
                                            style="margin-right: 10px;">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning mt-4" role="alert">
                Belum ada data ROA yang ditambahkan.
            </div>
        @endif

        <h4>Certificate of Analysis</h4>
        @if ($coas->isNotEmpty())
            <div class="table-responsive mt-4">
                <table class="table table-bordered text-center table-hover">
                    <thead class="thead-dark thead-custom">
                        <tr>
                            <th rowspan="3">COA NUMBER</th>
                            <th colspan="11">CERTIFICATE OF ANALYSIS</th>
                            <th rowspan="3">Actions</th>
                        </tr>
                        <tr>
                            <th>TM</th>
                            <th>IM</th>
                            <th>Ash (%Adb)</th>
                            <th>Ash (%db)</th>
                            <th>VM (%Adb)</th>
                            <th>FC (%Adb)</th>
                            <th>TS (%Adb)</th>
                            <th>TS (%db)</th>
                            <th colspan="3">CV</th>
                        </tr>
                        <tr>
                            <th>% Arb</th>
                            <th>% Adb</th>
                            <th>% Adb</th>
                            <th>% db</th>
                            <th>% Adb</th>
                            <th>% Adb</th>
                            <th>% Adb</th>
                            <th>% db</th>
                            <th>Adb</th>
                            <th>Arb</th>
                            <th>Daf</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coas as $coa)
                            <tr>
                                <td>{{ $coa->number }}</td>
                                <td>{{ $coa->tm2 }}</td>
                                <td>{{ $coa->im2 }}</td>
                                <td>{{ $coa->ash1 }}</td>
                                <td>{{ $coa->ash3 }}</td>
                                <td>{{ $coa->vm2 }}</td>
                                <td>{{ $coa->fc2 }}</td>
                                <td>{{ $coa->ts3 }}</td>
                                <td>{{ $coa->ts2 }}</td>
                                <td>{{ $coa->adb }}</td>
                                <td>{{ $coa->arb }}</td>
                                <td>{{ $coa->daf }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('coas.edit', $coa->id) }}" class="btn btn-warning btn-sm mr-3"
                                            style="margin-right: 10px;">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning mt-4" role="alert">
                Belum ada data COA yang ditambahkan.
            </div>
        @endif

        <h4>Ash Analysis</h4>
        @if ($ashanls->isNotEmpty())
            <div class="table-responsive mt-4">
                <table class="table table-bordered text-center table-hover">
                    <thead class="thead-dark thead-custom">
                        <tr>
                            <th colspan="1">NCV</th>
                            <th colspan="12">Ash Analysis</th>
                            <th rowspan="4">Fouling Factor</th>
                            <th rowspan="4">Slagging Factor</th>
                            <th rowspan="4">Actions</th>
                        </tr>
                        <tr>
                            <th>Cal/g</th>
                            <th>SiO2</th>
                            <th>Ai2O3</th>
                            <th>Fe2O3</th>
                            <th>CaO</th>
                            <th>MgO</th>
                            <th>Na2O</th>
                            <th>K2O</th>
                            <th>TiO2</th>
                            <th>SO3</th>
                            <th>Mn3O4</th>
                            <th>P2O5</th>
                            <th>Und.</th>
                        </tr>
                        <tr>
                            <th>(ar)</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>% </th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ashanls as $ashanl)
                            <tr>
                                <td>{{ $ashanl->cal }}</td>
                                <td>{{ $ashanl->si }}</td>
                                <td>{{ $ashanl->ai }}</td>
                                <td>{{ $ashanl->fe }}</td>
                                <td>{{ $ashanl->ca }}</td>
                                <td>{{ $ashanl->mg }}</td>
                                <td>{{ $ashanl->na }}</td>
                                <td>{{ $ashanl->k2 }}</td>
                                <td>{{ $ashanl->ti }}</td>
                                <td>{{ $ashanl->so }}</td>
                                <td>{{ $ashanl->mn }}</td>
                                <td>{{ $ashanl->p2 }}</td>
                                <td>{{ $ashanl->un }}</td>
                                <td>{{ $ashanl->fofa }}</td>
                                <td>{{ $ashanl->slafa }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('ashanls.edit', $ashanl->id) }}"
                                            class="btn btn-warning btn-sm mr-3" style="margin-right: 10px;">Edit</a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning mt-4" role="alert">
                Belum ada data Ash Analysis yang ditambahkan.
            </div>
        @endif

        <h4>Ash Fusion Temperature</h4>
        @if ($ashfts->isNotEmpty())
            <div class="table-responsive mt-4">
                <table class="table table-bordered text-center table-hover">
                    <thead class="thead-dark thead-custom">
                        <tr>
                            <th colspan="8">Ash Fusion Temperature (°C)</th>
                            <th rowspan="4">Actions</th>
                        </tr>
                        <tr>
                            <th colspan="4">Reducing Atmosphere (°C)</th>
                            <th colspan="4">Oxidation Atmosphere (°C)</th>
                        </tr>
                        <tr>
                            <th>IDT</th>
                            <th>ST</th>
                            <th>HT</th>
                            <th>FT</th>
                            <th>IDT</th>
                            <th>ST</th>
                            <th>HT</th>
                            <th>FT</th>
                        </tr>
                        <tr>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ashfts as $ashft)
                            <tr>
                                <td>{{ $ashft->idt }}</td>
                                <td>{{ $ashft->st }}</td>
                                <td>{{ $ashft->ht }}</td>
                                <td>{{ $ashft->ft }}</td>
                                <td>{{ $ashft->idt1 }}</td>
                                <td>{{ $ashft->st1 }}</td>
                                <td>{{ $ashft->ht1 }}</td>
                                <td>{{ $ashft->ft1 }}</td>
                                <td>
                                    <!-- Tombol edit yang berwarna kuning -->
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('ashfts.edit', $ashft->id) }}"
                                            class="btn btn-warning btn-sm mr-3" style="margin-right: 10px;">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning mt-4" role="alert">
                Belum ada data Ash Fusion Temperature yang ditambahkan.
            </div>
        @endif

        <h4>Trace Element Major</h4>
        @if ($tems->isNotEmpty())
            <div class="table-responsive mt-4">
                <table class="table table-bordered text-center table-hover">
                    <thead class="thead-dark thead-custom">
                        <tr>
                            <th colspan="7">Trace Element Major</th>
                            <th rowspan="4">Actions</th>
                        </tr>

                        <tr>
                            <th>CI</th>
                            <th>F</th>
                            <th>P</th>
                            <th>B</th>
                            <th>As</th>
                            <th>Hg</th>
                            <th>Se</th>

                        </tr>
                        <tr>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tems as $tem)
                            <tr>
                                <td>{{ $tem->ci }}</td>
                                <td>{{ $tem->f }}</td>
                                <td>{{ $tem->p }}</td>
                                <td>{{ $tem->b }}</td>
                                <td>{{ $tem->as }}</td>
                                <td>{{ $tem->hg }}</td>
                                <td>{{ $tem->se }}</td>
                                <td>
                                    <!-- Tombol edit yang berwarna kuning -->
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('tem.edit', $tem->id) }}" class="btn btn-warning btn-sm mr-3"
                                            style="margin-right: 10px;">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning mt-4" role="alert">
                Belum ada data Trace Element Major Temperature yang ditambahkan.
            </div>
        @endif

        <h4>Additional for Chinese shipment</h4>
        @if ($afcships->isNotEmpty())
            <div class="table-responsive mt-4">
                <table class="table table-bordered text-center table-hover">
                    <thead class="thead-dark thead-custom">
                        <tr>
                            <th colspan="4">Additional for Chinese shipment</th>
                            <th rowspan="4">Actions</th>
                        </tr>

                        <tr>
                            <th>VM,pct</th>
                            <th>CV,c/g</th>
                            <th>PM</th>
                            <th>Radioactive</th>

                        </tr>
                        <tr>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($afcships as $afcship)
                            <tr>

                                <td>{{ $afcship->vm_pct }}</td>
                                <td>{{ $afcship->cv_cg }}</td>
                                <td>{{ $afcship->pm }}</td>
                                <td>{{ $afcship->radioactiv }}</td>
                                <td>
                                    <!-- Tombol edit yang berwarna kuning -->
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('afcship.edit', $afcship->id) }}"
                                            class="btn btn-warning btn-sm mr-3" style="margin-right: 10px;">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning mt-4" role="alert">
                Belum ada data Additional for Chinese shipment yang ditambahkan.
            </div>
        @endif

        {{-- ua --}}
        <h4>Ultimate Analysis (adb)</h4>
        @if ($uas->isNotEmpty())
            <div class="table-responsive mt-4">
                <table class="table table-bordered text-center table-hover">
                    <thead class="thead-dark thead-custom">
                        <tr>
                            <th colspan="7">Ultimate Analysis (adb)</th>
                            <th rowspan="2">HGI</th>
                            <th rowspan="2">MHC/EQM</th>

                            <th rowspan="4">Actions</th>
                        </tr>

                        <tr>
                            <th>M</th>
                            <th>Ac</th>
                            <th>C</th>
                            <th>H</th>
                            <th>N</th>
                            <th>S</th>
                            <th>O</th>


                        </tr>
                        <tr>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>°C</th>
                            <th>Index</th>
                            <th>%</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($uas as $ua)
                            <tr>

                                <td>{{ $ua->m }}</td>
                                <td>{{ $ua->ac }}</td>
                                <td>{{ $ua->c }}</td>
                                <td>{{ $ua->h }}</td>
                                <td>{{ $ua->n }}</td>
                                <td>{{ $ua->s }}</td>
                                <td>{{ $ua->o }}</td>
                                <td>{{ $ua->index }}</td>
                                <td>{{ $ua->persen }}</td>
                                <td>
                                    <!-- Tombol edit yang berwarna kuning -->
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('ua.edit', $ua->id) }}" class="btn btn-warning btn-sm mr-3"
                                            style="margin-right: 10px;">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning mt-4" role="alert">
                Belum ada data Ultimate Analysis (adb) yang ditambahkan.
            </div>
        @endif

        {{-- sa --}}
        <h4>Size Analysis</h4>
        @if ($uas->isNotEmpty())
            <div class="table-responsive mt-4">
                <table class="table table-bordered text-center table-hover">
                    <thead class="thead-dark thead-custom">
                        <tr>
                            <th colspan="19">Size Analysis</th>
                            {{-- <th colspan="2">TOTAL %</th> <!-- Gabungan kolom TOTAL % --> --}}
                            <th rowspan="4">Actions</th>
                        </tr>

                        <tr>

                            <th>70_mm</th>
                            <th>50_mm</th>
                            <th>50_315_mm</th>
                            <th>315_224_mm</th>
                            <th>315_16_mm</th>
                            <th>224_112_mm</th>
                            <th>112_63_mm</th>
                            <th>8_mm</th>
                            <th>164_75_mm</th>
                            <th>63_475_mm</th>
                            <th>475_2_mm</th>
                            <th>2_1_mm</th>
                            <th>1_05_mm</th>
                            <th>05_mm</th>
                            <th>TOTAL %</th>
                            <th>size1</th>
                            <th>size2</th>
                            <th>050_mm_persen</th>
                            <th>070_mm_persen</th>

                        </tr>
                        <tr>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sas as $sa)
                            <tr>
                                <td>{{ $sa->mm_70 }}</td>
                                <td>{{ $sa->mm_50 }}</td>
                                <td>{{ $sa->mm_50_315 }}</td>
                                <td>{{ $sa->mm_315_224 }}</td>
                                <td>{{ $sa->mm_315_16 }}</td>
                                <td>{{ $sa->mm_224_112 }}</td>
                                <td>{{ $sa->mm_112_63 }}</td>
                                <td>{{ $sa->mm_8 }}</td>
                                <td>{{ $sa->mm_164_75 }}</td>
                                <td>{{ $sa->mm_63_475 }}</td>
                                <td>{{ $sa->mm_475_2 }}</td>
                                <td>{{ $sa->mm_2_1 }}</td>
                                <td>{{ $sa->mm_1_05 }}</td>
                                <td>{{ $sa->mm_05 }}</td>
                                <td>{{ $sa->total }}</td>
                                <td>{{ $sa->size1 }}</td>
                                <td>{{ $sa->size2 }}</td>
                                <td>{{ $sa->mm_050_persen }}</td>
                                <td>{{ $sa->mm_070_persen }}</td>


                                <td>
                                    <!-- Tombol edit yang berwarna kuning -->
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('sa.edit', $sa->id) }}" class="btn btn-warning btn-sm mr-3"
                                            style="margin-right: 10px;">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning mt-4" role="alert">
                Belum ada data Size Analysis yang ditambahkan.
            </div>
        @endif

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap Bundle with Popper -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


        <style>
            .thead-dark th {
                background-color: #9a9a9a;
                color: white;
            }

            .thead-custom th {
                vertical-align: middle;
            }

            .alert-dismissible .close {
                position: absolute;
                top: 0;
                right: 0;
                padding: 0.75rem 1.25rem;
                margin: 0;
                background: none;
                border: none;
                color: #d3d3d3;
            }

            .alert-dismissible .close i {
                font-size: 1.5rem;
                /* Adjust size if necessary */
                vertical-align: middle;
            }

            .alert-dismissible .close:hover {
                color: #000;
                /* Optional: Change color on hover */
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.875rem;
                line-height: 1.5;
                border-radius: 0.2rem;
            }
        </style>
    @endsection
