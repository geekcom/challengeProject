@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">XML Data</div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-info alert-dismissible fade show">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form>
                        @foreach($people as $person)
                            <div class="form-group">
                                <legend> ID </legend>

                                <input type="text" value="{{ $id }}" class="form-control" disabled>
                                    <hr>
                                    <label>Person ID</label>
                                    <input type="text" value="{{ $person->personid }}" class="form-control" disabled>
                                    <label>Person Name</label>
                                    <input type="text" value="{{ $person->personname }}" class="form-control" disabled>
                                    <label>Person Phones</label>
                                    @php
                                        if(getType($person->phones->phone) == "string"){
                                            $person->phones->phone = array($person->phones->phone);
                                        }
                                    @endphp
                                    <select class="form-group">
                                        @foreach($person->phones->phone as $phone)
                                            <option>{{ $phone }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        @endforeach
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
