@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Sas</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sas.update', ['sa' => $sa->id]) }}" method="POST">
            @csrf
            @method('PUT')
        
            <!-- Input Fields -->
            <div class="form-group">
                <label for="mm_70">MM 70</label>
                <input type="text" class="form-control" id="mm_70" name="mm_70" value="{{ old('mm_70', $sa->mm_70) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_50">MM 50</label>
                <input type="text" class="form-control" id="mm_50" name="mm_50" value="{{ old('mm_50', $sa->mm_50) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_50_315">MM 50-315</label>
                <input type="text" class="form-control" id="mm_50_315" name="mm_50_315" value="{{ old('mm_50_315', $sa->mm_50_315) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_315_224">MM 315-224</label>
                <input type="text" class="form-control" id="mm_315_224" name="mm_315_224" value="{{ old('mm_315_224', $sa->mm_315_224) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_315_16">MM 315-16</label>
                <input type="text" class="form-control" id="mm_315_16" name="mm_315_16" value="{{ old('mm_315_16', $sa->mm_315_16) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_224_112">MM 224-112</label>
                <input type="text" class="form-control" id="mm_224_112" name="mm_224_112" value="{{ old('mm_224_112', $sa->mm_224_112) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_112_63">MM 112-63</label>
                <input type="text" class="form-control" id="mm_112_63" name="mm_112_63" value="{{ old('mm_112_63', $sa->mm_112_63) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_8">MM 8</label>
                <input type="text" class="form-control" id="mm_8" name="mm_8" value="{{ old('mm_8', $sa->mm_8) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_164_75">MM 164-75</label>
                <input type="text" class="form-control" id="mm_164_75" name="mm_164_75" value="{{ old('mm_164_75', $sa->mm_164_75) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_63_475">MM 63-475</label>
                <input type="text" class="form-control" id="mm_63_475" name="mm_63_475" value="{{ old('mm_63_475', $sa->mm_63_475) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_475_2">MM 475-2</label>
                <input type="text" class="form-control" id="mm_475_2" name="mm_475_2" value="{{ old('mm_475_2', $sa->mm_475_2) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_2_1">MM 2-1</label>
                <input type="text" class="form-control" id="mm_2_1" name="mm_2_1" value="{{ old('mm_2_1', $sa->mm_2_1) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_1_05">MM 1-0.5</label>
                <input type="text" class="form-control" id="mm_1_05" name="mm_1_05" value="{{ old('mm_1_05', $sa->mm_1_05) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_05">MM 0.5</label>
                <input type="text" class="form-control" id="mm_05" name="mm_05" value="{{ old('mm_05', $sa->mm_05) }}" required>
            </div>
        
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" class="form-control" id="total" name="total" value="{{ old('total', $sa->total) }}" required>
            </div>
        
            <div class="form-group">
                <label for="size1">Size 1</label>
                <input type="text" class="form-control" id="size1" name="size1" value="{{ old('size1', $sa->size1) }}" required>
            </div>
        
            <div class="form-group">
                <label for="size2">Size 2</label>
                <input type="text" class="form-control" id="size2" name="size2" value="{{ old('size2', $sa->size2) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_050_persen">MM 0.50 (%)</label>
                <input type="text" class="form-control" id="mm_050_persen" name="mm_050_persen" value="{{ old('mm_050_persen', $sa->mm_050_persen) }}" required>
            </div>
        
            <div class="form-group">
                <label for="mm_070_persen">MM 0.70 (%)</label>
                <input type="text" class="form-control" id="mm_070_persen" name="mm_070_persen" value="{{ old('mm_070_persen', $sa->mm_070_persen) }}" required>
            </div>
        
            <button type="submit" class="btn mt-2 btn-primary">Simpan Perubahan</button>
        </form>
        
    </div>
@endsection
