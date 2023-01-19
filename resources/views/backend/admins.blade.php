@extends('backend.master')

@section('header_css')
    <!-- Custom styles for this page -->
    <link href="{{ url('client-assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        label{
            font-size: 13px;
        }
        .modal-body{
            padding: 20px;
        }
        small{
            white-space: nowrap;
        }
    </style>
@endsection

@section('body_content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Admins</h1>
        </div>


        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-body">
                        @if(in_array(\Session::get('admin_role'), ['super-admin']))
                            <a class="btn btn-primary text-white mb-3" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                                <span class="fa fa-plus"></span> 
                                Create an Admin
                            </a>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTableX" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 0;?>
                                    @foreach($admins as $admin)
                                        <tr class="warning">
                                            <td><?=++$sn?></td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->phone }}</td>
                                            <td>{{ $admin->role }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-{{($admin->status=='active')?'success':'danger'}}">{{ $admin->status }}</button>
                                            </td>
                                            <td>
                                                @if($admin->id!=1 || (\Session::get('admin_role')=='super-admin'))
                                                    <div class="btn-group" style="margin-bottom:5px">
                                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="dropdown">
                                                            Action
                                                        </button>
                                                        <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @if($admin->status == 'active')
                                                                <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/admin-deactivate', $admin->id)}}">Deactivate</a>
                                                            @else
                                                                <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/admin-activate', $admin->id)}}">Re-activate</a>
                                                            @endif
                                                            @if(in_array(\Session::get('admin_role'), ['super-admin']))
                                                                <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#passModal{{$admin->id}}">Password Change</a>
                                                            @endif
                                                            <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#editModal{{$admin->id}}">Edit Admin</a>
                                                        </div>
                                                    </div>

<!-- Edit Product Modal-->
<div class="modal fade" id="editModal{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Admin</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="credit-form" action="{{url('/admin/edit-admin', $admin->id)}}" method="get">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="amount">Full Name</label>
                                <input type="text" name="name" class="form-control" required value="{{ $admin->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="amount">Email</label>
                                <input type="email" class="form-control" readonly value="{{ $admin->email }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="amount">Phone</label>
                                <input type="tel" name="phone" class="form-control" required value="{{ $admin->phone }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="amount">Status</label>
                                <select class="form-control" name="status">
                                    <option value="active"{{ ($admin->status=='active')?' selected':'' }}>Active</option>
                                    <option value="inactive"{{ ($admin->status=='inactive')?' selected':'' }}>In-active</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="amount">Role</label>
                                <select class="form-control" name="role">
                                    @foreach($adminRoles as $ar)
                                        @if(in_array(\Session::get('admin_role'), ['super-admin']))
                                            <option value="{{ $ar->role }}"{{ ($admin->role==$ar->role)?' selected':'' }}>{{ $ar->name }}</option>
                                        @elseif(!in_array($ar->role, ['super-admin']))
                                            <option value="{{ $ar->role }}"{{ ($admin->role==$ar->role)?' selected':'' }}>{{ $ar->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="pay" type="submit">Update Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Password Modal-->
<div class="modal fade" id="passModal{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update {{ $admin->name }} Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="credit-form" action="{{url('/admin/force-change-password',$admin->id)}}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="amount">New Password</label>
                                <input type="text" name="new_password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="pay" type="submit">Update Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
                                            @else
                                                <i>ACCESS_DENIED</i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        <!-- Create Product Modal-->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Admin</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="credit-form" action="{{url('/admin/create-admin')}}" method="post">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="amount">Full Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="amount">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="amount">Phone</label>
                                        <input type="tel" name="phone" class="form-control" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="amount">Role</label>
                                        <select class="form-control" name="role">
                                            @foreach($adminRoles as $ar)
                                                @if(in_array(\Session::get('admin_role'), ['super-admin']))
                                                    <option value="{{ $ar->role }}">{{ $ar->name }}</option>
                                                @elseif(!in_array($ar->role, ['super-admin']))
                                                    <option value="{{ $ar->role }}">{{ $ar->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="amount">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">In-active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="pay" type="submit">Create Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_js')
    <!-- Page level plugins -->
    <script src="{{ url('client-assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('client-assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#dataTableX').DataTable();
        });
    </script>
@endsection