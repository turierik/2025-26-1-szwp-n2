@extends('bloglayout')

@section('title', $post -> title)

@section('content')
<h2 class="text-xl">{{ $post -> title }}</h2>
<i>{{ $post -> author -> name }}</i>
<br>

@if ($post -> image !== null)
    <img src="{{ Storage::disk('public') -> url('images/'. $post -> image) }}">
@endif

{{ $post -> content }}
<br>

@can('update', $post)
    <a href="{{ route('posts.edit', ['post' => $post]) }}">Szerkesztés</a>
@endcan

@can('delete', $post)
<form action="{{ route('posts.destroy', ['post' => $post ])}}" method="POST">
    @csrf
    @method('DELETE')
    <a href="#" onclick="this.closest('form').submit()">Törlés</a>
</form>
@endcan


@endsection
