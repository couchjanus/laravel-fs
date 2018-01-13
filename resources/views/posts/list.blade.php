@extends('layouts.blog')
@section('content')

    <h1>Articles</h1>
    @foreach ($posts as $post)

    <h1>{{ $post->category->name }}</h1>
    
    <article>
      <h2>{{ $post->title }}</h2>
      
      <p>Category: {{ $post->category->name }}</p>
      <dl class="dl-horizontal">
          <dt>Tags: 
              @foreach ($post->tags as $tag)
                <dd>{{ $tag->name }}</dd>
              @endforeach
          </dt>
      </dl>
       {!! Html::linkRoute('blog.show', 'Read More', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
    </article>

    @endforeach

@stop
