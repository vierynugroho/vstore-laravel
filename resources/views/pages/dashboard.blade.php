@extends('layouts.dashboard')

@section('title')
Store Dashboard
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home"
     data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">Look what you have made today!</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="card-title">Customer</div>
                            <div class="dashboard-card-subtitle">{{ number_format($customer) }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="card-title">Revenue</div>
                            <div class="dashboard-card-subtitle">{{ number_format($revenue) }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="card-title">Transaction</div>
                            <div class="dashboard-card-subtitle">{{ number_format($transaction_count) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transaction</h5>
                    @forelse ($transaction_data as $transaction)
                    <a href="{{ route('dashboard-transactions-details', $transaction->id) }}"
                       class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{ Storage::url($transaction->product->galleries->first()->photo ?? '') }}"
                                         class="w-100" />
                                </div>
                                <div class="col-md-4">{{ $transaction->product->name }}</div>
                                <div class="col-md-3">{{ $transaction->transaction->user->name }}</div>
                                <div class="col-md-3">{{ $transaction->created_at }}</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="./assets/images/dashboard-arrow-right.svg"
                                         alt="arrow right" />
                                </div>
                            </div>
                        </div>
                    </a>
                    @empty
                    <p class="text-center text-danger text-muted">Nothing Transaction</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection