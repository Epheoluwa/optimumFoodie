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
            <h1 class="h3 mb-0 text-gray-800">Food Options</h1>
        </div>


        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-body">
                        <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                            <span class="fa fa-plus"></span> 
                            Create Food
                        </a>
                        <div class="table-responsive">
                            <form action="{{ url('/admin/products') }}" method="get">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input name="q" class="form-control" required placeholder="Search using food name, category, etc...">
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
                                        <th>Food</th>
                                        <th>Alternates</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 0;?>
                                    @foreach($products as $product)
                                        <tr class="warning">
                                            <td><?=++$sn?></td>
                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            <td>
                                                @if($product->alternates)
                                                    <?php 
                                                        $pIDs = explode(",",$product->alternates);
                                                        $pS = \App\Models\Product::whereIn('id',$pIDs)->pluck('name')->toArray();
                                                    ?>
                                                    {{ (is_array($pS) && !empty($pS)) ? implode(', ', $pS): 'No Alternative Food' }}
                                                @else
                                                    No Alternative Food
                                                @endif
                                            </td>
                                            <td>
                                                <code>{{ $product->category->name }}</code>
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
                                                        @if($product->status == 'active')
                                                        <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/product-deactivate', $product->id)}}">Deactivate</a>
                                                        @else
                                                        <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/product-activate', $product->id)}}">Re-activate</a>
                                                        @endif
                                                        <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#editModal{{$product->id}}">Edit Food</a>
                                                    </div>
                                                </div>

        <!-- Edit Food Modal-->
        <div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Food</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="credit-form" action="{{url('/admin/edit-product', $product->id)}}" method="post">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="amount">Food Name</label>
                                        <input type="text" name="name" class="form-control" required value="{{ $product->name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="amount">Food Category</label>
                                        <select class="form-control" name="category_id" required>
                                            <option value="">Select a Category</option>
                                            @foreach($categories as $value)
                                                <option value="{{ $value->id }}"{{ ($product->category_id==$value->id)?' selected':'' }}>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label style="display:block;">Alternate Food(s)</label>
                                        <select class="form-control js-example-basic-multiple" name="alternatePids[]" multiple="multiple" style="width:100%">
                                            <?php 
                                                $pIDs = explode(",",$product->alternates);
                                            ?>
                                            @foreach($products as $value)
                                                @if($value->id != $product->id)
                                                    <option value="{{ $value->id }}"{{ (in_array($value->id, $pIDs))?' selected':'' }}>{{ $value->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="amount">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="active"{{ ($product->status=='active')?' selected':'' }}>Active</option>
                                            <option value="inactive"{{ ($product->status=='inactive')?' selected':'' }}>In-active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="pay" type="submit">Update Food</button>
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
                            {!! $products->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>

        <!-- Create Food Modal-->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Food</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="credit-form" action="{{url('/admin/create-product')}}" method="post">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="amount">Food Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="amount">Food Category</label>
                                        <select class="form-control" name="category_id" required>
                                            <option value="">Select a Category</option>
                                            @foreach($categories as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label style="display:block;">Alternate Food(s)</label>
                                        <select class="form-control js-example-basic-multiple" name="alternatePids[]" multiple="multiple" style="width:100%">
                                            @foreach($products as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="pay" type="submit">Create Food</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ url('client-assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('client-assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
            // $('#dataTableX').DataTable();

            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection