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

        <form action="{{ route('ashft.store', $activity->id) }}" method="POST">
            @csrf


            <div class="form-group">
                <label for="idt">IDT</label>
                <input type="number" name="idt" class="form-control" id="idt" required>
            </div>

            <div class="form-group">
                <label for="st">ST</label>
                <input type="number" name="st" class="form-control" id="st" required>
            </div>

            <div class="form-group">
                <label for="ht">HT</label>
                <input type="number" name="ht" class="form-control" id="ht" required>
            </div>

            <div class="form-group">
                <label for="ft">FT</label>
                <input type="number" name="ft" class="form-control" id="ft" required>
            </div>

            <div class="form-group">
                <label for="idt1">IDT</label>
                <input type="number" name="idt1" class="form-control" id="idt1" required>
            </div>

            <div class="form-group">
                <label for="st1">ST</label>
                <input type="number" name="st1" class="form-control" id="st1" required>
            </div>

            <div class="form-group">
                <label for="ht1">HT</label>
                <input type="number" name="ht1" class="form-control" id="ht1" required>
            </div>

            <div class="form-group">
                <label for="ft1">FT</label>
                <input type="number" name="ft1" class="form-control" id="ft1" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
    </div>
@endsection
