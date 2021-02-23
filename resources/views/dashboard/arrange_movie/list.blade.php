@extends('layouts.dashboard')

@section('content')

<div class="mb-2">
    <a href="{{route('dashboard.theaters.arrange.movie.create', $theater->id)}}" class="btn btn-primary btn-sm">+ Movie</a>
</div>


@if(session()->has('message'))
<div class="alert alert-success">
    <strong>{{session()->get('message')}}</strong>
    <button class="close" type="button" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8 align-self-center">
                <h3>Theater</h3>
            </div>

            <div class="col-4">
                <form action="{{ route('dashboard.theaters') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="q"
                            value="{{ $request['q'] ?? '' }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary btn-sm">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        
    </div>
</div>


@endsection