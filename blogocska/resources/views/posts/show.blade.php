@extends('bloglayout')

@section('title', $post -> title)

@section('content')
<h2 class="text-xl">{{ $post -> title }}</h2>
<i>{{ $post -> author -> name }}</i>
<br>
{{ $post -> content }}
<br>

<form action="{{ route('posts.destroy', ['post' => $post ])}}" method="POST">
    @csrf
    @method('DELETE')
    <a href="#" onclick="this.closest('form').submit()">Törlés</a>
</form>


@endsection
