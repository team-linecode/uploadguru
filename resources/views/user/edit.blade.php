@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0">Tambah Data</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('/updateuser') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $users->id }}">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <label for="">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $users->name }}" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Level</label>
                            <select name="level" id="" class="form-control" required>
                                <option value="">Pilih Level</option>
                                <option value="Admin" {{ $users->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Guru" {{ $users->level == 'Guru' ? 'selected' : '' }}>Guru</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $users->username }}" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Password</label>
                            <input type="text" class="form-control" placeholder="Password" name="password" value="{{ $users->no_encrypt }}" required>
                        </div>
                    </div>
                    <div class="row float-right">
                        <div class="col-lg-12">
                            <div class="button-group">
                                <a href="{{ url('user') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                                <button class="btn btn-success"><i class="fas fa-check"></i> Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop