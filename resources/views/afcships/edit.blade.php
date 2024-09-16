@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Trace Element Major</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('afcship.update', $afcship->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Gunakan metode PUT untuk edit -->

        <input type="hidden" name="shipment_id" value="{{ old('shipment_id', $afcship->shipment_id) }}">
        <input type="hidden" name="activity_id" value="{{ old('activity_id', $afcship->activity_id) }}">     

        <div class="form-group">
            <label for="vm_pct">VM, pct</label>
            <input type="number" name="vm_pct" class="form-control" id="vm_pct" value="{{ old('vm_pct', $afcship->vm_pct) }}" required>
        </div>

        <div class="form-group">
            <label for="cv_cg">CV, c/g</label>
            <input type="number" name="cv_cg" class="form-control" id="cv_cg" value="{{ old('cv_cg', $afcship->cv_cg) }}" required>
        </div>

        <div class="form-group">
            <label for="pm">PM</label>
            <input type="number" name="pm" class="form-control" id="pm" value="{{ old('pm', $afcship->pm) }}" required>
        </div>

        <div class="form-group">
            <label for="radioactiv">Radioactive</label>
            <input type="number" name="radioactiv" class="form-control" id="radioactiv" value="{{ old('radioactiv', $afcship->radioactiv) }}" required>
        </div>

        <button type="submit" class="btn mt-2 btn-primary">Update</button>
    </form>
</div>
@endsection
