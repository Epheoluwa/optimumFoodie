<?php
    $wallet = app('App\Http\Controllers\WalletController');
    $commCtrl = app('App\Http\Controllers\CommissionController');
    $permission = app('App\Http\Controllers\Admin\PermissionController');
?>
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
            <h1 class="h3 mb-0 text-gray-800">All Customers</h1>
        </div>


        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{url('/admin/search-users')}}" method="get">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input name="string" class="form-control" required placeholder="Search using email, name, city, phone, etc...">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Search">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Details</th>
                                            <th>Role</th>
                                            <th>Balance</th>
                                            <th>Join Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sn = 0;?>
                                    @foreach($customers as $customer)
                                        <tr class="warning">
                                            <td><?=++$sn?></td>
                                            <td>
                                                <small style="display:block;white-space:nowrap">
                                                    <b>NAME:</b> {{ (!empty($customer->first_name)) ? ucwords($customer->first_name).' '.ucwords($customer->last_name): "UNKNOWN" }}
                                                </small>
                                                <small style="display:block;white-space:nowrap">
                                                    <b>EMAIL:</b> {{ strtolower($customer->email) }}
                                                </small>
                                                <small style="display:block;white-space:nowrap">
                                                    <b>PHONE:</b> {{$customer->phone_number}}
                                                </small>
                                                @if($customer->role_id == 4)
                                                <small style="display:block;white-space:nowrap">
                                                    <b>AFF. LINK:</b> <a href="{{ url('/?aff_id='.$customer->id) }}">{{ url('/?aff_id='.$customer->id) }}</a>
                                                </small>
                                                @endif
                                                <hr>
                                                <small style="display:block;white-space:nowrap">
                                                    <a href="{{ url('admin/wallet-log?user='.$customer->id) }}">View User's Wallet Logs</a>
                                                </small>
                                                <small style="display:block;white-space:nowrap">
                                                    <a href="{{ url('admin/transactions?user='.$customer->id) }}">View User's Transaction History</a>
                                                </small>
                                            </td>
                                            <td>{{ $customer->role->name }}</td>
                                            <td>
                                                <small style="display:block;white-space:nowrap">
                                                    <b>WALLET:</b> ₦ {{ number_format($wallet->clientBalance($customer->id), 2) }}
                                                </small>
                                                <!-- <small style="display:block;white-space:nowrap">
                                                    <b>COMMISSION:</b> ₦ {{ number_format($commCtrl->commissionBalance($customer->id), 2) }}
                                                </small> -->
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('jS F, Y, h:iA') }}</td>
                                            <td>{{($customer->is_deleted=='0') ? 'Active' : 'Inactive'}}</td>
                                            <td>
                                                <div class="btn-group" style="margin-bottom:5px">
                                                    <button type="button" data-toggle="dropdown" class="btn btn-danger">
                                                        Pick an Action
                                                    </button>
                                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if($customer->is_deleted == '0')
                                                            <a class="dropdown-item" style="cursor:pointer" href="{{url('admin/user-deactivate', $customer->id)}}">Block User</a>
                                                        @else
                                                            <a class="dropdown-item" style="cursor:pointer" href="{{url('admin/user-activate', $customer->id)}}">Unblock User</a>
                                                        @endif
                                                        <?php $permChk = $permission->checkUserHasRightToPage('credit-wallet', \Session::get('role')); ?>
                                                        @if($permChk != FALSE)
                                                        @endif
                                                            <a class="dropdown-item" style="cursor:pointer" data-toggle="modal" data-target="#creditModal{{$customer->id}}">Credit Wallet</a>
                                                            <a class="dropdown-item" style="cursor:pointer" data-toggle="modal" data-target="#debitModal{{$customer->id}}">Debit Wallet</a>
                                                        <?php $permChk = $permission->checkUserHasRightToPage('reset-2fa-pin', \Session::get('role')); ?>
                                                        @if($permChk != FALSE)
                                                        @endif
                                                            <!-- <a class="dropdown-item" style="cursor:pointer" data-toggle="modal" data-target="#pinModal{{$customer->id}}">Reset 2FA PIN</a> -->
                                                        <?php $permChk = $permission->checkUserHasRightToPage('edit-user', \Session::get('role')); ?>
                                                        @if($permChk != FALSE)
                                                        @endif
                                                            <a class="dropdown-item" style="cursor:pointer" href="{{url('admin/user-profile', $customer->id)}}">Edit User</a>
                                                    </div>
                                                </div>

    <!-- Wallet Credit Modal-->
    <div class="modal fade" id="creditModal{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Credit Wallet</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="credit-form" action="{{url('/admin/confirm-credit')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="amount">Enter Amount</label>
                            <input type="number" name="amount" class="form-control" id="amount" required placeholder="0.00">
                            <input type="hidden" name="user_id" value="{{$customer->id}}" required>
                            <input type="hidden" name="transactionId" value="{{'AWC-'.time().rand(10000,99999)}}">
                        </div>
                        <button class="btn btn-primary" id="pay" type="submit">Credit Wallet</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Wallet Debit Modal-->
    <div class="modal fade" id="debitModal{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Debit Wallet</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="credit-form" action="{{url('/admin/confirm-debit')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="amount">Enter Amount</label>
                            <input type="number" name="amount" class="form-control" id="amount" required placeholder="0.00">
                            <input type="hidden" name="user_id" value="{{$customer->id}}" required>
                            <input type="hidden" name="transactionId" value="{{'AWC-'.time().rand(10000,99999)}}">
                        </div>
                        <button class="btn btn-primary" id="pay" type="submit">Debit Wallet</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 2FA PIN Reset Modal-->
    <div class="modal fade" id="pinModal{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">2FA PIN Reset</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="credit-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            By clicking on the <b>PROCEED</b> button below, you will reset this user's 2FA PIN. 
                            
                            <h5><br>Are you sure you want to PROCEED?</h5>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" id="pay" href="{{url('/admin/reset-pin', $customer->id)}}">PROCEED</a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $customers->links("pagination::bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

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