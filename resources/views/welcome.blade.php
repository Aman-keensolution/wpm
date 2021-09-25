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
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Dashboard</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">

                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <?php if (session()->get('role') == 1) { ?>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <section class="content">
                                <div class="container-fluid">
                                    <!-- Small boxes (Stat box) -->
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <!-- small box -->
                                            <div class="small-box bg-outline-secondary">
                                                <div class="inner">
                                                    <h3>{{$all_user}}</h3>
                                                    <p>User</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="db_icon fas fa-users"></i>
                                                </div>
                                                <a href="{{route('admin.userlist')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-md-3 col-3">
                                            <!-- small box -->
                                            <div class="small-box bg-outline-secondary">
                                                <div class="inner">
                                                    <h3>{{$all_category}}</h3>
                                                    <p>Category</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="db_icon fa fa-shopping-bag"></i>
                                                </div>
                                                <a href="{{route('category.category_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-3">
                                            <!-- small box -->
                                            <div class="small-box bg-outline-secondary">
                                                <div class="inner">
                                                    <h3>{{$all_item}}</h3>
                                                    <p>Item</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="db_icon fa fa-box-open"></i>
                                                </div>
                                                <a href="{{route('item.item_list')}}" class="small-box-footer">More info <i class=" fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-3">
                                            <!-- small box -->
                                            <div class="small-box bg-outline-secondary">
                                                <div class="inner">
                                                    <h3>{{$all_WeightScale}}</h3>
                                                    <p>Weighing</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="db_icon fa fa-balance-scale"></i>
                                                </div>
                                                <a href="{{route('weighing.weighing_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-3">
                                            <!-- small box -->
                                            <div class="small-box bg-outline-secondary">
                                                <div class="inner">
                                                    <h3>3</h3>
                                                    <p>Plant<br><br></p>
                                                </div>
                                                <div class="icon">
                                                    <i class="db_icon fa fa-home"></i>
                                                </div>
                                                <a href="{{route('plant.plant_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-md-3 col-3">
                                            <!-- small box -->
                                            <div class="small-box bg-outline-secondary">
                                                <div class="inner">
                                                    <h3>{{$all_plant_bwl}}</h3>
                                                    <p>Plant-BWL<br> Locations</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="db_icon fa fa-map-marker-alt"></i>
                                                </div>
                                                <a href="{{route('plant.plant_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-3">
                                            <!-- small box -->
                                            <div class="small-box bg-outline-secondary">
                                                <div class="inner">
                                                    <h3>{{$all_plant_sbd}}</h3>
                                                    <p>Plant-SBD 
                                                        <br> Locations
                                                    </p>
                                                </div>
                                                <div class="icon">
                                                    <i class="db_icon fa fa-map-marker-alt"></i>
                                                </div>
                                                <a href="{{route('plant.plant_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-3">
                                            <!-- small box -->
                                            <div class="small-box bg-outline-secondary">
                                                <div class="inner">
                                                    <h3>{{$all_plant_fbd}}</h3>
                                                    <p>Plant-FBD<br> Locations</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="db_icon fa fa-map-marker-alt"></i>
                                                </div>
                                                <a href="{{route('plant.plant_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-3 col-3">
                                            <!-- small box -->
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3>{{$all_location}}</h3>
                                                    <p>Location</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="{{route('plant.plant_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div> --}}

                                      
                                        <!-- ./col -->
                                        {{-- <div class="col-md-3 col-3">
                                            <!-- small box -->
                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3>{{$all_bin}}</h3>
                                                    <p>Bin</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-stats-bars"></i>
                                                </div>
                                                <a href="{{route('bin.bin_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </section>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
@stop