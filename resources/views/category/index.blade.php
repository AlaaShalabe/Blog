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
            <div class="table-container">
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>Categories</th>
                            <th>Time to create</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($categories as $category)
                        <tbody>
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>

                                    <form action="{{ route('category.destory', $category) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('category.edit', $category) }}">
                                            <i class="fa-solid fa-pen-to-square fa-xl"></i></a>
                                        {{-- <a href="{{ route('categorys.show', $category) }}"><i
                                                class="fa-sharp fa-solid fa-eye fa-xl"></i></a> --}}
                                        <button class="delete " type="submit">
                                        </button>
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
