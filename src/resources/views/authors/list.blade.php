@extends('layout')

@section('content')

    <h1>{{ $title }}</h1>

    @if (count($items) > 0)

        <table class="table table-striped table-hover table-sm custom-table">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name and Surname</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            @foreach($items as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>
                        <a href="/authors/update/{{ $author->id }}" class="btn btn-outline-primary btn-sm">Edit</a>
                    
                        <form action="/authors/delete/{{ $author->id }}" method="post" class="d-inline deletion-form">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    @else

        <p>No entries found in the database</p>

    @endif

    <a href="/authors/create" class="btn btn-primary">Create a new author</a>

@endsection

