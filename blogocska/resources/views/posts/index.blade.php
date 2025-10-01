@extends('bloglayout')

@section('title', "Kezdőlap")

@section('content')
<ul>
    @foreach ($posts as $post)
        <li><a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post -> title }}</a> <i>({{$post -> author -> name}})</i></li>
    @endforeach
</ul>
@endsection
