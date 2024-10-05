@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-center align-items-center flex-column py-4">
            <h1 class="display-4 text-primary font-weight-bold mb-2">Selamat Datang</h1>
        </div>
        <p class="lead text-muted">Dashboard</p>
        <!-- Card sections -->
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">BUYER Domestik</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('domestic_companies.index') }}">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">BUYER Export</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('international_companies.index') }}">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Surveyor</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('surveyors.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>


      <!-- Shipments Table -->
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Shipments
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Shipments</h1>
        
        <!-- Filter Form -->
        <form method="GET" action="{{ route('dashboard.index') }}">
            <label for="activity_filter">Filter by Activity:</label>
            <select name="activity_filter" id="activity_filter" onchange="this.form.submit()">
                <option value="" disabled selected>Select an option</option>
                @foreach ($activity as $activiti)
                    <option value="{{ $activiti->name }}" {{ request('activity_filter') == $activiti->name ? 'selected' : '' }}>
                        {{ $activiti->name }}
                    </option>
                @endforeach
            </select>
        </form>
        
        <!-- Shipments Table -->
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>GAR</th>
                    <th>E/D</th>
                    <th>BUYER</th>
                    <th>MV</th>
                    <th>BG</th>
                    <th>Arrival Date</th>
                    <th>Departure Date</th>
                    <th>Duration (days)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shipments as $shipment)
                    <tr>
                        <td>{{ $shipment->gar }}</td>
                        <td>{{ $shipment->type }}</td>
                        <td>{{ $shipment->company ? $shipment->company->name : 'N/A' }}</td>
                        <td>{{ $shipment->mv ? $shipment->mv : '-' }}</td>
                        <td>{{ $shipment->bg ? $shipment->bg : '-' }}</td>
                        <td>{{ $shipment->arrival_date }}</td>
                        <td>{{ $shipment->departure_date }}</td>
                        <td>{{ $shipment->duration }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


        <!-- Existing Charts -->
        <div class="row">
            <div class="col-xl-12"> <!-- Mengambil seluruh lebar container -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Chart GAR
                    </div>
                    <div class="card-body">
                        <canvas id="myBarChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doughnut Charts -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        Chart Buyer
                    </div>
                    <div class="card-body">
                        <canvas id="myDoughnutChart1" width="100%" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        Chart Surveyor
                    </div>
                    <div class="card-body">
                        <canvas id="myDoughnutChart2" width="100%" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Chart E/D
                    </div>
                    <div class="card-body">
                        <canvas id="myDoughnutChart3" width="100%" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>

    </style>
    <!-- Menambahkan Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari PHP
            var garData = @json($garChartData);
            var edData = @json($edChartData);
            var buyerData = @json($buyerChartData);
            var surveyorData = @json($surveyorChartData);

            // Helper function to generate unique colors
            function generateColors(count) {
                const colors = [];
                for (let i = 0; i < count; i++) {
                    const hue = Math.floor(Math.random() * 360);
                    colors.push(`hsl(${hue}, 70%, 70%)`);
                }
                return colors;
            }

            // Bar Chart for GAR
            var ctxBar = document.getElementById('myBarChart').getContext('2d');
            new Chart(ctxBar, {
                    type: 'bar',
                    data: {
                        labels: Object.keys(garData),
                        datasets: [{
                            label: 'GAR Data',
                            data: Object.values(garData),
                            backgroundColor: generateColors(Object.keys(garData).length),
                            borderColor: 'rgba(0, 0, 0, 0.1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 10, // Set kelipatan 1 juta
                                    callback: function(value) {
                                        return value.toLocaleString(); // Format angka dengan pemisah ribuan
                                    }
                                },
                                max: 100 // Batas maksimal 7 juta
                            }
                        },
                        maintainAspectRatio: false
                    
                }
            });

        // Doughnut Chart for BUYER
        var ctxDoughnut1 = document.getElementById('myDoughnutChart1').getContext('2d'); new Chart(ctxDoughnut1, {
            type: 'doughnut',
            data: {
                labels: Object.keys(buyerData),
                datasets: [{
                    label: 'Buyer Data',
                    data: Object.values(buyerData),
                    backgroundColor: generateColors(Object.keys(buyerData).length),
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false
            }
        });

        // Doughnut Chart for SURVEYOR
        var ctxDoughnut2 = document.getElementById('myDoughnutChart2').getContext('2d'); new Chart(ctxDoughnut2, {
            type: 'doughnut',
            data: {
                labels: Object.keys(surveyorData),
                datasets: [{
                    label: 'Surveyor Data',
                    data: Object.values(surveyorData),
                    backgroundColor: generateColors(Object.keys(surveyorData).length),
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false
            }
        });

        // Doughnut Chart for E/D
        var ctxDoughnut3 = document.getElementById('myDoughnutChart3').getContext('2d');

        // Calculate total and percentages
        var totalED = Object.values(edData).reduce((a, b) => a + b, 0);
        var edPercentages = Object.keys(edData).map(key => ({
            label: key,
            value: edData[key],
            percentage: ((edData[key] / totalED) * 100).toFixed(2) // Calculate percentage
        }));

        new Chart(ctxDoughnut3, {
            type: 'doughnut',
            data: {
                labels: edPercentages.map(p => `${p.label} (${p.percentage}%)`), // Labels with percentage
                datasets: [{
                    label: 'Doughnut Chart 3 E/D',
                    data: edPercentages.map(p => p.value),
                    backgroundColor: generateColors(edPercentages.length),
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false
            }
        });
        });
    </script>

@endsection
