@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-info alert-dismissible fade show">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{ url('/xml/process') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="xml" class="col-sm-4 col-form-label text-md-right">{{ __('XML') }}</label>

                            <div class="col-md-6">
                                <input id="xml" type="file" class="form-control{{ $errors->has('xml') ? ' is-invalid' : '' }}" name="xml" value="{{ old('xml') }}" required autofocus>

                                @if ($errors->has('xml'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('xml') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Process XML') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
