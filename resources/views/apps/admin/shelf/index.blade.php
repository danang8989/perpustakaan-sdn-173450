@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Data Rak</h1>

    <div class="row">
        <div class="col-6 col-lg-6 col-xxl-6 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('admin.shelf.create')}}">
                                <button class="btn btn-primary">Tambah</button>
                            </a>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('admin.shelf') }}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <input type="text" placeholder="Cari Nama Rak" class="form-control" name="q_title" value="{{ $q_title }}">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">Nama</th>
                            <th class="d-none d-md-table-cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($shelf) == 0)
                            <tr>
                                <td colspan="6" style="text-align: center">Data Kosong</td>
                            </tr>
                        @else
                            @foreach ($shelf as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{ route('admin.shelf.edit', $item->id) }}">
                                            <button class="btn btn-sm btn-warning">Edit</button>
                                        </a>
                                        <form action="{{ route('admin.shelf.delete') }}" style="display: inline-block" method="POST">
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