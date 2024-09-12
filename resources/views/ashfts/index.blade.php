@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Ash Fusion Temperature</h1>

    @if ($ashfts->isNotEmpty())
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-center table-hover">
                <thead class="thead-dark thead-custom">
                    <tr>
                        <th>IDT</th>
                        <th>ST</th>
                        <th>HT</th>
                        <th>FT</th>
                        <th>IDT (Oxidation)</th>
                        <th>ST (Oxidation)</th>
                        <th>HT (Oxidation)</th>
                        <th>FT (Oxidation)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ashfts as $ashft)
                        <tr>
                            <td>{{ $ashft->idt }}</td>
                            <td>{{ $ashft->st }}</td>
                            <td>{{ $ashft->ht }}</td>
                            <td>{{ $ashft->ft }}</td>
                            <td>{{ $ashft->idt1 }}</td>
                            <td>{{ $ashft->st1 }}</td>
                            <td>{{ $ashft->ht1 }}</td>
                            <td>{{ $ashft->ft1 }}</td>
                            <td>
                                <a href="{{ route('ashfts.edit', $ashft->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('ashfts.destroy', $ashft->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning mt-4" role="alert">
            Belum ada data Ash Fusion Temperature yang ditambahkan.
        </div>
    @endif
</div>
@endsection
