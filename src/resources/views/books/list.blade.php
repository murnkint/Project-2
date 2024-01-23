@extends('layout')

@section('content')

<h1>{{ $title }}</h1>

@if (count($items) > 0)

    <table class="table table-sm table-hover table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Price</th>
                <th>Published</th>
                <th>&nbsp;</th>
            </tr>
            <style>
            /* Custom styles for the table */
            table {
                background-color: #c2b280; /* Dark red background for the table */
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
 
        @foreach($items as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->genre->name }}</td>
                <td>{{ $book->year }}</td>
                <td>&euro; {{ number_format($book->price, 2, '.') }}</td>
                <td>{!! $book->display ? '&#x2714;' : '&#x274C;' !!}</td>
                <td>
                        <a
                        href="/books/update/{{ $book->id }}"
                        class="btn btn-outline-primary btn-sm"
                    >Edit</a> /
                    <form
                        method="post"
                        action="/books/delete/{{ $book->id }}"
                        class="d-inline deletion-form"
                    >
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-outline-danger btn-sm"
                        >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@else
    <p>No entries found in database </p>
@endif

<a href="/books/create" class="btn btn-primary">Add new book</a>

@endsection