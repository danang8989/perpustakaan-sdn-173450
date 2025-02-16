@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Data Pengembalian Buku</h1>

    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <form action="{{ route('admin.book_return') }}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <input type="text" placeholder="Cari Nama Anggota" class="form-control" name="q_name" value="{{ $q_name }}">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <table class="table table-responsive table-hover my-0">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">Nama Buku</th>
                            <th class="d-none d-xl-table-cell">Nama Peminjam</th>
                            <th class="d-none d-xl-table-cell">Tanggal Peminjaman</th>
                            <th class="d-none d-xl-table-cell">Tanggal Pengembalian</th>
                            <th class="d-none d-xl-table-cell">Status Telat</th>
                            <th class="d-none d-xl-table-cell">Status Pengembalian</th>
                            <th class="d-none d-md-table-cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($book_return) == 0)
                            <tr>
                                <td colspan="7" style="text-align: center">Data Kosong</td>
                            </tr>
                        @else
                            @foreach ($book_return as $item)
                                <tr>
                                    <td>{{ $item->borrowingBook->book->title }}</td>
                                    <td>{{ $item->borrowingBook->member->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->borrowingBook->date_from)) }} - {{ date('d-m-Y', strtotime($item->borrowingBook->until_date)) }}</td>
                                    <td>
                                        @if ($item->updated_at != null)
                                        <label for="" class="badge badge-sm bg-primary">{{ date('d-m-Y', strtotime($item->updated_at)) }}</label>  
                                        @else
                                        -
                                        @endif
                                       
                                    </td>
                                    <td>
                                        @if ($item->is_late == 1)
                                            <label for="" class="badge badge-sm bg-danger">Terlambat</label>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->is_return == 1)
                                            Sudah di Kembalikan
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td width="25%" class="d-none d-md-table-cell">
                                        <a href="{{ route('admin.book_return.edit', $item->id) }}">
                                            <button class="btn btn-sm btn-success">Proses Pengembalian</button>
                                        </a>
                                        <form action="{{ route('admin.book_return.delete') }}" style="display: inline-block" method="POST">
                                            @csrf @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
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