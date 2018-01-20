@extends('layouts.cms.admin')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Создать страницу</h3>
          <div class="box-tools">
            <div class="input-group input-group-sm">
              <div class="input-group-btn">
                <a href="{!! route('pages.create') !!}"><button type="submit" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i> Add New</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
    
            <div class="panel panel-default">
                <div class="panel-heading">
                    Статическая страница
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('static-pages::errorBasic')

                            {!! Form::model($page, ['route'=>['pages.store'],
                            'method' => 'POST',
                            'class'=>'form-horizontal', 'role'=>'form']) !!}
                            @include('static-pages::_form')
                            {!! Form::close() !!}
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

@stop

@section('scripts')
    <script src='/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function(){
             tinymce.init({
                selector: 'textarea',
                plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                 ],
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                image_advtab: true ,

                external_filemanager_path:"/filemanager/",
                filemanager_title:"Responsive Filemanager" ,
                a_plugin_option: true,
                a_configuration_option: 400,
                external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
                
            });
        });
    </script>
@stop
