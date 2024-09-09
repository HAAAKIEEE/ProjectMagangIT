@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Ash Fusion Temperature</h1>
        <a href="{{ route('ashfts.create') }}" class="btn btn-primary mb-3">Tambah Ash Fusion Temperature</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($ashfts->count())
            <table class="table table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>ASHFT Number</th>
                        <th>IDT</th>
                        <th>ST</th>
                        <th>HT</th>
                        <th>FT</th>
                        <th>IDT1</th>
                        <th>ST1</th>
                        <th>HT1</th>
                        <th>FT1</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ashfts as $ashft)
                        <tr>
                            <td>{{ $ashft->number }}</td>
                            <td>{{ $ashft->idt }}</td>
                            <td>{{ $ashft->st }}</td>
                            <td>{{ $ashft->ht }}</td>
                            <td>{{ $ashft->ft }}</td>
                            <td>{{ $ashft->idt1 }}</td>
                            <td>{{ $ashft->st1 }}</td>
                            <td>{{ $ashft->ht1 }}</td>
                            <td>{{ $ashft->ft1 }}</td>
                            <td>
                                <a href="{{ route('ashfts.edit', $ashft->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('ashfts.destroy', $ashft->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Tidak ada data Ash Fusion Temperature.</p>
        @endif
    </div>
@endsection
