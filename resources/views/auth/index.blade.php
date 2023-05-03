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
            {{-- <a href="{{ route('category.create') }}"> New Category</a> --}}
            <div class="table-container">
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">

                    <thead>
                        <tr>
                            <th>{{ __('Users') }}</th>
                            <th>{{ __('Time to create') }}</th>
                            <th>{{ __('Role') }}</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->created_at->format('d M y') }}</td>
                                <td>{{ $user->role }}</td>
                                {{-- <td>

                                    <form action="{{ route('user.destory', $user) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('user.edit', $user) }}">
                                            <i class="fa-solid fa-pen-to-square fa-xl"></i></a>
                                        <a href="{{ route('user.show', $user) }}"><i
                                                class="fa-sharp fa-solid fa-eye fa-xl"></i></a>
                                        <button class="delete " type="submit">
                                        </button>
                                    </form>

                                </td> --}}
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
