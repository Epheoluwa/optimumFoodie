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
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                            <span class="fa fa-plus"></span> 
                            Add New User
                        </a>
                        <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" href="{{route('export.csv')}}">
                            <span class="fa fa-file-export"></span>
                            Download CSV
                        </a>
                    </div>

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
                                                <a class="dropdown-item btn-sm" style="cursor:pointer; background: red;
    color: white;" data-target="#DeleteModal{{$user->id}}" data-toggle="modal">Delete User</a>
                                                <?php foreach ($mealUserid as $userId) {
                                                    if ($user->id == $userId['user_id']) {
                                                        $exist = 'yes';
                                                        if ($exist == 'yes') {
                                                            break;
                                                        }
                                                    } else {
                                                        $exist = 'No';
                                                    }
                                                } ?>
                                                @if($exist == 'yes')
                                                <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('/admin/admin-view-meal-plan', $user->id)}}">View User Meal Plan</a>
                                                <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#editedmealModal{{$user->id}}">Upload Update Meal Plan</a>
                                                <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('/admin/user-food-options', $user->id)}}">View User Selected Food Options</a>
                                                @if($user->status == 'paid')
                                                <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#approveModal{{$user->id}}">Approve Meal Plan</a>
                                                @endif
                                                @endif
                                               
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
                                        <!-- Upload edited meal plan Modal-->
                                        <div class="modal fade" id="editedmealModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Upload Edited User Meal Plan</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form id="credit-form" action="{{url('/admin/uploadedmealplan', $user->id)}}" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="amount">Upload Document [Please note that only pdf format is allowed]</label>
                                                                        <input type="file" name="mealplan" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-primary" id="pay" type="submit">Upload Document</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Approve meal plan Modal-->
                                        <div class="modal fade" id="approveModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Approve User Meal Plan</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form id="credit-form" action="{{url('/admin/approvemealplan', $user->id)}}" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        Name: {{ $user->name }}
                                                                        <input type="hidden" name="useid" value="{{$user->id}}">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        Email: {{ $user->email }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-primary" id="pay" type="submit">Approve</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete User Modal-->
                                        <div class="modal fade" id="DeleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this user?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form id="credit-form" action="{{url('/admin/deleteuserDetails', $user->id)}}" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h4>Click "Delete" to erase user details and all meal plans.</h4>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        Name: {{ $user->name }}
                                                                        <input type="hidden" name="useid" value="{{$user->id}}">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        Email: {{ $user->email }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-danger" id="pay" type="submit">Delete</button>
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