@extends('layouts.blog')
@section('content')

    <h1>Articles</h1>
    @foreach($categories as $category)
        <h1>{{$category->name}}</h1>
        <ul>
            @foreach($category->posts as $post)
            <li>
                <a href="{!! route('blog.show', array($post->id)) !!}">{{ $post->title }}</a>
            </li>
            @endforeach
        </ul>
    @endforeach

@stop
