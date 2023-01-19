@extends('backend.master')

@section('body_content')
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
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">System Settings</h1>
        </div>

        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-body">
                        <form id="recharge-bill" action="{{url('admin/save-settings')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Paystack ON</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12">
                                                    <select class="form-control" name="paystack_active">
                                                        <option value="1" {{ ($settings->paystack_active==1) ? 'selected': '' }}>YES</option>
                                                        <option value="0" {{ ($settings->paystack_active==0) ? 'selected': '' }}>NO</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="fas fa-save"></span> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Ravepay ON</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12">
                                                    <select class="form-control" name="rave_active">
                                                        <option value="1" {{ ($settings->rave_active==1) ? 'selected': '' }}>YES</option>
                                                        <option value="0" {{ ($settings->rave_active==0) ? 'selected': '' }}>NO</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="fas fa-save"></span> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Bank</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12">
                                                    <input type="text" name="bank" class="form-control" value="{{ $settings->bank }}" placeholder="Enter a Bank">
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="fas fa-save"></span> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Account Name</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12">
                                                    <input type="text" name="account_name" class="form-control" value="{{ $settings->account_name }}" placeholder="Enter Account Name">
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="fas fa-save"></span> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Account Number</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12">
                                                    <input type="text" name="account_no" class="form-control" value="{{ $settings->account_no }}" placeholder="Enter Account Number">
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="fas fa-save"></span> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Phone Number</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12">
                                                    <input type="text" name="phone" class="form-control" value="{{ $settings->phone }}" placeholder="Enter Contact Number">
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="fas fa-save"></span> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Email Address</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12">
                                                    <input type="text" name="email" class="form-control" value="{{ $settings->email }}" placeholder="Enter Email Address">
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="fas fa-save"></span> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Transaction Prefix</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12">
                                                    <input type="text" name="prefix" class="form-control" value="{{ $settings->prefix }}" placeholder="Enter Prefix">
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="fas fa-save"></span> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Office Address</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12">
                                                    <input type="text" name="address" class="form-control" value="{{ $settings->address }}" placeholder="Enter Address">
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="fas fa-save"></span> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary btn-block" type="submit">
                                <span class="fas fa-save"></span> Save Settings
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection