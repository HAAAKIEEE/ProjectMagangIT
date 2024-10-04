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
            <label for="mm_70">MM 70</label>
            <input type="text" class="form-control" id="mm_70" name="mm_70" placeholder="Masukkan MM 70" value="{{ old('mm_70') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_50">MM 50</label>
            <input type="text" class="form-control" id="mm_50" name="mm_50" placeholder="Masukkan MM 50" value="{{ old('mm_50') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_50_315">MM 50-315</label>
            <input type="text" class="form-control" id="mm_50_315" name="mm_50_315" placeholder="Masukkan MM 50-315" value="{{ old('mm_50_315') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_315_224">MM 315-224</label>
            <input type="text" class="form-control" id="mm_315_224" name="mm_315_224" placeholder="Masukkan MM 315-224" value="{{ old('mm_315_224') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_315_16">MM 315-16</label>
            <input type="text" class="form-control" id="mm_315_16" name="mm_315_16" placeholder="Masukkan MM 315-16" value="{{ old('mm_315_16') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_224_112">MM 224-112</label>
            <input type="text" class="form-control" id="mm_224_112" name="mm_224_112" placeholder="Masukkan MM 224-112" value="{{ old('mm_224_112') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_112_63">MM 112-63</label>
            <input type="text" class="form-control" id="mm_112_63" name="mm_112_63" placeholder="Masukkan MM 112-63" value="{{ old('mm_112_63') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_8">MM 8</label>
            <input type="text" class="form-control" id="mm_8" name="mm_8" placeholder="Masukkan MM 8" value="{{ old('mm_8') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_164_75">MM 164-75</label>
            <input type="text" class="form-control" id="mm_164_75" name="mm_164_75" placeholder="Masukkan MM 164-75" value="{{ old('mm_164_75') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_63_475">MM 63-475</label>
            <input type="text" class="form-control" id="mm_63_475" name="mm_63_475" placeholder="Masukkan MM 63-475" value="{{ old('mm_63_475') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_475_2">MM 475-2</label>
            <input type="text" class="form-control" id="mm_475_2" name="mm_475_2" placeholder="Masukkan MM 475-2" value="{{ old('mm_475_2') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_2_1">MM 2-1</label>
            <input type="text" class="form-control" id="mm_2_1" name="mm_2_1" placeholder="Masukkan MM 2-1" value="{{ old('mm_2_1') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_1_05">MM 1-0.5</label>
            <input type="text" class="form-control" id="mm_1_05" name="mm_1_05" placeholder="Masukkan MM 1-0.5" value="{{ old('mm_1_05') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_05">MM 0.5</label>
            <input type="text" class="form-control" id="mm_05" name="mm_05" placeholder="Masukkan MM 0.5" value="{{ old('mm_05') }}" required>
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
            <label for="mm_050_persen">0.50 mm (%)</label>
            <input type="text" class="form-control" id="mm_050_persen" name="mm_050_persen" placeholder="Masukkan 0.50 mm (%)" value="{{ old('mm_050_persen') }}" required>
        </div>
        
        <div class="form-group">
            <label for="mm_070_persen">0.70 mm (%)</label>
            <input type="text" class="form-control" id="mm_070_persen" name="mm_070_persen" placeholder="Masukkan 0.70 mm (%)" value="{{ old('mm_070_persen') }}" required>
        </div>

        <button type="submit" class="btn mt-2 btn-primary">Simpan</button>
    </form>
</div>
@endsection
