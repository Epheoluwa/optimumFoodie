@extends('backend.master')

@section('body_content')
<style>
    label {
        font-size: 13px;
    }

    .modal-body {
        padding: 20px;
    }

    small {
        white-space: nowrap;
    }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>


    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-body">
                    <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                        <span class="fa fa-plus"></span>
                        Add New User
                    </a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 0; ?>
                                @foreach($user as $user)
                                <tr class="warning">
                                    <td><?= ++$sn ?></td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-{{($user->status=='paid')?'success':'danger'}}">{{ $user->status }}</button>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action &nbsp;
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#editModal{{$user->id}}">Edit User</a>
                                            </div>
                                        </div>

                                        <!-- Edit user Modal-->
                                        <div class="modal fade" id="editModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form id="credit-form" action="{{url('/admin/edit-user', $user->id)}}" method="post">
                                                        <div class="modal-body">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="amount">Name</label>
                                                                        <input type="text" name="name" class="form-control" required value="{{ $user->name }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>Email</label>
                                                                        <input type="email" name="email" class="form-control" required value="{{ $user->email }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="amount">Status</label>
                                                                        <select class="form-control" name="status">
                                                                            <option value="paid" {{ ($user->status=='paid')?' selected':'' }}>Paid</option>
                                                                            <option value="free" {{ ($user->status=='free')?' selected':'' }}>Free</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-primary" id="pay" type="submit">Update User</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Create user Modal-->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create user</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="credit-form" action="{{url('/admin/create-new-user')}}" method="post">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                        <input type="hidden" value="123456" name="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="paid">Paid</option>
                                            <option value="free">Free</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="pay" type="submit">Create User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection