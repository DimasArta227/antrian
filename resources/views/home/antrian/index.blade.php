@extends('layouts.master')
@section('title', 'Antrian')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            @if(auth()->user()->role == 'admin')
                <!-- Tabel Riwayat Antrian untuk Admin -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h3>Halaman Data Antrian</h3>
                            <a class="btn btn-primary" href="/antrian/tambah">Tambah</a>
    
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Antrian</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list_admin as $riwayat)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $riwayat->no_antrian }}</td>
                                                <td>{{ $riwayat->user->name }}</td>
                                                <td>{{ $riwayat->tgl }}</td>
                                                <td>{{ $riwayat->status }}</td>
                                                <td>
                                                    @if($riwayat->status == 'Selesai')
                                                        <a class="btn btn-danger"href="/antrian/{{$riwayat->id}}/delete"
                                                            onclick="return confirm('yakin mau di hapus ?')">Delete</a>
                                                    @else
                                                        <a href="/antrian/{{ $riwayat->id }}/cetak" class="btn btn-info" target="_blank">Cetak</a>
                                                        <a class="btn btn-success" href="/antrian/{{$riwayat->id}}/update">Selesai</a>
                                                        <a class="btn btn-danger"href="/antrian/{{$riwayat->id}}/delete"
                                                            onclick="return confirm('yakin mau di hapus ?')">Delete</a>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <!-- Karcis Antrian dan Nomor Antrian Sekarang sejajar -->
                    <div class="col-md-8">
                        <div class="card shadow-lg p-4 text-center" style="border: 2px dashed #333; background: #f8f9fa;">
                            <div class="card-header bg-primary text-white">
                                <h3 class="mb-0">Karcis Antrian</h3>
                            </div>
                            <div class="card-body">
                                @if($antrian)
                                    <h2 class="font-weight-bold">Nomor Antrian: {{ $antrian->no_antrian }}</h2>
                                    <p class="mb-1"><strong>Nama Pengantri:</strong> {{ $antrian->user->name }}</p>
                                    <p class="mb-1"><strong>No Pensiunan:</strong> {{ $antrian->pensiunan->no_pensiunan }}</p>
                                    <p class="mb-1"><strong>Tanggal:</strong> {{ $antrian->tgl }}</p>
                                    <p class="mb-1"><strong>Status:</strong> {{ $antrian->status }}</p>
                                @else
                                    <p class="text-muted">Data antrian belum tersedia. Silakan tambah antrian baru.</p>
                                @endif
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a href="/antrian/simpan-pelanggan" class="btn btn-primary mx-2">Tambah</a>
                                @if($antrian)
                                    <a href="/antrian/{{ $antrian->id }}/delete" class="btn btn-danger mx-2" onclick="return confirm('Yakin mau dihapus?')">Delete</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center p-3 shadow">
                            <h5 class="mb-0">Nomor Antrian Sekarang</h5>
                            <h2 class="font-weight-bold text-danger">{{ $antrian_sekarang ?? '-' }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Tabel Riwayat Antrian Pelanggan -->
                <div class="row justify-content-center mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                <h4 class="mb-0">Riwayat Antrian</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($riwayat_antrian as $riwayat)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $riwayat->user->name }}</td>
                                                <td>{{ $riwayat->tgl }}</td>
                                                <td>{{ $riwayat->status }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @if(session('success'))
    <script>
        Swal.fire({
            title: "Good job!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
    @elseif(session('error'))
    <script>
        Swal.fire({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error"
        });
    </script>
    @endif
</div>

@endsection