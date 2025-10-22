@extends('bloglayout')

@section('title', "Kezdőlap")

@section('content')

@if (Session::has('post-created'))
    <div class="bg-green-300 rounded mb-2 py-2 text-centers">
        A(z) {{ Session::get('post-created') }} című bejegyzés létrehozva!
    </div>
@endif

@can('create', \App\Models\Post::class)
    <a href="{{ route('posts.create')}}" class="text-green-500">Új bejegyzés írása</a>
    <br><br>
@endcan

<ul>
    @foreach ($posts as $post)
        <li><a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post -> title }}</a> <i>({{$post -> author -> name}})</i></li>
    @endforeach
</ul>

{{ $posts -> links() }}
@endsection
