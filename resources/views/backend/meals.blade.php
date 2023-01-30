<?php 
    $numberFormatter = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
    $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

    $comps = ["Snack meal","Cheat meal"];
    foreach($mealCompositions as $m){
        $string = str_replace(']','999', str_replace('[','666',$m->meal_composition));
        $string = preg_replace("/[^A-Za-z0-9 ]/", '', $string);
        $string = str_replace('999',']', str_replace('666','[',$string));
        $comps[] = $string;
    }
?>
@extends('backend.master')

@section('header_css')
    <!-- Custom styles for this page -->
    <link href="{{ url('client-assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ url('suggests') }}/bootstrap-suggest.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

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
        .ui-autocomplete { z-index:2147483647; }
    </style>
@endsection

@section('body_content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Meal Plans</h1>
        </div>


        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-body">
                        <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                            <span class="fa fa-plus"></span> 
                            Create Meal Plan
                        </a>
                        <div class="table-responsive">
                            <form action="{{ url('/admin/meals') }}" method="get">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input name="q" class="form-control" required placeholder="Search using meal, day, template, etc...">
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
                                        <th>Food Template</th>
                                        <th>Meal Order</th>
                                        <th>Meal</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 0;?>
                                    @foreach($meals as $product)
                                        <tr class="warning">
                                            <td><?=++$sn?></td>
                                            <td>
                                                <code>{{ $product->caloryTemplate->calory }}cal {{ $product->caloryTemplate->template_name }}</code>
                                            </td>
                                            <td>{{ $numberFormatter->format($product->order) }} meal of 
                                                {{ $product->day }}
                                            </td>
                                            <td align="center">
                                                {!! $product->meal ?: 'Snack meal <br><small><i>(options will be given)</i></small>' !!}
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
                                                        <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/meal-deactivate', $product->id)}}">Deactivate</a>
                                                        @else
                                                        <a class="dropdown-item btn-sm" style="cursor:pointer" href="{{url('admin/meal-activate', $product->id)}}">Re-activate</a>
                                                        @endif
                                                        <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#editModal{{$product->id}}">Edit Meal Plan</a>
                                                    </div>
                                                </div>

        <!-- Edit Meal Modal-->
        <div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Meal Plan</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="credit-form" action="{{url('/admin/edit-meal', $product->id)}}" method="post">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="amount">Calory Template Category</label>
                                        <select class="form-control" name="calory_template_type_id" required>
                                            <option value="">Select a Template</option>
                                            @foreach($calories as $value)
                                                <option value="{{ $value->id }}"{{ ($product->calory_template_type_id==$value->id)?' selected':'' }}>{{ $value->calory }}cal {{ $value->template_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="amount">Meal Day</label>
                                        <select class="form-control" name="day" required>
                                            <option value="">Select a Day</option>
                                            @foreach($days as $value)
                                                <option value="{{ $value }}"{{ ($product->day==$value)?' selected':'' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="amount">Month Part</label>
                                        <select class="form-control" name="month_part" required>
                                            <option value="">Select a Part</option>
                                            <option value="1_and_2"{{ ($product->month_part=='1_and_2')?' selected':'' }}>Week 1 & 2</option>
                                            <option value="3_and_4"{{ ($product->month_part=='3_and_4')?' selected':'' }}>Week 3 & 4</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="amount">Meal Order</label>
                                        <select class="form-control" name="order" required>
                                            <option value="">Select a Order</option>
                                            @for($i=1; $i<=4; $i++)
                                                <option value="{{ $i }}"{{ ($product->order==$i)?' selected':'' }}>{{ $numberFormatter->format($i) }} meal</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="amount">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="active"{{ ($product->status=='active')?' selected':'' }}>Active</option>
                                            <option value="inactive"{{ ($product->status=='inactive')?' selected':'' }}>In-active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amount">Meal</label>
                                <div class="row" id="all-attributes{{ $product->id }}">
                                    <?php
                                        $sips = explode('+', $product->meal);
                                    ?>
                                    @forelse($sips as $k=>$s)
                                        <div class="col-md-6" id="Q_wedr{{ $product->id }}_{{ $k }}">
                                            <div class="row my-1">
                                                <div class="col-md-10">
                                                    <div class="select-editable">
                                                        <input type="text" class="form-control mealXX" name="meal_composition_id[]" value="{{ trim($s) ?: 'Snack meal' }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-danger times btn-sm" onclick="deleteQ('Q_wedr{{ $product->id }}_{{ $k }}')" type="button">×</button>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-6" id="Q_wedr{{ $product->id }}_{{ $k }}">
                                            <div class="row my-1">
                                                <div class="col-md-10">
                                                    <div class="select-editable">
                                                        <input type="text" class="form-control mealXX" name="meal_composition_id[]" value="Snack meal" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-danger times btn-sm" onclick="deleteQ('Q_wedr{{ $product->id }}')" type="button">×</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="pay" type="submit">Update Meal Plan</button>
                            <button class="btn btn-success float-right" onclick="addQ('{{ $product->id }}')" id="add-new-q{{ $product->id }}" type="button">Add Alternate</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Create Meal Plan</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="credit-form" action="{{url('/admin/create-meal')}}" method="post">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="amount">Calory Template Category</label>
                                        <select class="form-control" name="calory_template_type_id" required>
                                            <option value="">Select a Template</option>
                                            @foreach($calories as $value)
                                                <option value="{{ $value->id }}">{{ $value->calory }}cal {{ $value->template_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="amount">Meal Day</label>
                                        <select class="form-control" name="day" required>
                                            <option value="">Select a Day</option>
                                            @foreach($days as $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="amount">Month Part</label>
                                        <select class="form-control" name="month_part" required>
                                            <option value="">Select a Part</option>
                                            <option value="1_and_2">Week 1 & 2</option>
                                            <option value="3_and_4">Week 3 & 4</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="amount">Meal Order</label>
                                        <select class="form-control" name="order" required>
                                            <option value="">Select a Order</option>
                                            @for($i=1; $i<=4; $i++)
                                                <option value="{{ $i }}">{{ $numberFormatter->format($i) }} meal</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="amount">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">In-active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amount">Meal</label>
                                <div class="row" id="all-attributes">
                                    <div class="col-md-6" id="Q_wedr">
                                        <div class="row my-1">
                                            <div class="col-md-10">
                                                <div class="select-editable">
                                                    <input type="text" class="form-control mealXX" name="meal_composition_id[]"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger times btn-sm" onclick="deleteQ('Q_wedr')" type="button">×</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="snack_meal">
                                        <input type="checkbox" name="meal_composition_id[]" value="Snack meal" id="snack_meal" onclick="return snackMealChosen(this, '')"/>
                                        &nbsp; Snack Meal
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="cheat_meal">
                                        <input type="checkbox" name="meal_composition_id[]" value="Cheat meal" id="cheat_meal" onclick="return cheatMealChosen(this, '')" />
                                        &nbsp; Cheat Meal
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="pay" type="submit">Create Food</button><button class="btn btn-success float-right" id="add-new-q" type="button">Add Alternate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_js')
    <!-- Page level plugins -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ url('client-assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('client-assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('suggests') }}/bootstrap-suggest.js"></script>
    <script src="{{ url('suggests') }}/bootstrap-suggest.min.js"></script>

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>


    <script type="text/javascript">
        var users = JSON.parse('<?= json_encode($comps) ?>');

        function snackMealChosen(e, r){
            if($(e).prop('checked')){
                var con = confirm('This will WIPE OFF all the MEAL PLANS. \n\nAre you sure you want to proceed?');
                if(!con) return false;

                $('#Q_wedr').remove('.col-md-6');
                $('#Q_wedr').html("");
                $('#Q_wedr').empty();
                $('#add-new-q'+r).attr('disabled', 'disabled');
                $('#cheat_meal'+r).attr('disabled', 'disabled');
            }else{
                $('#add-new-q'+r).removeAttr('disabled');
                $('#cheat_meal'+r).removeAttr('disabled');
            }
        }
        function cheatMealChosen(e, r){
            if($(e).prop('checked')){
                var con = confirm('This will WIPE OFF all the MEAL PLANS. \n\nAre you sure you want to proceed?');
                if(!con) return false;

                $('#Q_wedr').remove('.col-md-6');
                $('#Q_wedr').html("");
                $('#Q_wedr').empty();
                $('#add-new-q'+r).attr('disabled', 'disabled');
                $('#snack_meal'+r).attr('disabled', 'disabled');
            }else{
                $('#add-new-q'+r).removeAttr('disabled');
                $('#snack_meal'+r).removeAttr('disabled');
            }
        }
        function snackX(e, r){
            if($(e).prop('checked')){
                $('#'+r).attr('disabled', 'disabled');
            }else{
                $('#'+r).removeAttr('disabled');
            }
        }
        function deleteQ(d){
            $('#'+d).remove();
        }
        function addQ(d){
            var content = $('.times');
            var newQ = `
                <div class="col-md-6" id="Q_`+content.length+`">
                    <div class="row my-1">
                        <div class="col-md-10">
                            <div class="select-editable">
                                <input type="text" class="form-control mealXX" name="meal_composition_id[]"/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger times btn-sm" onclick="deleteQ('Q_`+content.length+`')" type="button">×</button>
                        </div>
                    </div>
                </div>
            `;
            $('#all-attributes'+d).append(newQ);

            $('.mealXX').autocomplete({ 
                source: users,
                select: function (event, ui) {}
            });
        }

        $(document).ready( function () {
            $('.mealXX').autocomplete({ 
                source: users,
                select: function (event, ui) {}
            });
            $('.js-example-basic-multiple').select2();


            $("#add-new-q").click(function(){
                var content = $('.times');
                var newQ = `
                    <div class="col-md-6" id="Q_`+content.length+`">
                        <div class="row my-1">
                            <div class="col-md-10">
                                <div class="select-editable">
                                    <input type="text" class="form-control mealXX" name="meal_composition_id[]"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger times btn-sm" onclick="deleteQ('Q_`+content.length+`')" type="button">×</button>
                            </div>
                        </div>
                    </div>
                `;
                $('#all-attributes').append(newQ);

                $('.mealXX').autocomplete({ 
                    source: users,
                    select: function (event, ui) {}
                });
            });
        });
    </script>
@endsection


                                   <!--  <select class="form-control" name="meal_composition_id[]" style="width:100%" onchange="this.nextElementSibling.value=this.value">
                                        <option value="">Snack meal</option>
                                        <option>Cheat meal</option>
                                        @foreach($mealCompositions as $value)
                                            <option value="{{ $value->meal_composition }}">{{ $value->meal_composition }}</option>
                                        @endforeach
                                    </select> -->