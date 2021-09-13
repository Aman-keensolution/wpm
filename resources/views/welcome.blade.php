@extends('layout.dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">

        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dashboard</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                            
                                <?php $i++; ?>
                                <tr>
                                    <td> {{$i}} </td>
                                </tr>
               

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@stop