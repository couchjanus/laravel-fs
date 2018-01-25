@extends('layouts.blog')

@section('styles')

@endsection 

@section('content')
          
  <div class="blog-post" id="app">

    <h2 class="blog-post-title">{{$post->title}}</h2>
    <p class="blog-post-meta">{!! $post->created_at !!}</p>

    <blockquote>
      <p>{!! $post->content !!}</p>
    </blockquote>
    <p class="">Category: {{$post->category->name}}</p>
    <p class="">Tags: 
      @foreach ($post->tags as $tag)
        <span> {{$tag->name}} </span>
      @endforeach
    </p>

    @if (Auth::check())
      <h2>Hello {!! Auth::user()->name !!}!</h2>
      
      <comments :current-id='{!! $post->id !!}' :current-user='{!! Auth::user()->id !!}'></comments>
      @else
      
      <comments :current-id='{!! $post->id !!}'></comments>
    
    @endif

  </div><!-- /.blog-post -->
  <a href="{{ route('blog') }}" class="btn btn-success btn-sm" title="All Posts">
    <i class="fa fa-arrow-left" aria-hidden="true"></i> All Posts
  </a>
@stop
@section('scripts')
  <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
@stop