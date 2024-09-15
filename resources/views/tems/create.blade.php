@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Trace Element Major</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('tem_store')}}" method="POST">
        @csrf
        <input type="hidden" name="shipment_id" value="{{ old('shipment_id', $shipment->id) }}">
        <input type="hidden" name="activity_id" value="{{ old('activity_id', $activity->id) }}">     

        <div class="form-group">
            <label for="ci">CI:</label>
            <input type="number" name="ci" class="form-control" id="ci" value="{{ old('ci') }}" required>
        </div>

        <div class="form-group">
            <label for="f">F:</label>
            <input type="number" name="f" class="form-control" id="f" value="{{ old('f') }}" required>
        </div>

        <div class="form-group">
            <label for="p">P:</label>
            <input type="number" name="p" class="form-control" id="p" value="{{ old('p') }}" required>
        </div>

        <div class="form-group">
            <label for="b">B:</label>
            <input type="number" name="b" class="form-control" id="b" value="{{ old('b') }}" required>
        </div>

        <div class="form-group">
            <label for="as">As:</label>
            <input type="number" name="as" class="form-control" id="as" value="{{ old('as') }}" required>
        </div>

        <div class="form-group">
            <label for="hg">Hg:</label>
            <input type="number" name="hg" class="form-control" id="hg" value="{{ old('hg') }}" required>
        </div>

        <div class="form-group">
            <label for="se">Se:</label>
            <input type="number" name="se" class="form-control" id="se" value="{{ old('se') }}" required>
        </div>

        

        <button type="submit" class="btn mt-2 btn-primary">Simpan</button>
    </form>
</div>
@endsection