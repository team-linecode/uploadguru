@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Users</h4>
                </div>
                <div class="card-body">
                    {{ $user_count }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-upload"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>File Upload</h4>
                </div>
                <div class="card-body">
                    {{ $file_count }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @if (auth()->user()->level == 'Admin')
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ url('/addfiles') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Judul" name="judul" required>
                        </div>
                        <div class="col-lg-6">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="file" required>
                                <label class="custom-file-label" for="answer">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="row float-right">
                        <div class="col-lg-12">
                            <div class="button-group">
                                <button class="btn btn-primary"><i class="fas fa-upload"></i> Upload</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header m-0 py-0">
                <h3 class="m-0 py-0 m-auto">File Admin</h3>
            </div>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Judul File</th>
                                <th>Nama File</th>
                                <th>Uploaded At</th>
                                <th>Action</th>
                            </tr>
                            @php $no = 1; @endphp
                            @foreach ( $file_user as $file )
                            <tr>
                                @if ($file->user->level == 'Admin')
                                <td>{{ $no++ }}</td>
                                <td>{{ $file->user->name }}</td>
                                <td>{{ $file->judul }}</td>
                                <td>{{ $file->file }}</td>
                                <td>{{ $file->created_at }}</td>
                                <td class="text-center">
                                    @if (auth()->user()->level == 'Admin')
                                    <a href="{{ url('/deletefiles/'. $file->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    @else
                                    <a href="{{ asset('/file/'. $file->file) }}" class="btn btn-primary btn-sm"><i class="fas fa-download"></i></a>
                                    @endif
                                </td>
                                @endif
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
@stop