@extends('layouts.master')
@section('content')

        <div class="row pb-4">
            <div class="col-md-4 d-flex align-items-center">
                <h3>Clients List</h3>
            </div>
            @include('layouts.searchForm')
        </div>
        <table class="table table-striped table-sm mb-4" js-data-table="">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($clients as $client)
                <tr>
                    <td class="align-middle">{{ $client->id }}</td>
                    <td class="align-middle">{{ $client->name }}</td>
                    <td class="align-middle">{{ $client->surname }}</td>
                    <td class="align-middle text-center"><a href="{{ route('client.edit', $client) }}">Edit</a></td>
                    <td class="align-middle text-center">
                        <form action="{{ route('client.destroy', $client) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-outline-danger btn-sm" type="submit" value="Remove" js-data-destroy="">
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        @if($paginate)
            {{ $clients->links() }}
        @else
            <a href="{{ route('index') }}" class="pr-4"><< Back to main</a>
        @endif
        <a href="{{ route('client.create') }}" class="btn btn-primary">Add New Client</a>

@endsection
