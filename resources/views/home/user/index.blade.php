@extends('layouts.master')
@section('title', 'user')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h3>Halaman Data User</h3>
                        <a class="btn btn-primary" href="/user/tambah">Tambah</a>
                            <link rel="stylesheet" href="{{asset('assets/datatable/dataTables.bootstrap4.min.css')}}">
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                           <form method="GET" action="{{route('user.index')}}">
    <input type="text" name="search" value="{{request('search')}}" placeholder="Search users...">
    <button type="submit">Search</button>
</form>
                            <table class=" table table-bordered table-striped" id="table_pensiunan">
                                <thead>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($user as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role}}</td>
                                        <td> <a class="btn btn-warning" href="/user/{{$user->id}}/show">Edit</a>
                                            <a class="btn btn-danger"href="/user/{{$user->id}}/delete" 
                                            onclick="return confirm('yakin mau di hapus ?')">Delete</a>
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
        </div>
        <script src="{{asset('assets/datatable/datatables.min.js')}}"></script>
                                <script>
                                    $(document).ready( function () {
                                    $('table_pensiunan').DataTable();
                                    });
                                </script>
    </section>

    @if(session('success'))
    <script>
        Swal.fire({
        title: "Good job!",
        text: "{{session('success')}}",
        icon: "success"
        });
    </script>
    @elseif (session('error'))
    <script>
        Swal.fire({
        title: "Error!",
        text: "{{session('error')}}",
        icon: "error"
        });
    </script>    
    @endif

</div>

@endsection