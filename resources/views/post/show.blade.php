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
            <div class="image">
                <img src=" {{ Storage::url($post->image) }}" alt="{{ $post->titel }}">
            </div>
        </div>
        <div class="block">

            <div class="titel">
                {{ $post->titel }}
            </div>
        </div>
        <div class="block">
            {{ $post->bio }}
        </div>
        <div class="content">
            <div class="block">
                {{ $post->content }}
            </div>
        </div>
        <div class="block">
            {{ $post->category->name }}
        </div>
        <div class="block">

            <form action="{{ route('post.destory', $post) }}" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('post.edit', $post) }}">Edit</a>
                <button class="button is-danger is-outlined" type="submit">
                    <span class="icon is-small">
                        <i class="fas fa-times"></i>
                    </span>
                    <span>Delete post</span>
                </button>
            </form>
        </div>
        <div class="block">

            <div class="card col-6;">
                <div class="card-header">
                    Comments :
                </div>
                @foreach ($post->comments as $comment)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $comment->comment }}</li>
                    </ul>
                @endforeach
                <form method="POST" action="{{ route('comment.store', $post) }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="comment" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        @error('comment')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary ">Comment</button>
                </form>
            </div>
        </div>


    </section>
@endsection
