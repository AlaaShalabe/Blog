@extends('partials.app')
@section('content')
    <section class="section">
        <div class="block">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="block">
            This text is within a <strong>block</strong>.
        </div>
        <div class="block">
            <div class="columns is-multiline">
                @foreach ($posts as $post)
                    <div class="column is-4">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ Storage::exists($post->imge) ? Storage::url($post->imge) : $post->imge }}"
                                        alt="Placeholder image">

                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    {{-- <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="{{ Storage::exists($post->auther_imge) ? Storage::url($post->auther_imge) : $post->auther_imge }}"
                                                alt="Placeholder image">
                                        </figure>
                                    </div> --}}
                                    <div class="media-content">
                                        <p class="title is-4"> <a
                                                href="{{ route('post.show', $post) }}">{{ $post->titel }}</a> </p>
                                        <p class="subtitle is-6"> {{ $post->category }}</p>
                                    </div>
                                </div>
                                <div class="content">
                                    {{ $post->content }}
                                    <br>
                                    <time datetime="2016-1-1">{{ $post['created_at'] }}</time>
                                    <br>
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('tags.show', $tag) }}" class="tag is-link">
                                            {{ $tag->name }}</a>
                                    @endforeach
                                    <a href="{{ route('categories.show', $post->category) }}"
                                        class="tag is-danger">{{ $post->category->name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
