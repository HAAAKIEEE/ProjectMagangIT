@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Ash Analysis</h1>
    <form action="{{ route('ashanls.update', $ashanls->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Method PUT digunakan untuk update data --}}
        <style>
            .form-group {
                margin-bottom: 15px;
            }

            .form-control {
                width: 100%;
            }

            .btn {
                margin-top: 10px;
            }

            .form-row-inline {
                display: flex;
                gap: 15px;
            }

            .form-row-inline .form-group {
                flex: 1;
            }

            .date-inputs {
                display: flex;
                justify-content: space-between;
            }

            .date-inputs .form-group {
                flex: 1;
                margin-right: 10px;
            }

            .date-inputs .form-group:last-child {
                margin-right: 0;
            }
        </style>

        {{-- Input fields --}}
        <div class="form-group">
            <label for="cal">Cal/g</label>
            <input type="number" class="form-control" id="cal" name="cal" value="{{ old('cal', $ashanls->cal) }}" placeholder="Masukkan cal/g" required>
        </div>
        <div class="form-group">
            <label for="si">SiO2</label>
            <input type="number" class="form-control" id="si" name="si" value="{{ old('si', $ashanls->si) }}" placeholder="Masukkan SiO2" step="any" required oninput="calculateValues()">
        </div>
        <div class="form-group">
            <label for="ai">Ai2O3</label>
            <input type="number" class="form-control" id="ai" name="ai" value="{{ old('ai', $ashanls->ai) }}" placeholder="Masukkan Ai2O3" step="any" required oninput="calculateValues()">
        </div>

        <div class="form-row-inline">
            <div class="form-group">
                <label for="fe">Fe2O3</label>
                <input type="number" class="form-control" id="fe" name="fe" value="{{ old('fe', $ashanls->fe) }}" placeholder="Masukkan Fe2O3" step="any" required oninput="calculateValues()">
            </div>
            <div class="form-group">
                <label for="ca">CaO</label>
                <input type="number" class="form-control" id="ca" name="ca" value="{{ old('ca', $ashanls->ca) }}" placeholder="Masukkan CaO (%)" step="any" required oninput="calculateValues()">
            </div>
        </div>

        <div class="form-group">
            <label for="mg">MgO</label>
            <input type="number" class="form-control" id="mg" name="mg" value="{{ old('mg', $ashanls->mg) }}" placeholder="Masukkan MgO" step="any" required oninput="calculateValues()">
        </div>

        <div class="form-group">
            <label for="na">Na2O</label>
            <input type="number" class="form-control" id="na" name="na" value="{{ old('na', $ashanls->na) }}" placeholder="Masukkan Na2O" step="any" required oninput="calculateValues()">
        </div>

        <div class="form-group">
            <label for="k2">K2O</label>
            <input type="number" class="form-control" id="k2" name="k2" value="{{ old('k2', $ashanls->k2) }}" placeholder="Masukkan K2O" step="any" required oninput="calculateValues()">
        </div>

        <div class="form-group">
            <label for="ti">TiO2</label>
            <input type="number" class="form-control" id="ti" name="ti" value="{{ old('ti', $ashanls->ti) }}" placeholder="Masukkan TiO2" required oninput="calculateValues()">
        </div>

        <h2>CV</h2>
        <div class="form-row-inline">
            <div class="form-group">
                <label for="so">SO3</label>
                <input type="number" class="form-control" id="so" name="so" value="{{ old('so', $ashanls->so) }}" placeholder="Masukkan SO3" step="any" required oninput="calculateValues()">
            </div>
            <div class="form-group">
                <label for="mn">Mn3O4</label>
                <input type="number" class="form-control" id="mn" name="mn" value="{{ old('mn', $ashanls->mn) }}" placeholder="Masukkan Mn3O4" step="any" required oninput="calculateValues()">
            </div>
            <div class="form-group">
                <label for="p2">P2O5</label>
                <input type="number" class="form-control" id="p2" name="p2" value="{{ old('p2', $ashanls->p2) }}" placeholder="Masukkan P2O5" step="any" required oninput="calculateValues()">
            </div>
            <div class="form-group">
                <label for="un">Und.</label>
                <input type="text" class="form-control" id="un" name="un" value="{{ old('un', $ashanls->un) }}" placeholder="Und." required readonly>
            </div>
            <div class="form-group">
                <label for="fofa">Fouling Factor</label>
                <input type="text" class="form-control" id="fofa" name="fofa" value="{{ old('fofa', $ashanls->fofa) }}" placeholder="Fouling Factor" readonly>
            </div>
            <div class="form-group">
                <label for="slafa">Slagging Factor</label>
                <input type="text" class="form-control" id="slafa" name="slafa" value="{{ old('slafa', $ashanls->slafa) }}" placeholder="Slagging Factor" required>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            function calculateValues() {
                // Sama seperti pada create.blade.php
                const si = parseFloat(document.getElementById('si').value) || 0;
                const ai = parseFloat(document.getElementById('ai').value) || 0;
                const fe = parseFloat(document.getElementById('fe').value) || 0;
                const ca = parseFloat(document.getElementById('ca').value) || 0;
                const mg = parseFloat(document.getElementById('mg').value) || 0;
                const na = parseFloat(document.getElementById('na').value) || 0;
                const k2 = parseFloat(document.getElementById('k2').value) || 0;
                const ti = parseFloat(document.getElementById('ti').value) || 0;
                const so = parseFloat(document.getElementById('so').value) || 0;
                const mn = parseFloat(document.getElementById('mn').value) || 0;
                const p2 = parseFloat(document.getElementById('p2').value) || 0;
                const ts2 = parseFloat(localStorage.getItem('ts2Value')) || 0;

                const countUN = [si, ai, fe, ca, mg, na, k2, ti, so, mn, p2].filter(value => value !== 0).length;
                let unValue = "-";
                if (countUN >= 11) {
                    unValue = (si + ai + fe + ca + mg + na + k2 + ti + so + mn + p2) - 100;
                }
                document.getElementById('un').value = unValue;

                const countFOFA = [si, ai, fe, ca, mg, na, k2, ti].filter(value => value !== 0).length;
                let fofaValue = "0";
                if (countFOFA >= 8) {
                    const sumFeToK2 = fe + ca + mg + na + k2;
                    const sumSiAiTi = si + ai + ti;
                    fofaValue = sumFeToK2 / sumSiAiTi;
                }
                document.getElementById('fofa').value = fofaValue;

                const countSLAFA = [si, ai, fe, ca, mg, na, k2, ti, ts2].filter(value => value !== 0).length;
                let slafaValue = "0";
                if (countSLAFA >= 9) {
                    slafaValue = ((si + ai) / (ca + mg + fe)) * ((ca + mg + fe) / (na + k2 + ts2));
                }
                document.getElementById('slafa').value = slafaValue;
            }

            calculateValues();
        });
    </script>
</div>
@endsection
