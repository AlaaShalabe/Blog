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
        <div class="clearfix">
            <p
                style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:3.5em; height: 100px;">
                {{ $category->name }}'s Posts</p>
            <p style="font-family:sans-serif ; font-size:2.5em; height: 100px;">
                has {{ $category->posts->count() }} posts
            </p>
        </div>
        <progress class="progress is-normal" value="100" max="100"></progress>
        <div class="block ">
            <div class="columns is-multiline">
                @foreach ($category->posts as $post)
                    <div class="column is-4">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ Storage::url($post->image) }}" alt="Placeholder image">
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
                                        <h6> <a href="{{ route('category.show', $post->category) }}" class="has-text-dark">
                                                {{ $post->category->name }}</a>|
                                            {{ $post->created_at->format('d M y') }}</h6>
                                    </time>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
