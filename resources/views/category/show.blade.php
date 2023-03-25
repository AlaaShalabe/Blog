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
        <div class="block ">
            <div class="titel">
                {{ $category->name }}'s Posts
            </div>
        </div>
        <div class="block ">
            <div class="titel">
                has {{ $category->posts->count() }} Posts
            </div>
        </div>
        <div class="block ">
            <div class="columns is-multiline">
                @foreach ($category->posts as $post)
                    <div class="column is-4">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ $post->image }} " alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4"> <a
                                                href="{{ route('post.show', $post) }}">"{{ $post->titel }}"</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="content">
                                    {{ $post->content }}
                                    <br>
                                    <time datetime="2016-1-1">{{ $post->created_at->format('d-m-y') }}</time>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
