@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Ash Fusion Temperature</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ashfts.store') }}" method="POST">
        @csrf
        <input type="hidden" name="shipment_id" value="{{ old('shipment_id', $shipment->id) }}">
        <input type="hidden" name="activity_id" value="{{ old('activity_id', $activity->id) }}">

        <div class="form-group">
            <label for="idt">IDT:</label>
            <input type="number" name="idt" class="form-control" id="idt" value="{{ old('idt') }}" required>
        </div>

        <div class="form-group">
            <label for="st">ST:</label>
            <input type="number" name="st" class="form-control" id="st" value="{{ old('st') }}" required>
        </div>

        <div class="form-group">
            <label for="ht">HT:</label>
            <input type="number" name="ht" class="form-control" id="ht" value="{{ old('ht') }}" required>
        </div>

        <div class="form-group">
            <label for="ft">FT:</label>
            <input type="number" name="ft" class="form-control" id="ft" value="{{ old('ft') }}" required>
        </div>

        <div class="form-group">
            <label for="idt1">IDT1:</label>
            <input type="number" name="idt1" class="form-control" id="idt1" value="{{ old('idt1') }}" required>
        </div>

        <div class="form-group">
            <label for="st1">ST1:</label>
            <input type="number" name="st1" class="form-control" id="st1" value="{{ old('st1') }}" required>
        </div>

        <div class="form-group">
            <label for="ht1">HT1:</label>
            <input type="number" name="ht1" class="form-control" id="ht1" value="{{ old('ht1') }}" required>
        </div>

        <div class="form-group">
            <label for="ft1">FT1:</label>
            <input type="number" name="ft1" class="form-control" id="ft1" value="{{ old('ft1') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
