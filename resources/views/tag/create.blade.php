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
        <div class="block">
            <form class="col-md-6 offset-md-3" method="POST" action="{{ route('tag.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{ __('Name') }}</label>
                    <input type="text" name="name" class="input">
                    @error('name')
                        <div class="help is-danger">{{ $message }}</div>
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
