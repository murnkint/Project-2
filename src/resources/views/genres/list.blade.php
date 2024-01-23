@extends('layout')

@section('content')

    <h1>{{ $title }}</h1>

    @if (count($items) > 0)

        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Genre name</th>
                    <th>Actions</th>
                </tr>
                <style>
                /* Custom styles for the table */
                table {
                    background-color: #c2b280; /* Background for the table */
                    color: #ffffff; /* White text color for the table */
                }

                /* Custom styles for buttons */
                .btn-primary,
                .btn-outline-primary {
                    background-color: #800000; /* Dark red background for primary buttons */
                    color: #ffffff; /* White text color for primary buttons */
                    border-color: #800000;
                }

                .btn-outline-danger {
                    background-color: #020048;
                    color: #ffffff; /* White text color for danger buttons */
                    border-color: #020048; /* Dark blue border color for danger buttons */
                }

                .btn-outline-danger:hover {
                    background-color: #800000; /* Dark red background on hover for danger buttons */
                    color: #ffffff; /* White text color on hover for danger buttons */
                }
                
                </style>
            </thead>
            <tbody>

                @foreach($items as $genre)
                    <tr>
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="/genres/edit/{{ $genre->id }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            <form action="/genres/delete/{{ $genre->id }}" method="post" class="d-inline deletion-form">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    @else

        <p>No genres found in the database</p>

    @endif

    <a href="/genres/create" class="btn btn-primary">Add a new genre</a>

@endsection
