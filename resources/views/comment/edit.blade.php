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
            <form method="POST" action="{{ route('comment.update', $comment) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ old('name', $comment->name) }}">
                    @error('name')
                        <div class="help is-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary ">{{ __('Edit') }}</button>
            </form>
        </div>
    </section>
@endsection
