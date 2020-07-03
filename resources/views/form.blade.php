@extends('layouts.master')
@section('content')
<div class="row justify-content-center">
    <h2>
        @isset($client)
            Edit Client <b>"{{ $client->name }}"</b>
        @else
            Add Client Info
        @endisset
    </h2>
</div>
<div class="row justify-content-center">
    <form method="POST" class="col-8"
        @isset($client)
            action="{{ route('client.update', $client) }}"
        @else
            action="{{ route('client.store') }}"
        @endisset
    >
        @csrf
        @isset($client)
            @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="firstName">First name</label>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="name" class="form-control" id="firstName" placeholder="firstName"
                   value="@isset($client){{ $client->name }}@endisset">
        </div>
        <div class="mb-3">
            <label for="lastName">Last name</label>
            @error('surname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="surname" class="form-control" id="lastName" placeholder="lastName"
                   value="@isset($client){{ $client->surname }}@endisset">
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">
            @isset($client)
                Update
            @else
                Add
            @endif
        </button>
    </form>
</div>
<div class="row justify-content-center pt-4">
    <a href="{{ route('index') }}"><< Back to main</a>
</div>
@endsection

