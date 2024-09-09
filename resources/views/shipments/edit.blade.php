@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center mb-3">
        <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-link p-0 me-2">
            <i class="fas fa-arrow-left" style="font-size: 1.5rem; color: #d3d3d3;"></i>
        </a>
        <h1>Edit Shipment</h1>
    </div>
    <form action="{{ route('shipments.update', $shipment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $shipment->id }}">

        <style>
            .section-two .short-input,
            .section-two .short-select {
                max-width: 200px;
                /* Lebar sesuai kebutuhan */
            }

            .section-two .form-inline {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
            }

            .section-two .form-group {
                flex: 1;
            }

            .date-inputs {
                display: flex;
                justify-content: space-between;
            }

            .date-inputs .form-group {
                flex: 1;
                margin-right: 10px;
                /* Jarak antar input */
            }

            .date-inputs .form-group:last-child {
                margin-right: 0;
                /* Menghapus margin kanan pada elemen terakhir */
            }

            .short-input,
            .short-select {
                max-width: 100%;
                /* Menghilangkan batasan lebar untuk elemen dalam inline-group */
            }

            .inline-group {
                display: flex;
                justify-content: space-between;
            }

            .inline-group .form-group {
                flex: 1;
                margin-right: 10px;
                /* Jarak antar elemen */
            }

            .inline-group .form-group:last-child {
                margin-right: 0;
                /* Menghapus margin kanan pada elemen terakhir */
            }

            .inline-group .form-control {
                width: 100%;
                /* Memastikan input mengambil seluruh lebar yang tersedia */
            }

            .short-input,
            .short-select {
                max-width: 200px;
                /* Lebar sesuai kebutuhan */
            }
        </style>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" value="{{ old('type', $shipment->type) }}" required>
                <option value="">Pilih Tipe</option>
                <option value="domestik" {{ $shipment->type == 'domestik' ? 'selected' : '' }}>Domestik</option>
                <option value="international" {{ $shipment->type == 'international' ? 'selected' : '' }}>Internasional</option>
            </select>
        </div>

        <div class="inline-group">
            <div class="form-group">
                <label for="company_id">BUYER</label>
                <select name="company_id" id="company_id" class="form-control" value="{{ old('company_id', $shipment->company_id) }}" required>
                    <option value="">Pilih BUYER</option>
                    <!-- Options will be populated dynamically -->
                </select>
            </div>

            <div class="form-group">
                <label for="dt">DESTINATION</label>
                <input type="text" class="form-control" id="dt" name="dt" value="{{ old('dt', $shipment->dt) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="mv">MV</label>
            <input type="text" class="form-control" id="mv" name="mv" value="{{ old('mv', $shipment->mv) }}">
        </div>

        <div class="form-group">
            <label for="bg">Barge</label>
            <input type="text" class="form-control" id="bg" name="bg" value="{{ old('bg', $shipment->bg) }}">
        </div>

        <div class="form-group">
            <label for="sv">SURVEYOR</label>
            <select class="form-control" id="sv" name="sv" required>
                <option value="">Pilih SURVEYOR</option>
                @foreach($surveyors as $surveyor)
                <option value="{{ $surveyor->name }}" {{ old('sv', $shipment->sv) == $surveyor->name ? 'selected' : '' }}>{{ $surveyor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="date-inputs">
            <div class="form-group">
                <label for="arrival_date">Commance</label>
                <input type="date" class="form-control" id="arrival_date" name="arrival_date" value="{{ old('arrival_date', $shipment->arrival_date) }}" required>
            </div>

            <div class="form-group">
                <label for="departure_date">Completed</label>
                <input type="date" class="form-control" id="departure_date" name="departure_date" value="{{ old('departure_date', $shipment->departure_date) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="tg">B/L</label>
            <input type="text" class="form-control" id="tg" name="tg" value="{{ old('tg', $shipment->tg) }}" required readonly>
        </div>

        <div class="form-group">
            <label for="gar">GAR</label>
            <select class="form-control" id="gar" name="gar" required>
                <option value="3400" {{ old('gar', $shipment->gar) == '3400' ? 'selected' : '' }}>3400</option>
                <option value="3800" {{ old('gar', $shipment->gar) == '3800' ? 'selected' : '' }}>3800</option>
                <option value="4200" {{ old('gar', $shipment->gar) == '4200' ? 'selected' : '' }}>4200</option>
                <option value="5600" {{ old('gar', $shipment->gar) == '5600' ? 'selected' : '' }}>5600</option>
                <option value="6400" {{ old('gar', $shipment->gar) == '6400' ? 'selected' : '' }}>6400</option>
            </select>
        </div>

        <div class="section-two">
            <div class="form-inline">
                <div class="form-group">
                    <label for="sp">STOWAGE PLAN</label>
                    <input type="text" class="form-control " id="sp" name="sp" value="{{ old('sp', $shipment->sp) }}" required>
                </div>
                <div class="form-group">
                    <label for="fv">FIGURE VESSEL</label>
                    <input type="text" class="form-control " id="fv" name="fv" value="{{ old('fv', $shipment->fv) }}" required>
                </div>
                <div class="form-group">
                    <label for="fd">FINAL DRAFT</label>
                    <input type="text" class="form-control " id="fd" name="fd" value="{{ old('fd', $shipment->fd) }}" required>
                </div>
                <div class="form-group">
                    <label for="bf">BARGE FIGURE</label>
                    <input type="text" class="form-control " id="bf" name="bf" value="{{ old('bf', $shipment->bf) }}" required>
                </div>
                <div class="form-group">
                    <label for="rc">R/C BARGE</label>
                    <input type="text" class="form-control " id="rc" name="rc" value="{{ old('rc', $shipment->rc) }}" required>
                </div>
                <div class="form-group">
                    <label for="ss">SHORTAGE/SURPLUS</label>
                    <input type="text" class="form-control " id="ss" name="ss" value="{{ old('ss', $shipment->ss) }}" required>
                </div>
            </div>
        </div>

        <h2 style="font-size: 25px; text-align: center; position: relative;">
            <span style="background: #fff; padding: 0 10px;"></span>
            <hr style="position: absolute; top: 10%; left: 0; width: 100%; transform: translateY(-50%); border: none; border-top: 2px solid #000;">
        </h2>
        <h2 style="font-size: 25px; text-align: center; ">Cargo</h2>

        <div class="section-two">
            <div class="form-inline">
                <h2 style="font-size: 25px; margin-top: 20px; margin-bottom: 10px;">Block 2</h2>

                <div class="form-group">
                    <label for="Bl1">Block 2-HS</label>
                    <input type="text" class="form-control " id="Bl1" name="Bl1" value="{{ old('Bl1', $shipment->Bl1) }}" oninput="formatNumber(this); calculateTotal();">
                </div>

                <div class="form-group">
                    <label for="pr1">%</label>
                    <input type="text" class="form-control " id="pr1" name="pr1" value="{{ old('pr1', $shipment->pr1) }}" readonly style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc;">
                </div>

                <div class="form-group">
                    <label for="Bl2">Block 2-LS</label>
                    <input type="text" class="form-control " id="Bl2" name="Bl2" value="{{ old('Bl2', $shipment->Bl2) }}" oninput="formatNumber(this); calculateTotal();">
                </div>

                <div class="form-group">
                    <label for="pr2">%</label>
                    <input type="text" class="form-control " id="pr2" name="pr2" value="{{ old('pr2', $shipment->pr2) }}" readonly style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc;">
                </div>

                <div class="form-group">
                    <label for="Bl3">Block 2-HA</label>
                    <input type="text" class="form-control " id="Bl3" name="Bl3" value="{{ old('Bl3', $shipment->Bl3) }}" oninput="formatNumber(this); calculateTotal();">
                </div>

                <div class="form-group">
                    <label for="pr3">%</label>
                    <input type="text" class="form-control " id="pr3" name="pr3" value="{{ old('pr3', $shipment->pr3) }}" readonly style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc;">
                </div>
            </div>
        </div>

        <div class="section-two">
            <div class="form-inline">
                <h2 style="font-size: 25px; margin-top: 20px; margin-bottom: 30px;">Block 3</h2>
                <div class="form-group">
                    <label for="Bl4">Block 3</label>
                    <input type="text" class="form-control " id="Bl4" name="Bl4" value="{{ old('Bl4', $shipment->Bl4) }}" oninput="formatNumber(this); calculateTotal();">
                </div>

                <div class="form-group">
                    <label for="pr4">%</label>
                    <input type="text" class="form-control " id="pr4" name="pr4" value="{{ old('pr4', $shipment->pr4) }}" readonly style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc;">
                </div>

            </div>
        </div>

        <div class="section-two">
            <div class="form-inline">
                <h2 style="font-size: 25px; margin-top: 20px; margin-bottom: 15px;">Block 4</h2>
                <div class="form-group">
                    <label for="Bl5">Block 4</label>
                    <input type="text" class="form-control " id="Bl5" name="Bl5" value="{{ old('Bl5', $shipment->Bl5) }}" oninput="formatNumber(this); calculateTotal();">
                </div>

                <div class="form-group">
                    <label for="pr5">%</label>
                    <input type="text" class="form-control " id="pr5" name="pr5" value="{{ old('pr5', $shipment->pr5) }}" readonly style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc;">
                </div>
            </div>
        </div>

        <h2 style="font-size: 25px; text-align: center; position: relative;">
            <span style="background: #fff; padding: 0 10px;"></span>
            <hr style="position: absolute; top: 50%; left: 0; width: 100%; transform: translateY(-50%); border: none; border-top: 2px solid #000;">
        </h2>

        <div class="form-group">
            <label for="ttl">TOTAL</label>
            <input type="text" class="form-control " id="ttl" name="ttl" value="{{ old('ttl', $shipment->ttl) }}" readonly style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc;">
        </div>
        <div class="section-two">
            <div class="form-inline">
                <div class="form-group">
                    <label for="ssn">SISIPAN</label>
                    <input type="text" class="form-control " id="ssn" name="ssn" value="{{ old('ssn', $shipment->ssn) }}" oninput="formatNumber(this)">
                </div>
                <div class="form-group">
                    <label for="pr6">%</label>
                    <input type="text" class="form-control " id="pr6" name="pr6" value="{{ old('pr6', $shipment->pr6) }}" readonly style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc;">
                </div>
            </div>
        </div>

        <div class="section-two">
            <div class="form-inline">
                <div class="form-group">
                    <label for="inc">INCREASE</label>
                    <input type="text" class="form-control " id="inc" name="inc" value="{{ old('inc', $shipment->inc) }}" oninput="formatNumber(this)">
                </div>
                <div class="form-group">
                    <label for="pr7">%</label>
                    <input type="text" class="form-control" id="pr7" name="pr7" value="{{ old('pr7', $shipment->pr7) }}" readonly style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc;">
                </div>
            </div>
        </div>

        <div style="margin-top: 10px;">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#type').change(function() {
            var type = $(this).val();

            // Mengisi daftar perusahaan sesuai dengan tipe
            var companySelect = $('#company_id');
            companySelect.empty();
            companySelect.append('<option value="">Pilih BUYER</option>');

            if (type) {
                $.ajax({
                    url: "{{ route('shipments.getCompanies') }}",
                    type: 'GET',
                    data: {
                        type: type
                    },
                    dataType: 'json',
                    success: function(companies) {
                        if (companies.error) {
                            console.error(companies.error);
                        } else {
                            $.each(companies, function(index, companyName) {
                                companySelect.append('<option value="' + index + '">' + companyName + '</option>');
                            });

                            // Memilih nilai lama jika ada
                            var selectedCompanyId = "{{ old('company_id', $shipment->company_id) }}";
                            if (selectedCompanyId) {
                                companySelect.val(selectedCompanyId);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Request failed with status: ' + xhr.status + ', Error: ' + error);
                    }
                });
            }
        });

        // Trigger change event to load initial company options based on existing type
        $('#type').trigger('change');

        // Update B/L field based on departure_date
        $('#departure_date').change(function() {
            var selectedDate = $(this).val();
            $('#tg').val(selectedDate);
        });
    });


    function formatNumber(input) {
        // Mengambil nilai input dan menghapus karakter non-angka
        let value = input.value.replace(/[^0-9,]/g, '');

        // Mengganti koma dengan titik jika ada
        value = value.replace(/,/g, '.');

        // Mengformat angka dengan titik ribuan dan koma desimal
        if (value) {
            let parts = value.split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            input.value = parts.join(',');
        } else {
            input.value = '';
        }
    }

    function calculateTotal() {
        // Mendapatkan nilai dari setiap inputan dan mengganti koma dengan titik
        const Bl1 = parseFloat(document.getElementById('Bl1').value.replace(/\./g, '').replace(',', '.')) || 0;
        const Bl2 = parseFloat(document.getElementById('Bl2').value.replace(/\./g, '').replace(',', '.')) || 0;
        const Bl3 = parseFloat(document.getElementById('Bl3').value.replace(/\./g, '').replace(',', '.')) || 0;
        const Bl4 = parseFloat(document.getElementById('Bl4').value.replace(/\./g, '').replace(',', '.')) || 0;
        const Bl5 = parseFloat(document.getElementById('Bl5').value.replace(/\./g, '').replace(',', '.')) || 0;
        const ttl = parseFloat(document.getElementById('ttl').value.replace(/\./g, '').replace(',', '.')) || 0;
        const ssn = parseFloat(document.getElementById('ssn').value.replace(/\./g, '').replace(',', '.')) || 0;
        const inc = parseFloat(document.getElementById('inc').value.replace(/\./g, '').replace(',', '.')) || 0;

        // Menghitung total
        const total = Bl1 + Bl2 + Bl3 + Bl4 + Bl5;

        // Menampilkan hasil perhitungan ke dalam input ttl, mengganti titik dengan koma
        document.getElementById('ttl').value = total.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        // Menghitung nilai pr1 dan menampilkannya
        const pr1 = (total > 0) ? (Bl1 / ttl * 100).toFixed(2) + '%' : '0%';
        document.getElementById('pr1').value = pr1.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        const pr2 = (total > 0) ? (Bl2 / ttl * 100).toFixed(2) + '%' : '0%';
        document.getElementById('pr2').value = pr2.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        const pr3 = (total > 0) ? (Bl3 / total * 100).toFixed(2) + '%' : '0%';
        document.getElementById('pr3').value = pr3.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        const pr4 = (total > 0) ? (Bl4 / total * 100).toFixed(2) + '%' : '0%';
        document.getElementById('pr4').value = pr4.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        const pr5 = (total > 0) ? (Bl5 / total * 100).toFixed(2) + '%' : '0%';
        document.getElementById('pr5').value = pr5.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        const pr6 = (total > 0) ? (ssn / total * 100).toFixed(2) + '%' : '0%';
        document.getElementById('pr6').value = pr6.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        const pr7 = (total > 0) ? (inc / total * 100).toFixed(2) + '%' : '0%';
        document.getElementById('pr7').value = pr7.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });


    }

    // Event listeners untuk memanggil formatNumber dan calculateTotal saat input berubah
    document.getElementById('Bl1').addEventListener('input', function() {
        formatNumber(this);
        calculateTotal();
    });
    document.getElementById('Bl2').addEventListener('input', function() {
        formatNumber(this);
        calculateTotal();
    });
    document.getElementById('Bl3').addEventListener('input', function() {
        formatNumber(this);
        calculateTotal();
    });
    document.getElementById('Bl4').addEventListener('input', function() {
        formatNumber(this);
        calculateTotal();
    });
    document.getElementById('Bl5').addEventListener('input', function() {
        formatNumber(this);
        calculateTotal();
    });

    document.getElementById('ssn').addEventListener('input', function() {
        formatNumber(this);
        calculateTotal();
    });

    document.getElementById('inc').addEventListener('input', function() {
        formatNumber(this);
        calculateTotal();
    });
</script>
@endsection