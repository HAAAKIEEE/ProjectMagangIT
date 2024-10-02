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
            <input type="text" class="form-control" id="70_mm" name="70_mm" placeholder="Masukkan 70 mm" value="{{ old('70_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="50_mm">50 mm</label>
            <input type="text" class="form-control" id="50_mm" name="50_mm" placeholder="Masukkan 50 mm" value="{{ old('50_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="50_315_mm">50-315 mm</label>
            <input type="text" class="form-control" id="50_315_mm" name="50_315_mm" placeholder="Masukkan 50-315 mm" value="{{ old('50_315_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="315_224_mm">315-224 mm</label>
            <input type="text" class="form-control" id="315_224_mm" name="315_224_mm" placeholder="Masukkan 315-224 mm" value="{{ old('315_224_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="315_16_mm">315-16 mm</label>
            <input type="text" class="form-control" id="315_16_mm" name="315_16_mm" placeholder="Masukkan 315-16 mm" value="{{ old('315_16_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="224_112_mm">224-112 mm</label>
            <input type="text" class="form-control" id="224_112_mm" name="224_112_mm" placeholder="Masukkan 224-112 mm" value="{{ old('224_112_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="112_63_mm">112-63 mm</label>
            <input type="text" class="form-control" id="112_63_mm" name="112_63_mm" placeholder="Masukkan 112-63 mm" value="{{ old('112_63_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="8_mm">8 mm</label>
            <input type="text" class="form-control" id="8_mm" name="8_mm" placeholder="Masukkan 8 mm" value="{{ old('8_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="164_75_mm">164-75 mm</label>
            <input type="text" class="form-control" id="164_75_mm" name="164_75_mm" placeholder="Masukkan 164-75 mm" value="{{ old('164_75_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="63_475_mm">63-475 mm</label>
            <input type="text" class="form-control" id="63_475_mm" name="63_475_mm" placeholder="Masukkan 63-475 mm" value="{{ old('63_475_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="475_2_mm">475-2 mm</label>
            <input type="text" class="form-control" id="475_2_mm" name="475_2_mm" placeholder="Masukkan 475-2 mm" value="{{ old('475_2_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="2_1_mm">2-1 mm</label>
            <input type="text" class="form-control" id="2_1_mm" name="2_1_mm" placeholder="Masukkan 2-1 mm" value="{{ old('2_1_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="1_05_mm">1-0.5 mm</label>
            <input type="text" class="form-control" id="1_05_mm" name="1_05_mm" placeholder="Masukkan 1-0.5 mm" value="{{ old('1_05_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="05_mm">0.5 mm</label>
            <input type="text" class="form-control" id="05_mm" name="05_mm" placeholder="Masukkan 0.5 mm" value="{{ old('05_mm') }}" required>
        </div>
        
        <div class="form-group">
            <label for="total">Total</label>
            <input type="text" class="form-control" id="total" name="total" placeholder="Masukkan Total" value="{{ old('total') }}" required>
        </div>
        
        <div class="form-group">
            <label for="size1">Size 1</label>
            <input type="text" class="form-control" id="size1" name="size1" placeholder="Masukkan Size 1" value="{{ old('size1') }}" required>
        </div>
        
        <div class="form-group">
            <label for="size2">Size 2</label>
            <input type="text" class="form-control" id="size2" name="size2" placeholder="Masukkan Size 2" value="{{ old('size2') }}" required>
        </div>
        
        <div class="form-group">
            <label for="050_mm_persen">0.50 mm (%)</label>
            <input type="text" class="form-control" id="050_mm_persen" name="050_mm_persen" placeholder="Masukkan 0.50 mm (%)" value="{{ old('050_mm_persen') }}" required>
        </div>
        
        <div class="form-group">
            <label for="070_mm_persen">0.70 mm (%)</label>
            <input type="text" class="form-control" id="070_mm_persen" name="070_mm_persen" placeholder="Masukkan 0.70 mm (%)" value="{{ old('070_mm_persen') }}" required>
        </div>
        <button type="submit" class="btn mt-2 btn-primary">Simpan</button>
    </form>
</div>
@endsection