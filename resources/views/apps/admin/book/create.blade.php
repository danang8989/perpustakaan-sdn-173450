@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Tambah Buku</h1>

    <form action="{{ route('admin.book.insert') }}" method="POST">
        @csrf @method('POST')
        <div class="row">
            <div class="col-6 col-lg-6 col-xxl6 ">
                <div class="card flex-fill">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="title" placeholder="Masukkan Nama">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" name="author" placeholder="Masukkan Nama Pengarang">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" name="publisher" placeholder="Masukkan Nama Penerbit">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control" name="publication_year" placeholder="Masukkan Tahun Terbit">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">ISBN</label>
                            <input type="text" class="form-control" name="isbn" placeholder="Masukkan ISBN">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Harga Buku / Pcs</label>
                            <input type="text" class="form-control" name="book_price" placeholder="Masukkan Buku">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Rak</label>
                            <select class="form-control" name="shelf_id">
                                <option value="">- Silahkan Pilih -</option>
                                @foreach ($shelf as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">Kategori Buku</label>
                            <select class="form-control" name="category_book_id">
                                <option value="">- Silahkan Pilih -</option>
                                @foreach ($category_book as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                        <a href="{{ route('admin.book') }}">
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