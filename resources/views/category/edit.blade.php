@extends('partials.app')
@section('content')
    <section class="section">
        <div class="block">
            <h1 class="col-md-6 offset-md-3">{{ __('Edit') }} <i><u>{{ $category->name }}</u></i> </h1>
        </div>
        <div class="block">
            <ul>
                @foreach ($errors->all() as $error)
                @endforeach
            </ul>
        </div>
        <div class="block">
            <form class="col-md-6 offset-md-3" method="POST" action="{{ route('category.update', $category) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{ __('Name') }}</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control">
                    @error('name')
                        <div class="help is-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">{{ __('Edit') }}</button>
                    </div>
                    <div class="control">
                        <button class="button is-link is-light">{{ __('Cancel') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
