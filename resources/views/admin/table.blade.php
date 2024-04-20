@extends('admin.layout.master')
@section('content')
    <main class="page-body">
        <div class="container-fluid">
            <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
                <div class="col-xxl-9 col-xl-12 col-lg-12 order-1 order-xxl-0">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <table id="table_id" class="display ">
                                    <thead>
                                        <tr>
                                            <th>Column 1</th>
                                            <th>Column 2</th>
                                            <th>Column 2</th>
                                            <th>Column 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Row 1 Data 1</td>
                                            <td>Row 1 Data 2</td>
                                            <td>Row 1 Data 2</td>
                                            <td>Row 1 Data 2</td>
                                        </tr>
                                        <tr>
                                            <td>Row 2 Data 1</td>
                                            <td>Row 2 Data 2</td>
                                            <td>Row 2 Data 2</td>
                                            <td>Row 2 Data 2</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
