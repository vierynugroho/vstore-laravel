@extends('layouts.dashboard')

@section('title')
Store Dashboard Transactions
@endsection

@section('content')
<!-- Section Content -->
<!-- Section Content -->
<div class="section-content section-dashboard-home"
     data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions</h2>
            <p class="dashboard-subtitle">Big result start from the small one</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                    <ul class="nav nav-pills mb-3"
                        id="pills-tab"
                        role="tablist">
                        <li class="nav-item"
                            role="presentation">
                            <button class="nav-link active"
                                    id="pills-home-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-home"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-home"
                                    aria-selected="true">
                                Sell products
                            </button>
                        </li>
                        <li class="nav-item"
                            role="presentation">
                            <button class="nav-link"
                                    id="pills-profile-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-profile"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-profile"
                                    aria-selected="false">
                                Buy Products
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content"
                         id="pills-tabContent">
                        <div class="tab-pane fade show active"
                             id="pills-home"
                             role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            @forelse ($sellTransactions as $sellTransaction)
                            <a href="{{ route('dashboard-transactions-details', $sellTransaction->id) }}"
                               class="card card-list d-block">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img class="w-100"
                                                 src="{{ Storage::url($sellTransaction->product->galleries->first()->photo ?? '') }}" />
                                        </div>
                                        <div class="col-md-4">{{ $sellTransaction->product->name }}</div>
                                        <div class="col-md-3">{{ $sellTransaction->product->user->store_name }}</div>
                                        <div class="col-md-3">{{ $sellTransaction->created_at }}</div>
                                        <div class="col-md-1 d-none d-md-block">
                                            <img src="/assets/images/dashboard-arrow-right.svg"
                                                 alt="arrow right" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @empty
                            <p class="text-center text-muted fst-italic ">Nothing Sell Transactions</p>
                            @endforelse
                        </div>

                        <div class="tab-pane fade"
                             id="pills-profile"
                             role="tabpanel"
                             aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                @forelse ($buyTransactions as $buyTransaction)
                                <a href="{{ route('dashboard-transactions-details', $buyTransaction->id) }}"
                                   class="card card-list d-block">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img class="w-100"
                                                     src="{{ Storage::url($buyTransaction->product->galleries->first()->photo ?? '') }}" />
                                            </div>
                                            <div class="col-md-4">{{ $buyTransaction->product->name }}</div>
                                            <div class="col-md-3">{{ $buyTransaction->product->user->store_name }}</div>
                                            <div class="col-md-3">{{ $buyTransaction->created_at }}</div>
                                            <div class="col-md-1 d-none d-md-block">
                                                <img src="/assets/images/dashboard-arrow-right.svg"
                                                     alt="arrow right" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                <p class="text-center text-muted fst-italic ">Nothing Buy Transactions</p>
                                @endforelse
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $('#menu-toggle').click(function (e) {
				e.preventDefault();
				$('#wrapper').toggleClass('toggled');
			});
</script>
@endpush