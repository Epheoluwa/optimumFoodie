@extends('backend.master')

@section('header_css')
    <!-- Custom styles for this page -->
    <link href="{{ url('client-assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        small{
            display: block;
            white-space: nowrap;
        }
        .num{
            background: darkgreen;
            color: white;
            border-radius: 50%;
            display: inline-block;
            height: 30px;
            width: 30px;
            text-align: center;
            padding: 3px;
            font-weight: bold;
        }
        .times{
            background: darkred;
            cursor: pointer;
        }
    </style>
@endsection

@section('body_content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $product->name }} Variations</h1>
        </div>


        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-body">
                        <a href="{{ url('admin/products') }}" class="btn btn-secondary mb-4">Back to Products</a>
                        
                        @if(in_array($product->category->id, [2,3]))
                            @if(in_array($product->category->id, [2]))
                                <a href="#" class="btn btn-success mb-4" id="pull-variation">Pull Products from VTUTRADE.com</a>
                            @else
                                <a href="#" class="btn btn-success mb-4" id="pull-variation-vt">Pull Products from VTPASS.com</a>
                            @endif

                            <a href="#" class="btn btn-danger mb-4 float-right" id="clear-variations">Clear Variations</a>
                        @endif

                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#variation-box">Variations Update</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#pricing-box">Variation Pricing for Roles</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="variation-box" role="tabpanel">
                            <form action="{{ url('admin/add-variation') }}" method="POST">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group my-4">
                                            <b>Product Type</b>
                                            <input type="text" name="product_kind" class="form-control" placeholder="E.G: &nbsp;&nbsp;Bouquet, Meter Type, Data Bundle, etc..." value="{{ $product_kind }}" required>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8"></div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTableX" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="34%">Name</th>
                                                <th>Amount (₦)</th>
                                                <th>Identifier</th>
                                                <th>Provider ID</th>
                                                <th>Validity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="variations">
                                            <?php $sn = 0;?>
                                            @foreach($variations as $variation)
                                                <tr class="warning" id="QE_{{ ++$sn }}">
                                                    <td width="34%">
                                                        <input name="name[]" class="form-control" placeholder="Variation Name" value="{{ $variation->name }}"/>
                                                    </td>
                                                    <td>
                                                        <input name="amount[]" class="form-control" placeholder="Amount" value="{{ $variation->amount }}"/>
                                                    </td>
                                                    <td>
                                                        <input name="identifier[]" class="form-control" placeholder="Identifier" value="{{ $variation->identifier }}"/>
                                                    </td>
                                                    <td>
                                                        <input name="provider_id[]" class="form-control" placeholder="Provider ID" value="{{ $variation->provider_id }}"/>
                                                    </td>
                                                    <td>
                                                        <input name="validity[]" class="form-control" placeholder="Validity" value="{{ $variation->validity }}"/>
                                                    </td>
                                                    <td>
                                                        <span class="num times" onclick="deleteQ('QE_{{ $sn }}')">×</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-success mb-3" onclick="return confirm('Are you sure you want to PROCEED?')">Proceed to Update</button>
                                <a class="btn btn-primary mb-3 text-white float-right" id="add-variation">
                                    <span class="fa fa-plus"></span> Add Variation
                                </a>  
                            </form>
                          </div>
                          <div class="tab-pane fade" id="pricing-box" role="tabpanel">
                            <form action="{{ url('admin/add-role-price') }}" method="POST">
                                {!! csrf_field() !!}
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTableX" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Amount (₦)</th>
                                                @foreach($roles as $role)
                                                    <th>{{ $role->name }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody id="variations">
                                            <?php $sn = 0;?>
                                            @forelse($rolePrices as $price)
                                                <tr class="warning">
                                                    <td>{{ $price['name'] }}</td>
                                                    <td>₦{{ number_format($price['amount']) }}</td>

                                                    @foreach($roles as $role)
                                                        <td>
                                                            <input name="role_price_{{ $role->id }}[]" class="form-control" placeholder="{{ $role->name }} Amount" value="{{ $price[$role->id] }}"/>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="{{ (2 + count($roles)) }}" align="center">
                                                        <code>Kindly SWITCH back to the VARIATIONS UPDATE tab and <b>ADD VARIATION</b> or use the <b>PULL PRODUCT FROM VTUTRADE.com</b> button to pull variations before coming back here to update the pricing for the various roles.</code>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-success mb-3">Update Pricing for Roles</button>
                            </form>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection

@section('footer_js')
    <script type="text/javascript">
        function deleteQ(d){
            $('#'+d).remove();
        }
        function activaTab(tab){
          $('.nav-tabs a[href="#' + tab + '"]').tab('show');
        }

        $(document).ready( function () {
            $('.nav-tabs a').click(function(){
              $(this).tab('show');
            });

            $("#add-variation").click(function(){
                var content = $('.times');
                var newQ = `
                    <tr class="warning" id="QE_`+content.length+`">
                        <td width="34%">
                            <input name="name[]" class="form-control" placeholder="Variation Name"/>
                        </td>
                        <td>
                            <input name="amount[]" class="form-control" placeholder="Amount"/>
                        </td>
                        <td>
                            <input name="identifier[]" class="form-control" placeholder="Identifier"/>
                        </td>
                        <td>
                            <input name="provider_id[]" class="form-control" placeholder="Provider ID"/>
                        </td>
                        <td>
                            <input name="validity[]" class="form-control" placeholder="Validity"/>
                        </td>
                        <td>
                            <span class="num times" onclick="deleteQ('QE_`+content.length+`')">×</span>
                        </td>
                    </tr>
                `;
                $('#variations').append(newQ);
            });

            $("#pull-variation").click(function(){
                var confirmIt = confirm("This action will ADD PRODUCT VARIATIONS pulled using the \"vtutrade.com\" API and append to the below data in the table.\n\nARE YOU SURE YOU WANT TO DO THIS? \n\nClick OK to proceed.");
                if(confirmIt){
                    $.ajax({
                        url: "{{ url('/') }}/admin/pull-products/{{ $product->provider_product_id }}/{{ $product->id }}",
                        beforeSend: function(){
                            var newQ = `
                                <tr class="warning" id="QEQ_xxx">
                                    <td colspan=6 align="center">
                                        L O A D I N G . . .
                                    </td>
                                </tr>
                            `;
                            $('#variations').append(newQ);
                        },
                        success: function(r){
                            $('#QEQ_xxx').remove();
                            $('#variations').append(r);
                        }
                    });
                }else{
                    return false;
                }
            });

            $("#pull-variation-vt").click(function(){
                var confirmIt = confirm("This action will ADD PRODUCT VARIATIONS pulled using the \"vtpass.com\" API and append to the below data in the table.\n\nARE YOU SURE YOU WANT TO DO THIS? \n\nClick OK to proceed.");
                if(confirmIt){
                    $.ajax({
                        url: "{{ url('/') }}/admin/pull-products-vt/{{ $product->provider_product_id }}/{{ $product->id }}",
                        beforeSend: function(){
                            var newQ = `
                                <tr class="warning" id="QEQ_xxx">
                                    <td colspan=6 align="center">
                                        L O A D I N G . . .
                                    </td>
                                </tr>
                            `;
                            $('#variations').append(newQ);
                        },
                        success: function(r){
                            $('#QEQ_xxx').remove();
                            $('#variations').append(r);
                        }
                    });
                }else{
                    return false;
                }
            });

            $("#clear-variations").click(function(){
                var confirmIt = confirm("This action will REMOVE ALL the below data in the table.\n\nARE YOU SURE YOU WANT TO DO THIS? \n\nClick OK to proceed.");
                if(confirmIt){
                    $('#variations').html("");
                }else{
                    return false;
                }
            });
        });
    </script>
@endsection