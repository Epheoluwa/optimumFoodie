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
        <h1 class="h3 mb-0 text-gray-800">Add New Recipes</h1>
    </div>

</div>

<div id="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-body">
                <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                    <span class="fa fa-plus"></span>
                    Add New Recipe
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Recipe</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sn = 0; ?>
                            @foreach($recipe as $rec)
                            <tr class="warning">
                                <td><?= ++$sn ?></td>
                                <td>
                                    {{ $rec->title }}
                                </td>
                                <td>
                                    @foreach( $recipeDel as $reci )
                                    <small style="display:block">
                                        - {{ $reci }}
                                    </small>

                                    @endforeach
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
                                            <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#editModal{{$rec->id}}">Edit Recipe</a>
                                            <form id="credit-form" action="{{url('/admin/delete-recipe')}}" method="post">
                                            {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$rec->id}}" >
                                                <button class="dropdown-item btn-sm" style="cursor:pointer; background: red;
    color: white;" id="pay" type="submit">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>

                                    <!-- Edit user Modal-->
                                    <div class="modal fade" id="editModal{{$rec->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Recipe</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form id="credit-form" action="{{url('/admin/edit-recipe', $rec->id)}}" method="post">
                                                            <div class="modal-body">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="amount">Title</label>
                                                                            <input type="text" name="title" class="form-control" required value="{{ $rec->title }}">
                                                                        </div>
                                                                        <div class="col-md-12" id="all-attributes-{{ $rec->id }}">
                                                                            <label for="amount">Recipe</label>
                                                                           
                                                                            <Textarea name="recipe" class="form-control mealXX">
                                                                            @foreach($recipeDel as $reci)
                                                                                {{$reci}}
                                                                                @endforeach
                                                                            </Textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <button class="btn btn-primary" id="pay" type="submit">Update Recipe</button>
                                                                <!-- <button class="btn btn-success float-right" onclick="addQ('{{ $rec->id }}')" type="button">Add Recipe</button> -->
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Recipe</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="credit-form" action="{{url('/admin/addrecipepost')}}" method="post">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="calory_template_type_id"> Title</label>
                                    <input type="text" class="form-control" name="title" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="all-attributes">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="amount">Recipe Details</label>
                                    <!-- <input name="recipe[]" class="form-control mealXX"> -->
                                    <Textarea name="recipe" class="form-control mealXX"></Textarea>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group" id="all-attributes">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="amount">Recipe Details</label>
                                    <input name="recipe[]" class="form-control mealXX">
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary float-left" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary float-left" type="submit" onclick="return confirm('Are you sure you want to proceed?')">Create Recipe</button>
                        <!-- <button class="btn btn-success float-right" id="add-new-q" type="button">Add Recipes</button> -->
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
<script src="{{ url('suggests') }}/bootstrap-suggest.js"></script>
<script src="{{ url('suggests') }}/bootstrap-suggest.min.js"></script>

<script type="text/javascript">
    function deleteQ(d) {
        $('#' + d).remove();
    }

    function addQ(d) {
        var content = $('.times');
        var newQ = `
                <div class="row form-group" id="Q_` + content.length + `">
                    <div class="col-md-10">
                        <input name="recipe[]" class="form-control mealXX">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger times btn-sm" onclick="deleteQ('Q_` + content.length + `')" type="button">× REMOVE</button>
                    </div>
                </div>
            `;
        $('#all-attributes-' + d).append(newQ);
    }


    $(document).ready(function() {

        // $('#dataTableX').DataTable();

        $("#add-new-q").click(function() {
            var content = $('.times');
            var newQ = `
                    <div class="row form-group" id="Q_` + content.length + `">
                        <div class="col-md-10">
                            <input name="recipe[]" class="form-control mealXX">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger times btn-sm" onclick="deleteQ('Q_` + content.length + `')" type="button">× REMOVE</button>
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