@extends('layouts.cms.admin')

@section('content')

    <div class="modal fade" id="deleteModal" tabindex="-3" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="deleteModalLabel">Delete User</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="deleteBtn" type="button" class="btn btn-warning" href="#">Confirm Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users Table</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm">
                  <div class="input-group-btn">
                    <a href="{!! route('users.create') !!}"><button type="submit" class="btn btn-primary btn-xs pull-right"><i class="fa fa-user-plus"></i> Add New</button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                @if($users->count() === 0)
                    <div class="well text-center">No users found.</div>
                @else
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="200px" class="text-right">Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td><a href="{!! route('users.edit', [$user->id]) !!}">{!! $user->name !!}</a></td>
                                <td class="raw-m-hide">{!! $user->email !!}</td>
                                
                                <td class="text-right">
                                    <form method="post" action="{!! url('users/'.$user->id) !!}">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="delete-btn btn btn-xs btn-danger pull-right" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                    <a class="btn btn-xs btn-default pull-right raw-margin-right-8" href="{!! route('users.edit', [$user->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>
@endsection
