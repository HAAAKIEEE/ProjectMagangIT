@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Additional for Chinese shipment</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('afcship_store')}}" method="POST">
        @csrf
        <input type="hidden" name="shipment_id" value="{{ old('shipment_id', $shipment->id) }}">
        <input type="hidden" name="activity_id" value="{{ old('activity_id', $activity->id) }}">     
        <div class="form-group">
            <label for="vm_pct">VM, pct</label>
            <input type="number" name="vm_pct" class="form-control" id="vm_pct" value="{{ old('vm_pct') }}" required>
        </div>

        <div class="form-group">
            <label for="cv_cg">CV, c/g</label>
            <input type="number" name="cv_cg" class="form-control" id="cv_cg" value="{{ old('cv_cg') }}" required>
        </div>

        <div class="form-group">
            <label for="pm">PM:</label>
            <input type="number" name="pm" class="form-control" id="pm" value="{{ old('pm') }}" required>
        </div>

        <div class="form-group">
            <label for="radioactiv">Radioactive</label>
            <input type="number" name="radioactiv" class="form-control" id="radioactiv" value="{{ old('radioactiv') }}" required>
        </div>
        <button type="submit" class="btn mt-2 btn-primary">Simpan</button>
    </form>
</div>
@endsection