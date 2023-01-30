<?php 
    $numberFormatter = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
    $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
    // dd(json_encode($foods));
?>
@extends('backend.master')

@section('header_css')
    <!-- Custom styles for this page -->
    <link href="{{ url('client-assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ url('suggests') }}/bootstrap-suggest.css" rel="stylesheet">

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
            <h1 class="h3 mb-0 text-gray-800">Meal & Alternates</h1>
        </div>


        <div id="content-wrapper">
            <div class="card mb-3">
                <div class="card-body">
                    <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                        <span class="fa fa-plus"></span> 
                        Create Meal & Alternates
                    </a>
                    <div class="table-responsive">
                        <form action="{{ url('/admin/meal-alternates') }}" method="get">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input name="q" class="form-control" required placeholder="Search using meal, alternates, etc...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Search">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered table-striped" id="dataTableX" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Category</th>
                                    <th>Meal</th>
                                    <th>Alternates</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 0;?>
                                @foreach($meals as $product)
                                    <tr class="warning">
                                        <td><?=++$sn?></td>
                                        <td>{{ $product->category->name }}</td>
                                        <td align="center">
                                            {!! $product->meal_composition ?? 'Snack meal <br><small><i>(options will be given)</i></small>' !!}
                                        </td>
                                        <td>
                                            @forelse($product->mealAlternates as $alt)
                                                <small style="display:block">
                                                    - {{ $alt->alternate }}
                                                </small>
                                            @empty
                                                No Alternate
                                            @endforelse
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-{{($product->status=='active')?'success':'danger'}}">{{ $product->status }}</button>
                                        </td>
                                        <td>
                                            <div class="btn-group" style="margin-bottom:5px">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="dropdown">
                                                    Action
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item btn-sm" style="cursor:pointer" href="#" data-toggle="modal" data-target="#editModal_{{ $product->id }}">Edit</a>
                                                    @if($product->status == 'active')
                                                    <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/meal-alternate-deactivate', $product->id)}}">Deactivate</a>
                                                    @else
                                                    <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/meal-alternate-activate', $product->id)}}">Re-activate</a>
                                                    @endif
                                                    <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/meal-alternate-delete', $product->id)}}">Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Edit Meal Modal-->
                                        <div class="modal fade" id="editModal_{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Meal Composition</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form id="credit-form" action="{{url('/admin/edit-meal-alternate',$product->id)}}" method="post">
                                                        <div class="modal-body">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="amount">Meal Category</label>
                                                                        <select class="form-control" name="category_id" required>
                                                                            <option value="">Select a Template</option>
                                                                            @foreach($categories as $value)
                                                                                <option value="{{ $value->id }}"{{ ($value->id==$product->category_id) ? ' selected': '' }}>{{ $value->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="amount">Meal Composition</label>
                                                                        <input name="meal_composition" class="form-control mealXX" value="{{ $product->meal_composition }}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" id="all-attributes-{{ $product->id }}">
                                                                <label for="amount">Meal Alternate</label>
                                                                @forelse($product->mealAlternates as $alt)
                                                                <div class="row form-group" id="Qx_{{ $product->id }}">
                                                                    <div class="col-md-10">
                                                                        <input name="meal_alternate[]" class="form-control mealXX" value="{{ $alt->alternate }}">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <button class="btn btn-danger times btn-sm" onclick="deleteQ('Qx_{{ $product->id }}')" type="button">× REMOVE</button>
                                                                    </div>
                                                                </div>
                                                                @empty
                                                                <div class="row form-group">
                                                                    <div class="col-md-12">
                                                                        <input name="meal_alternate[]" class="form-control mealXX">
                                                                    </div>
                                                                </div>
                                                                @endforelse
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
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
                                                            <button class="btn btn-secondary float-left" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-primary float-left" type="submit" onclick="return confirm('Are you sure you want to proceed?')">Update Meal Composition</button>
                                                            <button class="btn btn-success float-right" onclick="addQ('{{ $product->id }}')" type="button">Add Alternate</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $meals->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- Create Meal Modal-->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Meal Composition</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="credit-form" action="{{url('/admin/create-meal-alternate')}}" method="post">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="amount">Meal Category</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="">Select a Template</option>
                                        @foreach($categories as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="amount">Meal Composition</label>
                                    <input name="meal_composition" class="form-control mealXX" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="all-attributes">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="amount">Meal Alternate</label>
                                    <input name="meal_alternate[]" class="form-control mealXX">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
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
                        <button class="btn btn-secondary float-left" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary float-left" type="submit" onclick="return confirm('Are you sure you want to proceed?')">Create Meal Composition</button>
                        <button class="btn btn-success float-right" id="add-new-q" type="button">Add Alternate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer_js')
    <!-- Page level plugins -->
    <script src="{{ url('client-assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('client-assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('suggests') }}/bootstrap-suggest.js"></script>
    <script src="{{ url('suggests') }}/bootstrap-suggest.min.js"></script>


    <script type="text/javascript">
        var users = <?= json_encode($foods) ?>;

        function deleteQ(d){
            $('#'+d).remove();
        }
        function addQ(d){
            var content = $('.times');
            var newQ = `
                <div class="row form-group" id="Q_`+content.length+`">
                    <div class="col-md-10">
                        <input name="meal_alternate[]" class="form-control mealXX">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger times btn-sm" onclick="deleteQ('Q_`+content.length+`')" type="button">× REMOVE</button>
                    </div>
                </div>
            `;
            $('#all-attributes-'+d).append(newQ);

            $('.mealXX').suggest('[', {
              data: users,
              map: function(user) {
                return {
                  value: user.name+']',
                  text: '<strong>'+user.name+'</strong> <small>('+user.category+' family)</small>'
                }
              }
            });
        }


        $(document).ready( function () {
            $('.mealXX').suggest('[', {
              data: users,
              map: function(user) {
                return {
                  value: user.name+']',
                  text: '<strong>'+user.name+'</strong> <small>('+user.category+' family)</small>'
                }
              }
            });

            // $('#dataTableX').DataTable();

            $("#add-new-q").click(function(){
                var content = $('.times');
                var newQ = `
                    <div class="row form-group" id="Q_`+content.length+`">
                        <div class="col-md-10">
                            <input name="meal_alternate[]" class="form-control mealXX">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger times btn-sm" onclick="deleteQ('Q_`+content.length+`')" type="button">× REMOVE</button>
                        </div>
                    </div>
                `;
                $('#all-attributes').append(newQ);

                // $('.mealXX').suggest('@', {
                //   data: users,
                //   map: function(user) {
                //     return {
                //       value: user.name,
                //       text: '<strong>'+user.name+'</strong> <small>('+user.category+' family)</small>'
                //     }
                //   }
                // });
            });
        });
    </script>
@endsection