@extends('layouts.cms.admin')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Статические страницы</h3>
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
              
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <!--<th>#</th>  -->
                                <th>Заголовок</th>
                                <th>Slug</th>
                                <th>Мета тег tags</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ $page->tags }}</td>
                                    <td>
                                        <a href="{!! route('pages.edit', [$page->id]) !!}"
                                           data-toggle="tooltip"
                                           data-original-title="Редактитровать"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        {!! Form::open(['route' => ['pages.destroy', $page->id],
                                        'class' => 'form-horizontal confirm',
                                        'role' => 'form', 'method' => 'DELETE']) !!}
                                        <button data-toggle="tooltip"
                                                data-original-title="Удалить"
                                                type="submit" class="btn btn-danger confirm-btn">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
                <div class="panel-footer">
                    <div class="text-center">{!! $pages->render() !!}</div>
                </div>
            </div>
            <!-- /.panel -->
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
  </div>
</section>

@endsection
