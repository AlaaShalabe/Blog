@extends('partials.app')
@section('content')
    <section class="section">
        <div class="block">
            <h1 class="title">Edit the {{ $category->name }} task</h1>
        </div>
        <div class="block">
            <ul>
                @foreach ($errors->all() as $error)
                @endforeach
            </ul>
        </div>
        <div class="block">
            <form method="POST" action="{{ route('category.update', $category) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name of Category</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control">
                    @error('name')
                        <div class="help is-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary ">Create</button>
            </form>
        </div>
    </section>
@endsection
