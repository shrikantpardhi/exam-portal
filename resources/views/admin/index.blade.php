@extends('layouts.master')
   
    @section('top-data')
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div id="chart"></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">2020</div>
                            <div class="weight-600 font-14">Contact</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div id="chart2"></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">400</div>
                            <div class="weight-600 font-14">Deals</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div id="chart3"></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">350</div>
                            <div class="weight-600 font-14">Campaign</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div id="chart4"></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">$6060</div>
                            <div class="weight-600 font-14">Worth</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('latest-user-table')
        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Best Selling Products</h2>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Product</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Oty</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-plus">
                            <img src="vendors/images/product-1.jpg" width="70" height="70" alt="">
                        </td>
                        <td>
                            <h5 class="font-16">Shirt</h5>
                            by John Doe
                        </td>
                        <td>Black</td>
                        <td>M</td>
                        <td>$1000</td>
                        <td>1</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    @endsection