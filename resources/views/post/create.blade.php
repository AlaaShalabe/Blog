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
            <form class="col-md-6 offset-md-3" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label class="label">{{ __('Title') }}</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Name" name="titel" value="{{ old('titel') }}">
                        @error('titel')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">{{ __('bio') }}</label>
                    <div class="control">
                        <input class="input" placeholder="Name" name="bio" value="{{ old('bio') }}">
                        @error('bio')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">{{ __('Content') }}</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Name" name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">{{ __('Category') }}</label>
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
                    <label class="label">{{ __('Tag') }}</label>
                    <div class="control">
                        <select name="tags[]" class="form-select" size="3" aria-label="size 3 select example">
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
                    <label class="label" for="inputImage">{{ __('Image') }}:</label>
                    <input type="file" name="image" id="inputImage" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">{{ __('Create') }}</button>
                    </div>
                    <div class="control">
                        <button class="button is-link is-light">{{ __('Cancel') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
