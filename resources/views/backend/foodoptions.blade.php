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
        <h1 class="h3 mb-0 text-gray-800">{{$user[0]->name}} Food Option</h1>
    </div>


    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Selected Food Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="warning">
                                    <td>{{$user[0]->name}}</td>
                                    <td>
                                    @if($foodsNoAlternate)
                                        @foreach($foodsNoAlternate as $food)
                                        <small style="display:block; color:red;">
                                        <!-- <?php
                                              $search = array('[', ']');
                                              $replace = array('', '');
                                              $newfood = str_replace($search, $replace, $food);
                                        ?> -->
                                            - {{ $food->name }}
                                        </small>
                                        
                                        @endforeach
                                        @endif
                                        @if($foodsWithAlternate)
                                            @foreach($foodsWithAlternate as $food)
                                            <small style="display:block; ">
                                
                                                - {{ $food->name }}
                                            </small>
                                            
                                            @endforeach
                                        @endif
                                     
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    @endsection