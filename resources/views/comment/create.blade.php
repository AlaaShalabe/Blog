@extends('partials.app')
@section('content')
    <section class="section">
        <div class="block">
            <ul>
                @foreach ($errors->all() as $error)
                @endforeach
            </ul>
        </div>
        <div class="block">
            <form method="POST" action="{{ route('comment.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name of Comment</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    @error('name')
                        <div class="help is-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary ">Create</button>
            </form>
        </div>
    </section>
@endsection