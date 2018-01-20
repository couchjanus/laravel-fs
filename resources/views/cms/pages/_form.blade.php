
<div class="form-group">
    {!! Form::label('title', '', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('title', $page->title, ["class"=>"form-control",'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('content', '', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::textarea('content', null, ["class"=>"form-control", "id" => "editor"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Meta description', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('description', $page->description, ["class"=>"form-control"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tags', 'Meta tags', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('tags', $page->tags, ["class"=>"form-control",
        "placeholder"=>'Meta tags', 'data-role' => "tagsinput"]) !!}
    </div>
</div>

<hr/>

<div class="form-group">
    {!! Form::label('slug', 'Slug', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('slug', null, ["class"=>"form-control",
        "placeholder"=>'Slug','required', 'pattern' => '^[\w\-]+$' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>