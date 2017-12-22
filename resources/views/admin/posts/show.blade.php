@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <b>{{$post->title}}</b>
                </div>
                <div class="card-block">
                    {!! $post->content !!}
                </div>
                <div class="card-footer text-muted">
                    <div class="pull-right">
                        <a title="Edit article" href="{{ url('/posts/edit/'.$post->id) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                        <button title="Delete article" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_article_{{ $post->id  }}"><span class="fa fa-trash-o"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_article_{{ $post->id  }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <form class="" action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header bg-red">
                        <h4 class="modal-title" id="mySmallModalLabel">Delete article</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body">
                        Are you sure to delete article: <b>{{ $post->title }} </b>?

                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/posts') }}">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        </a>
                        <button type="submit" class="btn btn-outline" title="Delete" value="delete">Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection