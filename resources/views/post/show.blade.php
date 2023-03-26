@extends('partials.app')
@section('content')
    <section class="section">
        <div class="block ">
            @if (Session::get('massage'))
                <div class="alert alert-info mr-6 ml-6" role="alert">
                    <li>{{ Session::get('massage') }}</li>
                </div>
            @endif
        </div>
        <div class="block">
            <ul>
                @foreach ($errors->all() as $error)
                @endforeach
            </ul>
        </div>
        <div class="block">
            <div class="titel">
                {{ $post->titel }}
            </div>
        </div>
        <div class="block">
            {{ $post->content }}
        </div>
        <div class="block">
            {{ $post->image }}
        </div>
        <div class="block">
            {{ $post->category->name }}
        </div>
        <a href="{{ route('post.edit', $post) }}">Edit</a>
        <form action="{{ route('post.destory', $post) }}" method="POST">
            @csrf
            @method('delete')
            <p class="control">
                <button class="button is-danger is-outlined" type="submit">
                    <span class="icon is-small">
                        <i class="fas fa-times"></i>
                    </span>
                    <span>Delete post</span>
                </button>
        </form>
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
        
    </section>
@endsection
