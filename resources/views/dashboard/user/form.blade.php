@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h3>Users</h3>
                </div>

                <div class="col-4">

                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="POST" action="{{ url('dashboard/user/update') }}">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
