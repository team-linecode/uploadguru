@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0">Tambah Data</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('/adduser') }}" method="POST">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                        </div>
                        <div class="col-lg-6">
                            <select name="level" id="" class="form-control" required>
                                <option value="">Pilih Level</option>
                                <option value="Admin">Admin</option>
                                <option value="Guru">Guru</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Password" name="password" required>
                        </div>
                    </div>
                    <div class="row float-right">
                        <div class="col-lg-12">
                            <div class="button-group">
                                <button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> 
                        {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-md text-center">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                            @php $no = 1; @endphp
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->no_encrypt }}</td>
                                <td>{{ $user->level }}</td>
                                <td>
                                    <a href="{{ url('/edituser/'.$user->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ url('/deleteuser/'.$user->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
@stop