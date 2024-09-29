@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Trace Element Major</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk update data -->
    <form action="{{ route('tem.update', $tem->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Gunakan metode PUT untuk update data -->

        <input type="hidden" name="shipment_id" value="{{ old('shipment_id', $tem->shipment_id) }}">
        <input type="hidden" name="activity_id" value="{{ old('activity_id', $tem->activity_id) }}">

        <div class="form-group">
            <label for="ci">CI:</label>
            <input type="number" name="ci" class="form-control" id="ci" value="{{ old('ci', $tem->ci) }}" required>
        </div>

        <div class="form-group">
            <label for="f">F:</label>
            <input type="number" name="f" class="form-control" id="f" value="{{ old('f', $tem->f) }}" required>
        </div>

        <div class="form-group">
            <label for="p">P:</label>
            <input type="number" name="p" class="form-control" id="p" value="{{ old('p', $tem->p) }}" required>
        </div>

        <div class="form-group">
            <label for="b">B:</label>
            <input type="number" name="b" class="form-control" id="b" value="{{ old('b', $tem->b) }}" required>
        </div>

        <div class="form-group">
            <label for="as">As:</label>
            <input type="number" name="as" class="form-control" id="as" value="{{ old('as', $tem->as) }}" required>
        </div>

        <div class="form-group">
            <label for="hg">Hg:</label>
            <input type="number" name="hg" class="form-control" id="hg" value="{{ old('hg', $tem->hg) }}" required>
        </div>

        <div class="form-group">
            <label for="se">Se:</label>
            <input type="number" name="se" class="form-control" id="se" value="{{ old('se', $tem->se) }}" required>
        </div>

        <button type="submit" class="btn mt-2 btn-primary">Update</button>
    </form>
</div>
@endsection
