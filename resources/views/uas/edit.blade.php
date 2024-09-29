@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Uas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ua_update', $uas->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Gunakan PUT untuk edit -->

        <input type="hidden" name="shipment_id" value="{{ old('shipment_id', $uas->shipment_id) }}">
        <input type="hidden" name="activity_id" value="{{ old('activity_id', $uas->activity_id) }}">  

        <div class="form-group">
            <label for="m">M</label>
            <input type="number" name="m" class="form-control" id="m" value="{{ old('m', $uas->m) }}" required>
        </div>

        <div class="form-group">
            <label for="ac">AC</label>
            <input type="number" name="ac" class="form-control" id="ac" value="{{ old('ac', $uas->ac) }}" required>
        </div>

        <div class="form-group">
            <label for="c">C:</label>
            <input type="number" name="c" class="form-control" id="c" value="{{ old('c', $uas->c) }}" required>
        </div>

        <div class="form-group">
            <label for="h">H</label>
            <input type="number" name="h" class="form-control" id="h" value="{{ old('h', $uas->h) }}" required>
        </div>

        <div class="form-group">
            <label for="n">N</label>
            <input type="number" name="n" class="form-control" id="n" value="{{ old('n', $uas->n) }}" required>
        </div>

        <div class="form-group">
            <label for="s">S</label>
            <input type="number" name="s" class="form-control" id="s" value="{{ old('s', $uas->s) }}" required>
        </div>

        <div class="form-group">
            <label for="o">O</label>
            <input type="number" name="o" class="form-control" id="o" value="{{ old('o', $uas->o) }}" required>
        </div>

        <div class="form-group">
            <label for="index">Index</label>
            <input type="number" name="index" class="form-control" id="index" value="{{ old('index', $uas->index) }}" required>
        </div>

        <div class="form-group">
            <label for="persen">%</label>
            <input type="number" name="persen" class="form-control" id="persen" value="{{ old('persen', $uas->persen) }}" required>
        </div>

        <button type="submit" class="btn mt-2 btn-primary">Update</button>
    </form>
</div>
@endsection
