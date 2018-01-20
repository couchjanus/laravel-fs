@extends('layouts.app')

@section('title', '| View Page')


@section('content')
{{ Breadcrumbs::render('home') }}

          <div class="blog-post">

            <h2 class="blog-post-title">{{ $content->title }}</h2>
            <p class="blog-post-meta">{{ date('M j, Y h:ia', strtotime($content->updated_at)) }} by <a href="#">Janus</a></p>

			<p>{!! $content->content !!}</p>
            <hr>
          </div><!-- /.blog-post -->

@endsection
