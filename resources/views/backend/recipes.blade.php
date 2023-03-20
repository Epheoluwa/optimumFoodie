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
        <h1 class="h3 mb-0 text-gray-800">Food Recipes</h1>
    </div>

</div>


<div id="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-body">
                <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                    <span class="fa fa-plus"></span>
                    Add New Template Recipe
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Template</th>
                                <th>Food Option</th>
                                <th>Food Recipe</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sn = 0; ?>
                            @foreach($foodrecipes as $frec)
                            <tr class="warning">
                                <td><?= ++$sn ?></td>
                                <td>
                                    {{ $frec->calory_template_type_id }}
                                </td>
                                <td>
                                    <?php $foodOpt = implode(" and ",$frec->food_id  ) ?>
                                    {{ $foodOpt }}
                                </td>
                                <td>
                                    {{ $frec->recipe_id }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success">Active</button>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action &nbsp;
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#editModal{{$frec->id}}">Edit Recipe</a>
                                        </div>
                                    </div>

                                    <!-- Edit user Modal -->
                                    <div class="modal fade" id="editModal{{$frec->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Food Recipe</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form id="credit-form" action="{{url('/admin/edit-foodrecipe', $frec->id)}}" method="post">
                                                    <div class="modal-body">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="calory_template_type_id">Calory Template Category</label>
                                                                    <select class="form-control" name="calory_template_type_id" id="calory_template_type_id" required>
                                                                        <option value="">Select a Template</option>
                                                                        @foreach($calories as $value)
                                                                        <option value="{{ $value->calory }}cal {{ $value->template_name }}" {{ ($frec->calory_template_type_id==($value->calory . 'cal ' . $value->template_name))?' selected':'' }}>{{ $value->calory }}cal {{ $value->template_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <label for="food_option">Select Food Option</label>
                                                                    <select class="form-control" name="food_option[]" multiple id="food_option" required>
                                                                        <option value="">Select Food Option</option>
                                                                        @foreach($foods as $value)
                                                                        <option value="{{ $value->name }}" {{ ($frec->food_id==$value->name)?' selected':'' }}>{{ $value->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="recipes">Select Recipe</label>
                                                                    <select class="form-control" name="recipes" id="recipes" required>
                                                                        <option value="">Select Recipe</option>
                                                                        @foreach($recipes as $value)
                                                                        <option value="{{ $value->recipe }}" {{ ($frec->recipe_id==$value->recipe)?' selected':'' }}>{{ $value->recipe }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="status">Status</label>
                                                                <select class="form-control" name="status" id="status" required>
                                                                    <option value="active" {{ ($frec->status=='active')?' selected':'' }}>Active</option>
                                                                    <option value="inactive" {{ ($frec->status=='inactive')?' selected':'' }}>In-Active</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button class="btn btn-primary" id="pay" type="submit">Update Food Recipe</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Create New Food Recipe</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="credit-form" action="{{url('/admin/create-new-foodrecipe')}}" method="post">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="calory_template_type_id">Calory Template Category</label>
                                    <select class="form-control" name="calory_template_type_id" id="calory_template_type_id" required>
                                        <option value="">Select a Template</option>
                                        @foreach($calories as $value)
                                        <option value="{{ $value->calory }}cal {{ $value->template_name }}">{{ $value->calory }}cal {{ $value->template_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="food_option">Select Food Option</label>
                                    <select class="form-control" name="food_option[]" id="food_option" multiple data-placeholder="Select Food Option"  required>
                                        @foreach($foods as $value)
                                        <option value="{{ $value->name }}">{{ $value->name }}</option>
                                        <hr>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="recipes">Select Recipe</label>
                                    <select class="form-control" name="recipes" id="recipes" required>
                                        <option value="">Select Recipe</option>
                                        @foreach($recipes as $value)
                                        <option value="{{ $value->recipe }}">{{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">In-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="pay" type="submit">Create Food Recipe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
