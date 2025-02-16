@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Edit Anggota</h1>

    <form action="{{ route('admin.member.update') }}" method="POST">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-6 col-lg-6 col-xxl6 ">
                <div class="card flex-fill">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">

                        <input type="hidden" name="id" value="{{ $member->id }}">

                        <div class="form-group mb-4">
                            <label for="" class="form-label">NISN</label>
                            <input type="text" class="form-control" value="{{ $member->nisn }}" name="nisn" placeholder="Masukkan NISN">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" value="{{ $member->name }}" name="name" placeholder="Masukkan Nama">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Umur</label>
                            <input type="text" class="form-control" value="{{ $member->age }}" name="age" placeholder="Masukkan Umur">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Kelas</label>
                            <select class="form-control" name="class_member_id">
                                <option value="">- Silahkan Pilih -</option> 
                                @foreach ($member_class as $item)
                                    <option value="{{ $item->id }}"
                                        @if ($member->class_member_id == $item->id)
                                            selected
                                        @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3">
                <div class="card w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Aksi</h5>
                    </div>
                    <div class="card-body w-100">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.member') }}">
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