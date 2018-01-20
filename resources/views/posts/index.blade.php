@extends('layouts.blog')

@section('content')
{{ Breadcrumbs::render('blog') }}
  @foreach ($posts as $post)
  
   <div class="blog-post">
     <h2 class="blog-post-title"><a href="/blog/{{$post->id}}">{{$post->title}}</a></h2>
       <p class="blog-post-meta">{{$post->created_at}}</p>
       <p class="">
       {!! Html::linkRoute('blog.category', $post->category->name, array($post->category_id), array('class' => 'badge badge-pill badge-info')) !!}
       </p>
    </div><!-- /.blog-post -->
          
  @endforeach
@stop