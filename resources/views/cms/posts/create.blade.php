@extends('layouts.cms.admin')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add New Post</h3>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                {!! Form::open(['method' => 'POST', 'enctype' => "multipart/form-data", 'route' => 'articles.store', 'class' => 'add']) !!}

                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('title'))
                                    <p class="help-block">
                                        {{ $errors->first('title') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
                                {!! Form::textarea('content', old('content'), array('class' => 'form-control')) !!}
                                <p class="help-block"></p>
                                @if($errors->has('content'))
                                    <p class="help-block">
                                        {{ $errors->first('content') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('category_id', 'Select Category:') !!}
                                {!! Form::select('category_id', $categories, null, ['id' => 'category_id', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('tag_list', 'Tags:') !!}
                                {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                            {!! Form::label('post_thumbnail', 'Thumbnail', ['class' => 'control-label']) !!}
                            {!! Form::file('post_thumbnail', ['class' => 'form-control']) !!}
						    </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="form-group text-right">
                    <a href="{!! route('articles.index') !!}" class="btn btn-default raw-left">Cancel</a>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>

@endsection

@section('javascript')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose A Tags',
            tags: true
        });
    </script>
   
@stop
