@extends('layouts.master')
@section('title', 'Pensiunan')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Edit Data Pensiunan</h3>
                            <a class="btn btn-warning" href="/pensiunan">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/pensiunan/{{ $pensiunan->id }}/update" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="no_pensiunan" class="form-label">Nomor Pensiunan</label>
                                    <input 
                                        type="number"
                                        class="form-control"
                                        name="no_pensiunan"
                                        value="{{ $pensiunan->no_pensiunan }}"
                                        id="no_pensiunan"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('no_pensiunan')
                                    <div class="alert alert-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input 
                                        type="date"
                                        class="form-control"
                                        name="tanggal_lahir"
                                        id="tanggal_lahir"
                                        value="{{ $pensiunan->tanggal_lahir }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('tanggal_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input 
                                        type="text"
                                        class="form-control"
                                        name="alamat"
                                        id="alamat"
                                        value="{{ $pensiunan->alamat }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label">No Telepon</label>
                                    <input 
                                        type="text"
                                        class="form-control"
                                        name="no_telepon"
                                        id="no_telepon"
                                        value="{{ $pensiunan->no_telepon }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('no_telepon')
                                    <div class="alert alert-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_pensiun" class="form-label">Tanggal Pensiun</label>
                                    <input 
                                        type="date"
                                        class="form-control"
                                        name="tanggal_pensiun"
                                        id="tanggal_pensiun"
                                        value="{{ $pensiunan->tanggal_pensiun }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('tanggal_pensiun')
                                    <div class="alert alert-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
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