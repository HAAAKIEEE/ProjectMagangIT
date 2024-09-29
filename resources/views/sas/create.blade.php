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

    <form action="{{route('sa_store')}}" method="POST">
        @csrf
        <input type="hidden" name="shipment_id" value="{{ old('shipment_id', $shipment->id) }}">
        <input type="hidden" name="activity_id" value="{{ old('activity_id', $activity->id) }}">  

            '70_mm' => 'required|string|max:255',
            '50_mm' => 'required|string|max:255',
            '50_315_mm' => 'required|string|max:255',
            '315_224_mm' => 'nullable|string|max:255',
            '315_16_mm' => 'required|string|max:255',
            '224_112_mm' => 'required|string|max:255',
            '112_63_mm' => 'required|string|max:255',
            '8_mm' => 'nullable|string|max:255',
            '164_75_mm' => 'nullable|string|max:255',
            '63_475_mm' => 'required|string|max:255',
            '475_2_mm' => 'required|string|max:255',
            '2_1_mm' => 'required|string|max:255',
            '1_05_mm' => 'nullable|string|max:255',
            '05_mm' => 'nullable|string|max:255',
            'total' => 'required|string|max:255',
            'size1' => 'required|string|max:255',
            'size2' => 'required|string|max:255',
            '050_mm_persen' => 'nullable|string|max:255',
            '070_mm_persen' => 'nullable|string|max:255',

        <div class="form-group">
            <label for="70_mm">M</label>
            <input type="number" name="70_mm" class="form-control" id="70_mm" value="{{ old('70_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="50_mm">AC</label>
            <input type="number" name="50_mm" class="form-control" id="50_mm" value="{{ old('50_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="50_315_mm">C:</label>
            <input type="number" name="50_315_mm" class="form-control" id="50_315_mm" value="{{ old('50_315_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="315_224_mm">H</label>
            <input type="number" name="315_224_mm" class="form-control" id="315_224_mm" value="{{ old('315_224_mm') }}" required>
        </div>

        <div class="form-group">
            <label for="315_16_mm">N</label>
            <input type="number" name="315_16_mm" class="form-control" id="315_16_mm" value="{{ old('315_16_mm') }}" required>
        </div>
        <div class="form-group">
            <label for="224_112_mm">S</label>
            <input type="number" name="224_112_mm" class="form-control" id="224_112_mm" value="{{ old('224_112_mm') }}" required>
        </div>
        <div class="form-group">
            <label for="112_63_mm">O</label>
            <input type="number" name="112_63_mm" class="form-control" id="112_63_mm" value="{{ old('112_63_mm') }}" required>
        </div>
        <div class="form-group">
            <label for="8_mm">Index</label>
            <input type="number" name="8_mm" class="form-control" id="8_mm" value="{{ old('8_mm') }}" required>
        </div>
        <div class="form-group">
            <label for="164_75_mm">%</label>
            <input type="number" name="164_75_mm" class="form-control" id="164_75_mm" value="{{ old('164_75_mm') }}" required>
        </div>
        <div class="form-group">
            <label for="63_475_mm">%</label>
            <input type="number" name="63_475_mm" class="form-control" id="63_475_mm" value="{{ old('63_475_mm') }}" required>
        </div>
        <div class="form-group">
            <label for="475_2_mm">%</label>
            <input type="number" name="475_2_mm" class="form-control" id="475_2_mm" value="{{ old('475_2_mm') }}" required>
        </div>
        <div class="form-group">
            <label for="2_1_mm">%</label>
            <input type="number" name="2_1_mm" class="form-control" id="2_1_mm" value="{{ old('2_1_mm') }}" required>
        </div>
        <div class="form-group">
            <label for="1_05_mm">%</label>
            <input type="number" name="1_05_mm" class="form-control" id="1_05_mm" value="{{ old('1_05_mm') }}" required>
        </div>
        <div class="form-group">
            <label for="05_mm">%</label>
            <input type="number" name="05_mm" class="form-control" id="05_mm" value="{{ old('05_mm') }}" required>
        </div>
        <div class="form-group">
            <label for="total">%</label>
            <input type="number" name="total" class="form-control" id="total" value="{{ old('total') }}" required>
        </div>
        <div class="form-group">
            <label for="size1">%</label>
            <input type="number" name="size1" class="form-control" id="size1" value="{{ old('size1') }}" required>
        </div>
        <div class="form-group">
            <label for="size2">%</label>
            <input type="number" name="size2" class="form-control" id="size2" value="{{ old('size2') }}" required>
        </div>
        <div class="form-group">
            <label for="050_mm_persen">%</label>
            <input type="number" name="050_mm_persen" class="form-control" id="050_mm_persen" value="{{ old('050_mm_persen') }}" required>
        </div>
        <div class="form-group">
            <label for="070_mm_persen">%</label>
            <input type="number" name="070_mm_persen" class="form-control" id="070_mm_persen" value="{{ old('070_mm_persen') }}" required>
        </div>
        <button type="submit" class="btn mt-2 btn-primary">Simpan</button>
    </form>
</div>
@endsection