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
        <progress class="progress is-normal" value="100" max="100">40%</progress>
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
        <progress class="progress is-normal" value="100" max="100">40%</progress>
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
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('tag.show', $tag) }}" class="has-text-info">
                                            #{{$tag->name }} </a>
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
