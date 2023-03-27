@extends('partials.app')
@section('title')
@section('subtitle', "{$tag->posts->count()} posts")

@section('content')
    <section class="section">
        <div class="container">
            <div class="block ">
                <li>{{ $tag->name }}</li>
            </div>
            <div class="block ">
                <li>{{ $tag->posts->count() }} posts</li>
            </div>
            <div class="columns is-multiline">
                @foreach ($tag->posts as $post)
                    <div class="column is-4">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ Storage::url($post->image) }} " alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4"> <a
                                                href="{{ route('post.show', $post) }}">{{ $post->titel }}</a> </p>
                                    </div>
                                </div>

                                <div class="content">
                                    {{ $post->bio }}
                                    <br>
                                    <time datetime="2016-1-1">{{ $post->created_at->format('d M y') }}</time>
                                    <br>
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('tag.show', $tag) }}" class="tag is-link">
                                            {{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
