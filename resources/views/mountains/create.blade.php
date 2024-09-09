@extends('layouts.app')

@section('title', 'Tambah Gunung')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Tambah Gunung</div>
            <div class="card-body">
                <form method="POST" action="{{ route('mountains.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Gunung</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Lokasi</label>
                        <input type="text" name="location" id="location" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="height">Tinggi (mdpl)</label>
                        <input type="number" name="height" id="height" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
