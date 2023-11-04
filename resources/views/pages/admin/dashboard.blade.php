@extends('layouts.admin')

@section('title')
    Store Dashboard
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid mt-md-5 pt-md-5">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">This is BWAStore Administrator Panel</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="card-title">Customer</div>
                                <div class="dashboard-card-subtitle">{{ $customer }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="card-title">Revenue</div>
                                <div class="dashboard-card-subtitle">${{ $revenue }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="card-title">Transaction</div>
                                <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Recent Transaction</h5>
                        <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="./assets/images/dashboard-icon-product-1.png" alt="product 1" />
                                    </div>
                                    <div class="col-md-4">Shirup Marzzan</div>
                                    <div class="col-md-3">Viery Nugroho</div>
                                    <div class="col-md-3">12 November, 2022</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="./assets/images/dashboard-arrow-right.svg" alt="arrow right" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="/dashboard-transactions-details" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="./assets/images/dashboard-icon-product-2.png" alt="product 2" />
                                    </div>
                                    <div class="col-md-4">LeBrone X</div>
                                    <div class="col-md-3">Viery Nugroho</div>
                                    <div class="col-md-3">11 November, 2022</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="./assets/images/dashboard-arrow-right.svg" alt="arrow right" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="/dashboard-transactions-details" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="./assets/images/dashboard-icon-product-3.png" alt="product 3" />
                                    </div>
                                    <div class="col-md-4">Sofa Lembutte</div>
                                    <div class="col-md-3">Viery Nugroho</div>
                                    <div class="col-md-3">9 November, 2022</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="./assets/images/dashboard-arrow-right.svg" alt="arrow right" />
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
