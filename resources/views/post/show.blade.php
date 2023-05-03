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
        <div class="clearfix">
            <img src=" {{ Storage::url($post->image) }}" alt="{{ $post->titel }}" class="col-md-6 float-md-end mb-3 ms-md-3">
            <div class="titel">
                <p
                    style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:3.5em;   height: 200px;">
                    {{ $post->titel }}
                </p>
                <p style="font-family:sans-serif ; font-size:1.5em;   height: 200px;">
                    {{ $post->bio }}
                </p>
                <p style="font-family:sans-serif;font-size:1.5em">

                    <b> {{ $post->category->name }} | {{ $post->created_at->format('d M y') }} </b>
                </p>
            </div>
        </div>
        <progress class="progress is-normal" value="100" max="100"></progress>

        <div class="clearfix">
            <div class="col-md-9 float-md-end mb-3 ms-md-3">
                <p style="font-family:sans-serif ; font-size:1.3em"> {{ $post->content }} </p>
            </div>
            <div class="block">
                {{-- @if (Auth::user()) --}}
                <form action="{{ route('post.destory', $post) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('post.edit', $post) }}" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-pen-to-square fa-xl"> </i>{{ __('Edit') }}</a>
                    <button class="btn btn-danger btn-sm" type="submit">
                        <span class="icon is-small">
                            <i class="fas fa-times"></i>
                        </span>
                        <span>{{ __('Delete') }}</span>
                    </button>
                </form>
                {{-- @endif --}}
            </div>
        </div>
        <div class="clearfix">
            <div class="col-md-9 float-md-end mb-3 ms-md-3">
                <div class="card-header">
                    {{ $post->comments->count() }} {{ __('Comments') }} :
                </div>
                @foreach ($post->comments as $comment)
                    <strong>{{ $comment->user->name }}</strong>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            {{ $comment->comment }}

                            <form action="{{ route('comment.destory', $comment) }}" method="POST">
                                @csrf
                                @method('delete')
                                {{-- <a href="{{ route('post.edit', $post) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen-to-square fa-xl"> </i>Edit</a> --}}
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <span class="icon is-small">
                                        <i class="fas fa-times"></i>
                                    </span>
                                    <span>{{ __('Delete') }}</span>
                                </button>

                            </form>
                        </li>
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

                    <button type="submit" class="btn btn-primary ">{{ __('Comment') }}</button>
                </form>
            </div>
        </div>


    </section>
@endsection
