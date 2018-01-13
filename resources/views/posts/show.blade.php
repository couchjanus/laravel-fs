@extends('layouts.blog')

@section('content')
          
  <div class="blog-post">

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

  </div><!-- /.blog-post -->
  <a href="{{ route('blog') }}" class="btn btn-success btn-sm" title="All Posts">
    <i class="fa fa-arrow-left" aria-hidden="true"></i> All Posts
  </a>
@stop
