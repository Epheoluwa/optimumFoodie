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
        <div class="mb-4">
            <h1 class="h3 text-gray-800">
                Customer Update

                <code class="float-right mt-2">
                    <b>WALLET:</b> ₦ {{ number_format($wallet->clientBalance($customer->id), 2) }}
                </code>
            </h1>
        </div>


        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div id="myTabContent" class="tab-content">
                       <div class="tab-pane active" id="profile">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <i class="fas fa-edit"></i>
                                        USER PROFILE
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-success btn-sm mr-2 float-right mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#creditModal">
                                            <span class="fa fa-plus"></span> 
                                            Credit Wallet
                                        </a>
                                        <a class="btn btn-danger btn-sm mr-2 float-right mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#debitModal">
                                            <span class="fa fa-minus"></span> 
                                            Debit Wallet
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form id="personalInformation" action="{{url('admin/update-user-profile',$id)}}" method="post" class="mb-4">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" value="{{ucwords($customer->first_name)}}" class="form-control" name="first_name">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" value="{{ucwords($customer->last_name)}}" class="form-control" name="last_name">
                                            </div>
                                            <div class="form-group">
                                                <label>Userame</label>
                                                <input type="text" value="{{strtolower($customer->username)}}" class="form-control" name="username" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Email ID</label>
                                                <input type="text" readonly value="{{$customer->email}}" class="form-control"required>
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="text" value="{{$customer->phone_number}}" class="form-control" name="phone_number" required>
                                            </div>
                                            <div class="form-group">
                                                <label>User Type</label>
                                                <select class="form-control" required name="role_id">
                                                    <?php
                                                        $roles = \App\Models\Role::where('id','>=',$customer->role_id)->get();
                                                    ?>
                                                    @foreach($roles as $key=>$value)
                                                        <option value="{{ $value->id }}"{{ ($customer->role_id==$value->id)?' selected':'' }}>{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="active"{{ ($customer->status=='active')?' selected':'' }}>Active</option>
                                                    <option value="inactive"{{ ($customer->status=='inactive')?' selected':'' }}>In-active</option>
                                                </select>
                                                <br>
                                            </div>
                                            <!--<a href="{{url('admin/upgrade-to-reseller',$id)}}" class="btn btn-success">-->
                                            <!--    <span class="fas fa-level-up"></span>-->
                                            <!--    Upgrade to Reseller-->
                                            <!--</a>-->
                                            <button class="btn btn-primary" type="submit">Update Now</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>
                                            <b>Reserved Accounts</b>
                                            
                                            <a class="btn btn-primary btn-sm float-right mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                                                <span class="fa fa-plus"></span> 
                                                Create Virtual Account
                                            </a>
                                        </h5>
                                        <div class="table-responsive" style="font-size:12px !mportant">
                                            <?php
                                                $wallets = \App\Models\ReservedAccountNumber::where(['user_id'=>$customer->id, 'status'=>'active'])->orderBy('id','DESC')->get();
                                            ?>
                                            <table class="table table-bordered table-striped" id="dataTableX" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Bank</th>
                                                        <th>Number</th>
                                                        <th>Charges</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($wallets as $wallet)
                                                        <tr class="warning">
                                                            <td style="font-size:12px">{{ $wallet->account_name }}</td>
                                                            <td style="font-size:12px">{{ $wallet->account_bank }}</td>
                                                            <td style="font-size:12px">{{ $wallet->account_number }}</td>
                                                            <td style="font-size:12px">
                                                                <small><b>Flat: </b> N{{ number_format($wallet->fee_flat, 2) }}</small><br>
                                                                <small><b>Perc: </b> {{ number_format($wallet->fee_percentage, 2) }}%</small>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

    <!-- Wallet Credit Modal-->
    <div class="modal fade" id="creditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="modal fade" id="debitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <!-- Create Virtual Account Modal-->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Virtual Account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="credit-form" action="{{url('/admin/create-reserved-account')}}" method="post">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <small style="color:red;white-space:normal;" class="p-2">
                                    <u>NOTE: </u>
                                    The below charges will apply whenever customer makes payment into the virtual account. This means if you
                                    add both a percentage charge of 1% and a flat charge of N50, and the customer makes payment of N1,000, 
                                    the customer will be charged a total of N60:<br><br>
                                    N10 being 1% of N1,000<br>
                                    N50 being the flat<br>
                                </small>
                                <div class="col-md-6">
                                    <label>Percentage Charge</label>
                                    <input type="number" name="fee_percentage" class="form-control" required>
                                    <input type="hidden" name="user_id" value="{{ $customer->id }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Flat Charge</label>
                                    <input type="number" name="fee_flat" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Select Provider</label>
                                    <select class="form-control" name="bank">
                                        <option value="035">Wema Bank</option>
                                        <option value="232">Sterling Bank</option>
                                        <option value="50515">MoniePoint Bank</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Status</label>
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
                        <button class="btn btn-primary" id="pay" type="submit">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

                                    </div>
                                </div>
                            </div>
                       </div>
                   </div>
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