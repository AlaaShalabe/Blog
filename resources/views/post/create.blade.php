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
            <form method="POST" action="{{ route('post.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">titel</label>
                    <input type="text" name="titel" class="form-control">
                    @error('titel')
                        <div class="help is-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">content</label>
                    <textarea name="content" class="form-control"></textarea>
                    @error('content')
                        <div class="help is-danger">{{ $message }}</div>
                    @enderror
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
                            <div>
                                @error('category_id')
                                    <div class="help is-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="field">
                    <label class="label">Tags</label>
                    <div class="control">
                        <div class="select is-multiple">
                            <select name="tags[]" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <div>
                                @error('tags')
                                    <div class="help is-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Featured Imge</label>
                    <div class="file">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" name="imge">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        @error('imge')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ">Create</button>
            </form>
        </div>
    </section>
@endsection
