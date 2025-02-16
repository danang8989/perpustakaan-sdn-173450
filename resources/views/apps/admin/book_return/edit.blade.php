@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Edit Buku</h1>
        <div class="row">
            <div class="col-6 col-lg-6 col-xxl6 ">
                <div class="card flex-fill">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Dari Tanggal</label>
                            <input type="text" class="form-control" name="date_from" value="{{ $book_return->borrowingBook->date_from }}" disabled>
                        </div>

                        <div class="form-group mb-4">
                            <label for="" class="form-label">Sampai Tanggal</label>
                            <input type="text" class="form-control" value="{{ $book_return->borrowingBook->until_date }}" disabled>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Nama Buku</label>
                            <input type="text" class="form-control" value="{{ $book_return->borrowingBook->book->title }} - {{ $book_return->borrowingBook->book->isbn }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3">
                <div class="card w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Simpan Untuk Proses Pengembalian Buku</h5>
                    </div>
                    <div class="card-body w-100">
                        <form action="{{ route('admin.book_return.update') }}" method="POST">
                            @csrf @method('PUT')
                            <input type="hidden" name="id" value="{{ $book_return->id }}">

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            
                            <a href="{{ route('admin.borrowing_book') }}">
                                <button type="button" class="btn btn-danger">Batal</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</div>
@endsection

@section('footer-scripts')
@endsection