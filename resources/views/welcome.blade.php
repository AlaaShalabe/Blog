@extends('partials.app')
@section('content')
    <section class="section">
        <div class="block">
            <div class="clearfix">
                <img src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    class="col-md-6 float-md-end mb-3 ms-md-3" alt="...">

                <p
                    style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:3.5em; text-align: center ;   height: 300px;
                    display: flex;
                    align-items: center;
                    justify-content: center;">
                    <i> Welcome to the our Blog </i>
                </p>

            </div>
        </div>

        <div class="block ">
            @if (Session::get('massage'))
                <div class="alert alert-info mr-6 ml-6" role="alert">
                    <li>{{ Session::get('massage') }}</li>
                </div>
            @endif
        </div>
        <div class="block"
            style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:2.5em">
            Read our latest posts.
        </div>
        <div class="block">
            <div class="columns is-multiline">
                @foreach ($posts as $post)
                    <div class="column is-4">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->titel }}">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    <p class="title is-4"> <a href="{{ route('post.show', $post) }}">{{ $post->titel }}</a>
                                    </p>
                                    {{ $post->bio }}
                                    <br>
                                    <time datetime="2016-1-1">{{ $post->created_at->format('d M y') }}</time>
                                    <br>
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('tag.show', $tag) }}" class="tag is-link">
                                            {{ $tag->name }}</a>
                                    @endforeach
                                    <a href="{{ route('category.show', $post->category) }}"
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
