@extends('layouts.blog')

@section('title', '| View Post')


@section('content')
    

    <div class="container" id="app">
          <h1> <a href="{{url('posts')}}">Blog HomePage</a></h1>
      <div class="blog-post">
        <h2 class="blog-post-title">{{ $article->title }}</h2>
        <p class="blog-post-meta">{{ date('M j, Y h:ia', strtotime($article->updated_at)) }} by <a href="#">{{ $article->user->name }}</a></p>
        <hr>
        <p>{!! $article->content !!}</p>
      </div>
      @if (Auth::check())
      <h2>Hello {!! Auth::user()->name !!}!</h2>
      <comments :current-id='{!! $article->id !!}' :current-user='{!! Auth::user()->id !!}'></comments>
      @else
      <comments :current-id='{!! $article->id !!}'></comments>
      @endif
    </div>

@endsection
