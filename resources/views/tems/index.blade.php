@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Ash Fusion Temperature</h1>

    {{-- @if ($ashfts->isNotEmpty()) --}}
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-center table-hover">
                <thead class="thead-dark thead-custom">
                    <tr>
                        <th>CI</th>
                        <th>F</th>
                        <th>P</th>
                        <th>B</th>
                        <th>As</th>
                        <th>Hg</th>
                        <th>Se</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tems as $tem)
                        <tr>
                            <td>{{ $tem->ci }}</td>
                            <td>{{ $tem->f }}</td>
                            <td>{{ $tem->p }}</td>
                            <td>{{ $tem->b }}</td>
                            <td>{{ $tem->as }}</td>
                            <td>{{ $tem->hg }}</td>
                            <td>{{ $tem->se }}</td>
                          
                            <td>
                                {{-- <a href="{{ route('ashfts.edit', $ashft->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('ashfts.destroy', $ashft->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    {{-- @else
        <div class="alert alert-warning mt-4" role="alert">
            Belum ada data Ash Fusion Temperature yang ditambahkan.
        </div>
    @endif --}}
</div>
@endsection
