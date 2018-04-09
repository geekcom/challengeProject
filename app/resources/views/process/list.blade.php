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

                    <div class="list-group">
                        <label>XML Files by UUID</label>
                        @foreach($data as $item)
                            <a href="{{ $item->id }}" class="list-group-item list-group-item-action">{{ $item->id }}</a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
