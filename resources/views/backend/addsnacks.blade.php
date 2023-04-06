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
        <h1 class="h3 mb-0 text-gray-800"> Snack</h1>
    </div>

</div>

<div id="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-body">
                <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                    <span class="fa fa-plus"></span>
                    Add New Snack
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Template</th>
                                <th>Snack Option List</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sn = 0; ?>
                            @foreach($snacks as $snack)

                            <tr class="warning">
                                <td><?= ++$sn ?></td>
                                <td>
                                    @foreach($snack->template as $temp)
                                    <p style="font-size: 15px"> {{$temp}}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($snack->snack as $sac)
                                    <small style="display:block">
                                        - {{$sac}} OR
                                    </small>
                                    @endforeach
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action &nbsp;
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#editModal{{$snack->id}}">Edit Snack</a>
                                        
                                        </div>
                                        <!-- Edit user Modal-->
                                        <div class="modal fade" id="editModal{{$snack->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Snackß</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form id="credit-form" action="{{url('/admin/edit-snack', $snack->id)}}" method="post">
                                                        <div class="modal-body">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="amount">Select Template</label>
                                                                        <select class="form-control" name="calory_template_type_id[]" id="calory_template_type_id" multiple data-placeholder="Select Template" required>
                                                                            @foreach($calories as $value)
                                                                            <?php $fullcal = $value->calory. 'cal' . $value->template_name; 
                                                                            ?>
                                                                            <option value="{{ $value->calory }}cal {{ $value->template_name }}"
                                                                           {{is_array($snack->template) && in_array($value->calory."cal".$value->template_name , $snack->template)? 'selected' : ''}}
                                                                            >{{ $value->calory }}cal {{ $value->template_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12" id="all-attributes-{{ $snack->id }}">
                                                                        <label for="amount">Snacks</label>
                                                                        @forelse($snack->snack as $sac)
                                                                        <div class="row form-group" id="Qx_{{ $snack->id }}">
                                                                            <div class="col-md-10">
                                                                                <input name="snack[]" class="form-control mealXX" value="{{ $sac }}">
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <button class="btn btn-danger times btn-sm" onclick="deleteQ('Qx_{{ $snack->id }}')" type="button">× REMOVE</button>
                                                                            </div>
                                                                        </div>
                                                                        @empty
                                                                        <div class="row form-group">
                                                                            <div class="col-md-12">
                                                                                <input name="snack[]" class="form-control mealXX">
                                                                            </div>
                                                                        </div>
                                                                        @endforelse
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-success float-right" onclick="addQ('{{ $snack    ->id }}')" type="button">Add New Snack Option</button>
                                                            <button class="btn btn-primary" id="pay" type="submit">Update Snack Meal</button>

                                                        </div>
                                                    </form>
                                                </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Create New Snack</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="credit-form" action="{{url('/admin/addsnackspost')}}" method="post">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="calory_template_type_id">Select Template</label>
                                    <select class="form-control" name="calory_template_type_id[]" id="calory_template_type_id" multiple data-placeholder="Select Template" required>
                                        @foreach($calories as $value)
                                        <option value="{{ $value->calory }}cal {{ $value->template_name }}">{{ $value->calory }}cal {{ $value->template_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="all-attributes">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="amount">Snack Option </label>
                                    <input name="snack[]" class="form-control mealXX">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary float-left" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-success float-right" id="add-new-q" type="button">Add New Snack Option</button>
                        <button class="btn btn-primary float-left" type="submit" onclick="return confirm('Are you sure you want to proceed?')">Create Snack Meal</button>

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
    var users = <?= json_encode($foods) ?>;

    function deleteQ(d) {
        $('#' + d).remove();
    }

    function addQ(d) {
        var content = $('.times');
        var newQ = `
                <div class="row form-group" id="Q_` + content.length + `">
                    <div class="col-md-10">
                        <input name="snack[]" class="form-control mealXX">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger times btn-sm" onclick="deleteQ('Q_` + content.length + `')" type="button">× REMOVE</button>
                    </div>
                </div>
            `;
        $('#all-attributes-' + d).append(newQ);
        $('.mealXX').suggest('[', {
            data: users,
            map: function(user) {
                return {
                    value: user.name + ']',
                    text: '<strong>' + user.name + '</strong> <small>(' + user.category + ' family)</small>'
                }
            }
        });
    }



    $(document).ready(function() {
        $('.mealXX').suggest('[', {
            data: users,
            map: function(user) {
                return {
                    value: user.name + ']',
                    text: '<strong>' + user.name + '</strong> <small>(' + user.category + ' family)</small>'
                }
            }
        });

        // $('#dataTableX').DataTable();

        $("#add-new-q").click(function() {
            var content = $('.times');
            var newQ = `
                    <div class="row form-group" id="Q_` + content.length + `">
                        <div class="col-md-10">
                            <input name="snack[]" class="form-control mealXX">
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