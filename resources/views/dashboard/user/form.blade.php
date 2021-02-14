@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header ">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>Users</h3>
                </div>

                <div class="col-4 text-right">
                    <button class="btn btn-sm text-secondary" data-toggle="modal" data-target="#deletemodal"
                        title="delete user">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="POST" action="{{ url('dashboard/user/update/' . $user->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control"
                                value="{{ old('email') ?? $user->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" onclick="window.history.back()"
                                class="btn btn-sm btn-secondary">Cancel</button>
                            <button class="btn btn-success btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletemodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fas fa-window-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Anda Yakin Ingin menghapus User {{ $user->name }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('dashboard/user/delete/' . $user->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
