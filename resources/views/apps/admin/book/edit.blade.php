@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Edit Buku</h1>

    <form action="{{ route('admin.book.update') }}" method="POST">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-6 col-lg-6 col-xxl6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        
                    </div>

                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $book->id }}">

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" value="{{ $book->title }}" name="title" placeholder="Masukkan Nama">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" value="{{ $book->author }}" name="author" placeholder="Masukkan Nama Pengarang">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" value="{{ $book->publisher }}" name="publisher" placeholder="Masukkan Nama Penerbit">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control" value="{{ $book->publication_year }}" name="publication_year" placeholder="Masukkan Tahun Terbit">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">ISBN</label>
                            <input type="text" class="form-control" value="{{ $book->isbn }}" name="isbn" placeholder="Masukkan ISBN">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Harga Buku / Pcs</label>
                            <input type="text" class="form-control" value="{{ $book->book_price }}" name="book_price" placeholder="Masukkan Harga Buku">
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Rak</label>
                            <select class="form-control" name="shelf_id">
                                <option value="">- Silahkan Pilih -</option>
                                @foreach ($shelf as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $book->shelf_id)
                                        selected
                                    @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Kategori Buku</label>
                            <select class="form-control" name="category_book_id">
                                <option value="">- Silahkan Pilih -</option>
                                @foreach ($category_book as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $book->category_book_id)
                                        selected
                                    @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3">
                <div class="card flex-fill w-100">
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