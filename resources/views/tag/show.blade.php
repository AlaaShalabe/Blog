@extends('partials.app')
@section('title', $tag->name)
@section('subtitle', "{$tag->posts->count()} posts")

@section('content')
    <section class="section">
        <div class="container">
            <div class="block ">
                <li>{{ category-> }}</li>
            </div>
            <div class="columns is-multiline">
                @foreach ($tag->posts as $post)
                    <div class="column is-4">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ $post['imge'] }} " alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="{{ $post['auther_imge'] }} " alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4"> <a
                                                href="{{ route('posts.show', $post) }}">{{ $post['titel'] }}</a> </p>
                                        <p class="subtitle is-6"> {{ $post['auther'] }}</p>
                                    </div>
                                </div>

                                <div class="content">
                                    {{ $post['content'] }}
                                    <br>
                                    <time datetime="2016-1-1">{{ $post['created_at'] }}</time>
                                    <br>
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('tags.show', $tag) }}" class="tag is-link">
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
