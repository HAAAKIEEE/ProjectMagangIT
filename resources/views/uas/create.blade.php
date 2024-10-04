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

    <form action="{{route('ua_store')}}" method="POST">
        @csrf
        <input type="hidden" name="shipment_id" value="{{ old('shipment_id', $shipment->id) }}">
        <input type="hidden" name="activity_id" value="{{ old('activity_id', $activity->id) }}">  


        <div class="form-group">
            <label for="m">M</label>
            <input type="text" class="form-control" id="m" name="m" placeholder="Masukkan M" required>
        </div>
        <div class="form-group">
            <label for="ac">AC</label>
            <input type="text" class="form-control" id="ac" name="ac" placeholder="Masukkan AC" required>
        </div>
        <div class="form-group">
            <label for="c">C</label>
            <input type="text" class="form-control" id="c" name="c" placeholder="Masukkan C" required>
        </div>
        <div class="form-group">
            <label for="h">H</label>
            <input type="text" class="form-control" id="h" name="h" placeholder="Masukkan H" required>
        </div>
        <div class="form-group">
            <label for="n">N</label>
            <input type="text" class="form-control" id="n" name="n" placeholder="Masukkan N" required>
        </div>
        <div class="form-group">
            <label for="s">S</label>
            <input type="text" class="form-control" id="s" name="s" placeholder="Masukkan S" required>
        </div>
        <div class="form-group">
            <label for="O">O</label>
            <input type="text" class="form-control" id="o" name="o" placeholder="Masukkan O" required>
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
@endsection