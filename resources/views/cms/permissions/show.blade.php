@extends('layouts.cms.admin')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Dewtails Permissions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

    <div class="panel panel-default">


        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Title</th>
                        <td>{{ $permission->title }}</td></tr>
                        <tr><th>Description</th>
                        <td>{{ $permission->description }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('permissions.index') }}" class="btn btn-default">Back to list</a>
        </div>
      </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box -->
      </div>
      </div>
      </section>
      @stop
