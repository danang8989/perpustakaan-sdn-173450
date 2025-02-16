@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Data Anggota</h1>

    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <a href="{{route('admin.member.create')}}">
                        <button class="btn btn-primary">Tambah</button>
                    </a>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th class="d-none d-xl-table-cell">Nama</th>
                            <th class="d-none d-xl-table-cell">Email</th>
                            <th class="d-none d-xl-table-cell">Kelas</th>
                            <th class="d-none d-xl-table-cell">Umur</th>
                            <th class="d-none d-xl-table-cell">Tanggal Bergabung</th>
                            <th class="d-none d-md-table-cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($member) == 0)
                            <tr>
                                <td colspan="6" style="text-align: center">Data Kosong</td>
                            </tr>
                        @else
                            @foreach ($member as $item)
                                <tr>
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $item->classMember->name }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $item->age }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $item->created_at }}</td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{ route('admin.member.edit', $item->id) }}">
                                            <button class="btn btn-sm btn-warning">Edit</button>
                                        </a>
                                        <form action="{{ route('admin.member.delete') }}" style="display: inline-block" method="POST">
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