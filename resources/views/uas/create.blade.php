@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Ultimate Analysis (adb)</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- <p>{{ $shipment->id }}</p>
    <p>{{ $activity->id }}</p>
    <p>{{ $coa }}</p> --}}

    <form action="{{ route('ua_store') }}" method="POST">
        @csrf
        <input type="hidden" name="shipment_id" value="{{ old('shipment_id', $shipment->id) }}">
        <input type="hidden" name="activity_id" value="{{ old('activity_id', $activity->id) }}">

        <div class="form-group">
            <label for="m">M</label>
            <input type="text" class="form-control" id="m" name="m" value="{{ $coa->im2 }}" placeholder="M diambil dari COA" readonly>
        </div>
        
        <div class="form-group">
            <label for="ac">AC</label>
            <input type="text" class="form-control" id="ac" name="ac" value="{{ $coa->ash3 }}" placeholder="Masukkan AC" readonly>
        </div>
        <div class="form-group">
            <label for="c">C</label>
            <input type="text" class="form-control" id="c" name="c" placeholder="Masukkan C" required oninput="calculateO()">
        </div>
        <div class="form-group">
            <label for="h">H</label>
            <input type="text" class="form-control" id="h" name="h" placeholder="Masukkan H" required oninput="calculateO()">
        </div>
        <div class="form-group">
            <label for="n">N</label>
            <input type="text" class="form-control" id="n" name="n" placeholder="Masukkan N" required oninput="calculateO()">
        </div>
        <div class="form-group">
            <label for="s">S</label>
            <input type="text" class="form-control" id="s" name="s" value="{{ $coa->ash3 }}" placeholder="Masukkan AC" readonly>
        </div>
        <div class="form-group">
            <label for="o">O</label>
            <input type="text" class="form-control" id="o" name="o" placeholder="Masukkan O" required readonly>
        </div>
        <div class="form-group">
            <label for="index">INDEX</label>
            <input type="text" class="form-control" id="index" name="index" placeholder="Masukkan Index" required>
        </div>
        <div class="form-group">
            <label for="persen">PERSEN</label>
            <input type="text" class="form-control" id="persen" name="persen" placeholder="Masukkan persen" required>
        </div>
        <button type="submit" class="btn mt-2 btn-primary">Simpan</button>
    </form>
</div>

<script>
    function calculateO() {
        // Ambil nilai input
        const m = parseFloat(document.getElementById('m').value) || 0;
        const c = parseFloat(document.getElementById('c').value) || 0;
        const h = parseFloat(document.getElementById('h').value) || 0;
        const n = parseFloat(document.getElementById('n').value) || 0;
        const s = parseFloat(document.getElementById('s').value) || 0;

        // Formula O = 100 - (M + C + H + N + S) jika ada nilai > 0
        let total = m + c + h + n + s;

        // Jika ada nilai C sampai S yang lebih besar dari 0
        if (c > 0 || h > 0 || n > 0 || s > 0) {
            document.getElementById('o').value = 100 - total;
        } else {
            document.getElementById('o').value = 0; // Jika semua bernilai 0
        }
    }
</script>
@endsection
