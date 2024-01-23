@extends('layout ')

@section('content')

    <h1>{{ $title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">Please fix the validation errors!</div>
    @endif

    <form method="post" action="{{ $genre->exists ? '/genres/update/' . $genre->id : '/genres/store' }}">
        @csrf

        <div class="mb-3">
            <label for="genre-name" class="form-label">Genre name:</label>

            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="genre-name"
                name="name"
                value="{{ old('name', $genre->name) }}">

            @error('name')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ $genre->exists ? 'Update' : 'Create' }}</button>
    </form>

@endsection
