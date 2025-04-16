@extends('layouts.master')
@section('title', 'Pensiunan')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <link rel="stylesheet" href="{{asset('assets/datatable/dataTables.bootstrap4.min.css')}}">
                            <h3>Halaman Data Pensiunan</h3>
                            @if(auth()->user()->role == 'admin')
                                <a class="btn btn-primary" href="/pensiunan/tambah-admin">Tambah</a>
                            @else
                                <a class="btn btn-primary" href="/pensiunan/tambah-pelanggan">Tambah</a>
                                @if ($pensiunan)
                                    <a class="btn btn-warning mx-2" href="/pensiunan/{{ $pensiunan->id }}/show">Edit</a>
                                    <a class="btn btn-danger" href="/pensiunan/{{ $pensiunan->id }}/delete" 
                                        onclick="return confirm('Yakin mau dihapus?')">Delete</a>
                                @endif
                            @endif
                        </div>
                        <div class="card-body">
                            @if(auth()->user()->role == 'admin')
                                <!-- TABEL UNTUK ADMIN -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="pensiunan">
                                    <script src="{{asset('assets/datatable/datatables.min.js')}}"></script>
                            <script>
                                $(document).ready( function () {
                                    $('pensiunan').dataTable();
                                });
                            </script>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No Pensiunan</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>Tanggal Pensiun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pensiunans as $pensiunan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pensiunan->user->name }}</td>
                                                <td>{{ $pensiunan->no_pensiunan }}</td>
                                                <td>{{ $pensiunan->tanggal_lahir }}</td>
                                                <td>{{ $pensiunan->alamat }}</td>
                                                <td>{{ $pensiunan->no_telepon }}</td>
                                                <td>{{ $pensiunan->tanggal_pensiun }}</td>
                                                <td>
                                                    <a class="btn btn-warning btn-sm" href="/pensiunan/{{ $pensiunan->id }}/show">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="/pensiunan/{{ $pensiunan->id }}/delete" onclick="return confirm('Yakin mau dihapus?')">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <!-- HALAMAN DETAIL PENSIUNAN UNTUK USER BIASA -->
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card shadow-lg p-5 bg-white rounded text-center" style="max-width: 700px; margin: auto;">
                                            @if ($pensiunan)
                                                <h1 class="card-title font-weight-bold">{{ $pensiunan->user->name }}</h1>
                                                <br>
                                                <p class="card-text text-xl"><strong>Nomor Pensiunan:</strong> {{ $pensiunan->no_pensiunan }}</p>
                                                <p class="card-text text-xl"><strong>Tanggal Lahir:</strong> {{ $pensiunan->tanggal_lahir }}</p>
                                                <p class="card-text text-xl"><strong>Alamat:</strong> {{ $pensiunan->alamat }}</p>
                                                <p class="card-text text-xl"><strong>No Telepon:</strong> {{ $pensiunan->no_telepon }}</p>
                                                <p class="card-text text-xl"><strong>Tanggal Pensiun:</strong> {{ $pensiunan->tanggal_pensiun }}</p>
                                            @else
                                                <h2 class="text-muted">Data pensiunan belum ada di akun ini.</h2>
                                                <p class="text-lg">Silakan tambahkan data pensiunan dengan menekan tombol di atas.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
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
