@extends('admin.layout.master')
@section('content')
    <main class="page-body">
        <div class="container-fluid">
            <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
                <div class="col-xxl-9 col-xl-12 col-lg-12 order-1 order-xxl-0">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Contact</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <label class="form-label small text-muted">First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <label class="form-label small text-muted">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="form-label small text-muted">Email address</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label small text-muted">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
