<div class="row g-3 row-deck">
    <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3>{{ $users }}</h3>
                <p class="text-muted">
                    {{-- 67% --}}
                    <i class="fa fa-users"></i> Total Users</p>
                {{-- <div id="apexspark_bar_1"></div> --}}
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3>{{ $services }}</h3>
                <p class="text-muted">
                    {{-- 15% --}}
                    <i class="fa fa-wrench"></i> Total Services
                </p>
                {{-- <div id="apexspark_bar_2"></div> --}}
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3>{{ $bookings }}</h3>
                <p class="text-muted">
                    {{-- 23% --}}
                    <i class="fa fa-money"></i> Total Bookings</p>
                {{-- <div id="apexspark_bar_3"></div> --}}
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3>{{ $contactRequests }}</h3>
                <p class="text-muted">
                    {{-- 52% --}}
                    <i class="fa fa-comment"></i> Total Contact Requests</p>
                {{-- <div id="apexspark_bar_4"></div> --}}
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3>${{ $bookingsTotalAmount }}</h3>
                <p class="text-muted">
                    {{-- 52% --}}
                    <i class="fa fa-comment"></i> Accepted Bookings Total Amount</p>
                {{-- <div id="apexspark_bar_4"></div> --}}
            </div>
        </div>
    </div>
</div>
