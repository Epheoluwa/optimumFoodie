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
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    </div>


    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-body">
                    <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                        <span class="fa fa-plus"></span>
                        Create Category
                    </a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 0; ?>
                                @foreach($categories as $category)
                                <tr class="warning">
                                    <td><?= ++$sn ?></td>
                                    <td>
                                        {{ $category->name }}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-{{($category->status=='active')?'success':'danger'}}">{{ $category->status }}</button>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action &nbsp;
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if($category->status == 'active')
                                                <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/category-deactivate', $category->id)}}">Deactivate</a>
                                                @else
                                                <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/category-activate', $category->id)}}">Re-activate</a>
                                                @endif
                                                <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#editModal{{$category->id}}">Edit Category</a>
                                            </div>
                                        </div>

                                        <!-- Edit Category Modal-->
                                        <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form id="credit-form" action="{{url('/admin/edit-category', $category->id)}}" method="post">
                                                        <div class="modal-body">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="amount">Category Name</label>
                                                                        <input type="text" name="name" class="form-control" required value="{{ $category->name }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="amount">Status</label>
                                                                        <select class="form-control" name="status">
                                                                            <option value="active" {{ ($category->status=='active')?' selected':'' }}>Active</option>
                                                                            <option value="inactive" {{ ($category->status=='inactive')?' selected':'' }}>In-active</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-primary" id="pay" type="submit">Update Category</button>
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

        <!-- Create Category Modal-->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="credit-form" action="{{url('/admin/create-category')}}" method="post">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Category Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
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
    @endsection