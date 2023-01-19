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
            <h1 class="h3 mb-0 text-gray-800">Wallet Transactions</h1>
        </div>


        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div id="myTabContent" class="tab-content">
                       <div class="tab-pane active" id="profile">
                            <div class="card-header">
                                <i class="fas fa-edit"></i>
                                WALLET TRANSACTIONS
                            </div>
                            <div class="card-body mt-3">
                                <table class="table table-bordered table-striped" id="dataTableX" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client Info</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>TransactionID</th>
                                            <th>Type</th>
                                            <th>Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr class="warning">
                                                <td>{{ $order->id }}</td>
                                                <td>
                                                    <?php
                                                        $ssr = \App\User::find($order->user_id);
                                                    ?>
                                                    <small><i class="fa fa-user"></i> {{$ssr->name}}</small>
                                                    <small><i class="fa fa-envelope"></i> 
                                                        <a href="{{ url('admin/user-profile', $ssr->id) }}">{{$ssr->email}}</a>
                                                    </small>
                                                    <small><i class="fa fa-phone"></i> {{$ssr->phone}}</small>
                                                    <hr>
                                                    <small>
                                                        <a href="{{ url('admin/wallet-log?user='.$order->user_id) }}">View User's Wallet Logs</a>
                                                    </small>
                                                    <small>
                                                        <a href="{{ url('admin/transactions?user='.$order->user_id) }}">View User's Transaction History</a>
                                                    </small>
                                                </td>
                                                <td>
                                                    <small>{{ $order->description }}</small>
                                                </td>
                                                <td>
                                                    <small style="text-align:center;color:{{ ($order->type=='credit') ? 'darkgreen': (($order->type=='debit') ? 'darkred': 'black') }}">
                                                        {{ ($order->type=='credit') ? '+': (($order->type=='debit') ? '-': '±') }} ₦{{ number_format($order->amount, 2) }}
                                                    </small>
                                                    <i style="display:block;">{{ $order->type }}</i>
                                                </td>
                                                <td><small>{{ $order->transactionId }}</small></td>
                                                <td>
                                                    <i style="display:block;">{{ $order->channel }}</i>
                                                    @if($order->admin_id)
                                                        <small>{{ \App\Models\Admin::find($order->admin_id)->name }}</small>
                                                    @endif
                                                </td>
                                                <td>
                                                    <small>{{date("D, M jS, Y g:iA", strtotime($order->created_at))}}</small>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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