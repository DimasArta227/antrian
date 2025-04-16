@extends('layouts.master')
@section('title', 'Antrian')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Tambah Data Antrian</h3>
                            <a class="btn btn-warning" href="/antrian">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/antrian/simpan-admin" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="pensiunan" class="form-label">Pensiunan</label>
                                    <select name="pensiunan_id" id="pensiunan" class="form-control">
                                        <option value="">Pilih Pensiunan</option>
                                        @foreach($pensiunan as $p)
                                            <option value="{{ $p->id_user }}">{{ $p->no_pensiunan }} - {{ $p->user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection