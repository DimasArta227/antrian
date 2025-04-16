@extends('layouts.master')
@section('title', 'User')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Edit Data User</h3>
                            <a class="btn btn-warning "href="/user">Kembali</a>
                            </div>
                            <div class="card-body">
                                <form action="/user/{{ $user->id }}/update" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama User</label>
                                        <input 
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id=""
                                        value="{{ $user->name }}"
                                        aria-describedby="helpid"
                                        placeholder="Masukan Nama"
                                        />
                                        @error('name')
                                            <small id="helpid" class="form-text form-muted">{{ $message }}</small>
                                        @enderror
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input 
                                        type="text"
                                        class="form-control"
                                        name="email"
                                        id=""
                                        value="{{ $user->email }}"
                                        aria-describedby="helpid"
                                        placeholder="Masukan Email"
                                        />
                                        @error('email')
                                            <small id="helpid" class="form-text form-muted">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">Pilih Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="">Pilih Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="pelanggan">Pelanggan</option>
                                        </select>
                                        @error('role')
                                            <small id="helpid" class="form-text form-muted">{{ $message }}</small>
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