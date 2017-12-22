@extends('layouts.admin')

@section('content')
    @if (Session::get('message') != Null)
    <div class="row">
        <div class="col">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('message') }}
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col">
            <form action="{{ route('posts.update',['id' => $post->id]) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card">
                <div class="card-header">
                    Edit article
                </div>
                <div class="card-block">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" class="form-control" type="text" value="{{ $post->title }}" placeholder="title of article">
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" rows="10">{{ $post->content }}</textarea>
                    </div>

                </div>
                <div class="card-footer text-muted">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection