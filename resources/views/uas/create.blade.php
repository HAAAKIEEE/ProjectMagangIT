@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Uas</h1>

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
            <input type="number" name="m" class="form-control" id="m" value="{{ old('m') }}" required>
        </div>

        <div class="form-group">
            <label for="ac">AC</label>
            <input type="number" name="ac" class="form-control" id="ac" value="{{ old('ac') }}" required>
        </div>

        <div class="form-group">
            <label for="c">C:</label>
            <input type="number" name="c" class="form-control" id="c" value="{{ old('c') }}" required>
        </div>

        <div class="form-group">
            <label for="h">H</label>
            <input type="number" name="h" class="form-control" id="h" value="{{ old('h') }}" required>
        </div>

        <div class="form-group">
            <label for="n">N</label>
            <input type="number" name="n" class="form-control" id="n" value="{{ old('n') }}" required>
        </div>
        <div class="form-group">
            <label for="s">S</label>
            <input type="number" name="s" class="form-control" id="s" value="{{ old('s') }}" required>
        </div>
        <div class="form-group">
            <label for="o">O</label>
            <input type="number" name="o" class="form-control" id="o" value="{{ old('o') }}" required>
        </div>
        <div class="form-group">
            <label for="index">Index</label>
            <input type="number" name="index" class="form-control" id="index" value="{{ old('index') }}" required>
        </div>
        <div class="form-group">
            <label for="persen">%</label>
            <input type="number" name="persen" class="form-control" id="persen" value="{{ old('persen') }}" required>
        </div>
        <button type="submit" class="btn mt-2 btn-primary">Simpan</button>
    </form>
</div>
@endsection