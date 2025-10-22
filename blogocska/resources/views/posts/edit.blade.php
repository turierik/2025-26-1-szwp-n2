@extends('bloglayout')

@section('title', $post -> title . " bejegyzés szerkesztése")

@section('content')

<h2 class="text-2xl">{{ $post -> title }} bejegyzés szerkesztése</h2>

<form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
    @csrf
    @method('PATCH')
    Cím: @error('title')
        <span class="text-red-500">{{ $message }}</span>
    @enderror<br>
    <input type="text" name="title" value="{{ old('title', $post -> title) }}" class="w-full"><br>
    Tartalom: @error('content')
        <span class="text-red-500">{{ $message }}</span>
    @enderror<br>
    <textarea rows="5" name="content" class="w-full">{{ old('content', $post -> content) }}</textarea><br>

    Publikus? <input type="checkbox" name="is_public" {{ old('is_public', $post -> is_public ? "on" : "off") == "on" ? "checked" : ""}}><br>

    <h3 class="text-xl">Kategóriák</h3>
    @foreach ($categories as $category)
        <input type="checkbox" class="mr-2" name="categories[]" value="{{ $category -> id }}"
            {{ in_array($category -> id, old('categories', $post -> categories -> pluck('id') -> toArray()  )) ? "checked" : "" }}
        >
        <span style="color: {{ $category -> color }}">{{ $category -> name }}</span><br>
    @endforeach

    <button class="mt-2 p-2 bg-sky-500 hover:bg-sky-400 rounded rounded-lg" type="submit">Mentés</button>
</form>

@endsection
