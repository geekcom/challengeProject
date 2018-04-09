@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session()->has('token'))
                        <div class="alert alert-info alert-dismissible fade show">
                            Success
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h3>Logged in, your API token is:</h3>
                        <p><b>{{ session('token') }}</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
