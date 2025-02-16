@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Data Buku</h1>

    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('admin.book.create')}}">
                                {{-- <button class="btn btn-primary">Tambah</button> --}}
                            </a>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('admin.book') }}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <input type="text" placeholder="Cari Nama Buku" class="form-control" name="q_title" value="{{ $q_title }}">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <table class="table table-responsive table-hover my-0">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">Judul</th>
                            <th class="d-none d-xl-table-cell">Pengarang</th>
                            <th class="d-none d-xl-table-cell">Penerbit</th>
                            <th class="d-none d-xl-table-cell">Tahun Terbit</th>
                            <th class="d-none d-xl-table-cell">ISBN</th>
                            <th class="d-none d-xl-table-cell">Harga Buku</th>
                            <th class="d-none d-xl-table-cell">Kategori</th>
                            <th class="d-none d-xl-table-cell">Rak</th>
                            {{-- <th class="d-none d-md-table-cell">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($book) == 0)
                            <tr>
                                <td colspan="9" style="text-align: center">Data Kosong</td>
                            </tr>
                        @else
                            @foreach ($book as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>{{ $item->publisher }}</td>
                                    <td>{{ $item->publication_year }}</td>
                                    <td>{{ $item->isbn }}</td>
                                    <td>{{ $item->book_price }}</td>
                                    <td>{{ $item->categoryBook->name }}</td>
                                    <td>{{ $item->shelf->name }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">

                    <h5 class="card-title mb-0">Monthly Sales</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        <canvas id="chartjs-dashboard-bar"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>


</div>
@endsection

@section('footer-scripts')
@endsection