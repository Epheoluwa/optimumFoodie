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
        <h1 class="h3 mb-0 text-gray-800">User Suggestions</h1>
    </div>
    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Food Suggestion</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 0; ?>
                                @foreach($suggest as $sug)
                                <tr class="warning">
                                    <td><?= ++$sn ?></td>
                                    <td>
                                        {{ $sug->name }}
                                    </td>
                                    <td>
                                        {{ $sug->email }}
                                    </td>
                                    <td>
                                        {{ $sug->food_option }}
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
    </div>
</div>


@endsection