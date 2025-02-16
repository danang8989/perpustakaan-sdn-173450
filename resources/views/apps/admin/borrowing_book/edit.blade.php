@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Edit Peminjaman Buku</h1>

    <form action="{{ route('admin.borrowing_book.update') }}" method="POST">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-6 col-lg-6 col-xxl6 ">
                <div class="card flex-fill">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $borrowing_book->id }}">
                        
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control" name="date_from" value="{{ $borrowing_book->date_from }}" placeholder="Masukkan Tanggal Peminjaman">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="until_date" value="{{ $borrowing_book->until_date }}" placeholder="Masukkan Tanggal Pengembalian">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Nama Buku</label>
                            <select class="form-control" name="book_id">
                                <option value="">- Silahkan Pilih -</option>
                                @foreach ($book as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $borrowing_book->book_id)
                                        selected
                                    @endif>{{ $item->title }} - {{ $item->isbn }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">Nama Peminjam</label>
                            <select class="form-control" name="member_id">
                                <option value="">- Silahkan Pilih -</option>
                                @foreach ($member as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $borrowing_book->member_id)
                                        selected
                                    @endif>{{ $item->name }} - {{ $item->nisn }}</option>
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
                        <a href="{{ route('admin.borrowing_book') }}">
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