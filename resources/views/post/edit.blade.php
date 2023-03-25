@extends('partials.app')
@section('content')
    <section class="section">
        <div class="block">
            <ul>
                @foreach ($errors->all() as $error)
                @endforeach
            </ul>
        </div>
        <div class="block">
            <form method="POST" action="{{ route('post.update', $post) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="field">
                    <label class="label">Title</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Name" name="titel"
                            value="{{ old('titel', $post->titel) }}">
                        @error('titel')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Content</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Name" name="content">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Category</label>
                    <div class="control">
                        <div class="select">
                            <select name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('category_id') ? 'selscted' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="help is-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Tag</label>
                    <div class="control">
                        <select name="tags[]" multiple class="select is-multiple">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <label class="form-label" for="inputImage">Image:</label>
                    <input type="file" name="image" id="inputImage"
                        class="form-control @error('image') is-invalid @enderror" {{ old('image', $post->image) }}>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Edit</button>
            </div>
            <div class="control">
                <button class="button is-link is-light">Cancel</button>
            </div>
        </div>
        </form>
        </div>
    </section>
@endsection
