@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0">Upload File</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('/adduser') }}" method="POST">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Judul" name="judul" required>
                        </div>
                        <div class="col-lg-6">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="answer" required>
                                <label class="custom-file-label" for="answer">Choose file</label>
                            </div>
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
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Judul File</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            @php $no = 1; @endphp
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop