@extends('layouts.app')

@section('title', 'Daftar Gunung')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Daftar Gunung</h1>
    <a href="{{ route('mountains.create') }}" class="btn btn-primary">Tambah Gunung</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Lokasi</th>
            <th>Tinggi (mdpl)</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mountains as $mountain)
            <tr>
                <td>{{ $mountain->name }}</td>
                <td>{{ $mountain->location }}</td>
                <td>{{ $mountain->height }}</td>
                <td>
                    <a href="{{ route('mountains.edit', $mountain->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('mountains.destroy', $mountain->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
