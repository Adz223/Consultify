@extends('admin.layout.master')
@section('content')
    <!--[ Start:: My Dashboard ]-->
    <div class="row g-3 row-deck">
        <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3>$15K</h3>
                    <p class="text-muted">67% <i class="fa fa-level-up text-success"></i> Total income</p>
                    <div id="apexspark_bar_1"></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3>$1258</h3>
                    <p class="text-muted">15% <i class="fa fa-level-up text-success"></i> Total Expense
                    </p>
                    <div id="apexspark_bar_2"></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3>$2315</h3>
                    <p class="text-muted">23% <i class="fa fa-level-up text-success"></i> Total Growth</p>
                    <div id="apexspark_bar_3"></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3>$1025</h3>
                    <p class="text-muted">52% <i class="fa fa-level-up text-success"></i> Bounce Rate</p>
                    <div id="apexspark_bar_4"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
