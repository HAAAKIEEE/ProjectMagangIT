@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Certificate Of Analysis</h1>
    <form action="{{ route('coas.update', $coa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <style>
            /* Sama seperti di create.blade.php */
        </style>

        <div class="form-group">
            <label for="number">COA NUMBER</label>
            <input type="text" class="form-control" id="number" name="number" value="{{ old('number', $coa->number) }}" required>
        </div>
        <div class="form-group">
            <label for="tm2">TM</label>
            <input type="number" class="form-control" id="tm2" name="tm2" value="{{ old('tm2', $coa->tm2) }}" step="any" required>
        </div>
        <div class="form-group">
            <label for="im2">IM</label>
            <input type="number" class="form-control" id="im2" name="im2" value="{{ old('im2', $coa->im2) }}" step="any" required>
        </div>

        <div class="form-row-inline">
            <div class="form-group">
                <label for="ash1">ASH (%adb)</label>
                <input type="number" class="form-control" id="ash1" name="ash1" value="{{ old('ash1', $coa->ash1) }}" step="any" required>
            </div>
            <div class="form-group">
                <label for="ash3">ASH (%db)</label>
                <input type="text" class="form-control" id="ash3" name="ash3" value="{{ old('ash3', $coa->ash3) }}" required readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="vm2">VM</label>
            <input type="number" class="form-control" id="vm2" name="vm2" value="{{ old('vm2', $coa->vm2) }}" step="any">
        </div>

        <div class="form-group">
            <label for="fc2">FC</label>
            <input type="text" class="form-control" id="fc2" name="fc2" value="{{ old('fc2', $coa->fc2) }}" required readonly>
        </div>

        <div class="form-group">
            <label for="ts3">TS (%adb)</label>
            <input type="number" class="form-control" id="ts3" name="ts3" value="{{ old('ts3', $coa->ts3) }}" step="any" required>
        </div>

        <div class="form-group">
            <label for="ts2">TS (%db)</label>
            <input type="text" class="form-control" id="ts2" name="ts2" value="{{ old('ts2', $coa->ts2) }}" required readonly>
        </div>

        <h2>CV</h2>
        <div class="form-row-inline">
            <div class="form-group">
                <label for="adb">ADB</label>
                <input type="number" class="form-control" id="adb" name="adb" value="{{ old('adb', $coa->adb) }}" step="any" required>
            </div>
            <div class="form-group">
                <label for="arb">ARB</label>
                <input type="text" class="form-control" id="arb" name="arb" value="{{ old('arb', $coa->arb) }}" required readonly>
            </div>
            <div class="form-group">
                <label for="daf">DAF</label>
                <input type="text" class="form-control" id="daf" name="daf" value="{{ old('daf', $coa->daf) }}" required readonly>
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menggunakan script dari create.blade.php untuk menghitung ulang nilai
        const ash1Input = document.getElementById('ash1');
        const im2Input = document.getElementById('im2');
        const vm2Input = document.getElementById('vm2');
        const ash3Input = document.getElementById('ash3');
        const fc2Input = document.getElementById('fc2');
        const ts3Input = document.getElementById('ts3');
        const ts2Input = document.getElementById('ts2');
        const adbInput = document.getElementById('adb');
        const arbInput = document.getElementById('arb');
        const dafInput = document.getElementById('daf');
        const tm2Input = document.getElementById('tm2');

        function calculateAsh3() {
            const ash1 = parseFloat(ash1Input.value) || 0;
            const im2 = parseFloat(im2Input.value) || 0;
            const ash3 = (100 / (100 - im2)) * ash1;
            ash3Input.value = isNaN(ash3) ? '' : ash3.toFixed(2);
        }

        function calculateFc2() {
            const im2 = parseFloat(im2Input.value) || 0;
            const ash1 = parseFloat(ash1Input.value) || 0;
            const vm2 = parseFloat(vm2Input.value) || 0;
            const fc2 = 100 - (im2 + ash1 + vm2);
            fc2Input.value = isNaN(fc2) ? '' : fc2.toFixed(2);
        }

        function calculateTs2() {
            const ts3 = parseFloat(ts3Input.value) || 0;
            const im2 = parseFloat(im2Input.value) || 0;
            const ts2 = (ts3 * 100) / (100 - im2);
            ts2Input.value = isNaN(ts2) ? '' : ts2.toFixed(2);
        }

        function calculateArb() {
            const tm2 = parseFloat(tm2Input.value) || 0;
            const im2 = parseFloat(im2Input.value) || 0;
            const adb = parseFloat(adbInput.value) || 0;
            const arb = ((100 - tm2) / (100 - im2)) * adb;
            arbInput.value = isNaN(arb) ? '' : arb.toFixed(2);
        }

        function calculateDaf() {
            const adb = parseFloat(adbInput.value) || 0;
            const im2 = parseFloat(im2Input.value) || 0;
            const ash1 = parseFloat(ash1Input.value) || 0;
            const daf = (100 / (100 - im2 - ash1)) * adb;
            dafInput.value = isNaN(daf) ? '' : daf.toFixed(2);
        }

        ash1Input.addEventListener('input', function() {
            calculateAsh3();
            calculateFc2();
            calculateDaf();
        });
        im2Input.addEventListener('input', function() {
            calculateAsh3();
            calculateFc2();
            calculateTs2();
            calculateArb();
            calculateDaf();
        });
        vm2Input.addEventListener('input', calculateFc2);
        ts3Input.addEventListener('input', function() {
            calculateTs2();
            calculateArb();
        });
        adbInput.addEventListener('input', function() {
            calculateDaf();
            calculateArb();
        });
        tm2Input.addEventListener('input', calculateArb);
    });

    function validateNumber(input) {
        // Mengganti koma dengan titik jika ada
        input.value = input.value.replace(',', '.');

        // Memastikan nilai adalah angka
        const regex = /^[0-9]*\.?[0-9]*$/;
        if (!regex.test(input.value)) {
            input.value = '';
        }
    }
</script>
@endsection
@endsection
