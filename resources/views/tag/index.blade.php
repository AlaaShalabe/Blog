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
        <div class="mr-6 ml-6">
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('tag.create') }}">{{ __('New Tag') }}</a>
            @endif
            <div class="table-container">
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>{{ __('Tags') }}</th>
                            <th>{{ __('Time to create') }}</th>
                            <th>{{ array_sort_recursive($array);'Actions' }}</th>
                        </tr>
                    </thead>
                    @foreach ($tags as $tag)
                        <tbody>
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->created_at->format('d M y') }}</td>
                                <td>
                                    <form action="{{ route('tag.destory', $tag) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ route('tag.edit', $tag) }}">
                                                <i class="fa-solid fa-pen-to-square fa-xl"></i></a>
                                            <button class="delete " type="submit">
                                            </button>
                                        @endif
                                        <a href="{{ route('tag.show', $tag) }}"><i
                                                class="fa-sharp fa-solid fa-eye fa-xl"></i></a>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
