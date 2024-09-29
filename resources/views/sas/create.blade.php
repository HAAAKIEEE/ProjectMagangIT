@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Sas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('sa_store', ['activity' => $activity->id, 'shipment' => $shipment->id])}}" method="POST">
        @csrf
        <input type="hidden" name="shipment_id" value="{{ old('shipment_id', $shipment->id) }}">
        <input type="hidden" name="activity_id" value="{{ old('activity_id', $activity->id) }}">

        <!-- Input Fields -->
        <div class="form-group">
            <label for="70_mm">70 mm</label>
            <input type="number" name="70_mm" class="form-control" id="70_mm" value="{{ old('70_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="50_mm">50 mm</label>
            <input type="number" name="50_mm" class="form-control" id="50_mm" value="{{ old('50_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="50_315_mm">50-315 mm</label>
            <input type="number" name="50_315_mm" class="form-control" id="50_315_mm" value="{{ old('50_315_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="315_224_mm">315-224 mm</label>
            <input type="number" name="315_224_mm" class="form-control" id="315_224_mm" value="{{ old('315_224_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="315_16_mm">315-16 mm</label>
            <input type="number" name="315_16_mm" class="form-control" id="315_16_mm" value="{{ old('315_16_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="224_112_mm">224-112 mm</label>
            <input type="number" name="224_112_mm" class="form-control" id="224_112_mm" value="{{ old('224_112_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="112_63_mm">112-63 mm</label>
            <input type="number" name="112_63_mm" class="form-control" id="112_63_mm" value="{{ old('112_63_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="8_mm">8 mm</label>
            <input type="number" name="8_mm" class="form-control" id="8_mm" value="{{ old('8_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="164_75_mm">164-75 mm</label>
            <input type="number" name="164_75_mm" class="form-control" id="164_75_mm" value="{{ old('164_75_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="63_475_mm">63-475 mm</label>
            <input type="number" name="63_475_mm" class="form-control" id="63_475_mm" value="{{ old('63_475_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="475_2_mm">475-2 mm</label>
            <input type="number" name="475_2_mm" class="form-control" id="475_2_mm" value="{{ old('475_2_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="2_1_mm">2-1 mm</label>
            <input type="number" name="2_1_mm" class="form-control" id="2_1_mm" value="{{ old('2_1_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="1_05_mm">1-0.5 mm</label>
            <input type="number" name="1_05_mm" class="form-control" id="1_05_mm" value="{{ old('1_05_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="05_mm">0.5 mm</label>
            <input type="number" name="05_mm" class="form-control" id="05_mm" value="{{ old('05_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" class="form-control" id="total" value="{{ old('total') }}" required>
        </div>

        <div class="form-group">
            <label for="size1">Size 1</label>
            <input type="number" name="size1" class="form-control" id="size1" value="{{ old('size1') }}" required>
        </div>

        <div class="form-group">
            <label for="size2">Size 2</label>
            <input type="number" name="size2" class="form-control" id="size2" value="{{ old('size2') }}" required>
        </div>

        <div class="form-group">
            <label for="050_mm_persen">0.50 mm (%)</label>
            <input type="number" name="050_mm_persen" class="form-control" id="050_mm_persen" value="{{ old('050_mm_persen') }}" required>
        </div>

        <div class="form-group">
            <label for="070_mm_persen">0.70 mm (%)</label>
            <input type="number" name="070_mm_persen" class="form-control" id="070_mm_persen" value="{{ old('070_mm_persen') }}" required>
        </div>

        <button type="submit" class="btn mt-2 btn-primary">Simpan</button>
    </form>
</div>
@endsection
