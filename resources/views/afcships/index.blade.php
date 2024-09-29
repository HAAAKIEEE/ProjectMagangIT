@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar </h1>
    {{-- <a href="{{ route('coas.create') }}" class="btn btn-primary mb-3">Tambah ROA</a> --}}

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
   
    {{-- @if($roas->count()) --}}
    <table class="table table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th>VM,pct</th>
                <th>CV,c/g</th>
                <th>PM</th>
                <th>Radioactive</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($afcships as $afcship)
            <tr>
                <!-- Buat baris tabel dapat diklik -->
                <td>{{ $afcship->vm_pct }}</td>
                <td>{{ $afcship->cv_cg }}</td>
                <td>{{ $afcship->pm }}</td>
                <td>{{ $afcship->radioactiv }}</td>
    
                {{-- <td>
                    <a href="{{ route('roa.edit', $roa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('roa.destroy', $roa->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- @else --}}
    <p class="text-center">Tidak ada data ROA.</p>
    {{-- @endif --}}
</div>
@endsection