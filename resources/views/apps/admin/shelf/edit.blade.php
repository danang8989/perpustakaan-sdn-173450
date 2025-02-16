@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Edit Rak</h1>

    <form action="{{ route('admin.shelf.update') }}" method="POST">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-6 col-lg-6 col-xxl-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $shelf->id }}">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Rak</label>
                            <input type="text" class="form-control" value="{{ $shelf->name }}" name="name" placeholder="Masukkan Nama Rak">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Aksi</h5>
                    </div>
                    <div class="card-body w-100">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.shelf') }}">
                            <button type="button" class="btn btn-danger">Batal</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>


</div>
@endsection

@section('footer-scripts')
@endsection