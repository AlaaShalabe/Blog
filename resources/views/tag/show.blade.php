@extends('partials.app')
@section('title')
@section('subtitle', "{$tag->posts->count()} posts")

@section('content')
    <section class="section">
        <div class="container">
            <div class="clearfix">
                <p
                    style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:3.5em; height: 100px;">
                    {{ $tag->name }}'s Posts</p>
                <p style="font-family:sans-serif ; font-size:2.5em; height: 100px;">
                    {{ $tag->posts->count() }} {{ __('posts') }}
                </p>
            </div>
            <progress class="progress is-normal" value="100" max="100"></progress>
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
                                <div class="content">
                                    <p class="title is-4"> <a href="{{ route('post.show', $post) }}"><i>
                                                {{ $post->titel }}</i></a>
                                    </p>

                                    <h4> {{ $post->bio }}</h4>
                                    <br>
                                    <time>
                                        <h6> {{ $post->created_at->format('d M y') }}</h6>
                                    </time>
                                    <br>
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('tag.show', $tag) }}" class="has-text-info">
                                            #{{ $tag->name }} </a>
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
