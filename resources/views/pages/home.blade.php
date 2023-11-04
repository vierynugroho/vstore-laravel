@extends('layouts.app')

@section('title')
Store Homepage
@endsection

@section('content')
<div class="page-content page-home">
    <section class="store-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"
                     data-aos="zoom-in">
                    <div id="storeCarousel"
                         class="carousel slide"
                         data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button"
                                    data-bs-target="#storeCarousel"
                                    data-bs-slide-to="0"
                                    class="active"></button>
                            <button type="button"
                                    data-bs-target="#storeCarousel"
                                    data-bs-slide-to="1"></button>
                            <button type="button"
                                    data-bs-target="#storeCarousel"
                                    data-bs-slide-to="2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/assets/images/hilih.jpg"
                                     class="d-block w-100"
                                     alt="store carousel" />
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/images/hilih.jpg"
                                     class="d-block w-100"
                                     alt="store carousel" />
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/images/hilih.jpg"
                                     class="d-block w-100"
                                     alt="store carousel" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trend Categories -->
    <section class="store-trend-categories">
        <div class="container">
            <div class="row">
                <div class="col-12"
                     data-aos="fade-up">
                    <h5>Trend Categories</h5>
                </div>
            </div>
            <div class="row">
                @php
                $incrementCategory = 0;
                @endphp
                @forelse ($categories as $category)
                <div class="col-6 col-md-3 col-lg-2"
                     data-aos="fade-up"
                     data-aos-delay="{{ $incrementCategory += 100 }}">
                    <a href="{{ route('categories-detail', $category->slug) }}"
                       class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ Storage::url($category->photo) }}"
                                 alt="categories-gadget"
                                 class="w-100" />
                        </div>
                        <p class="categories-text">{{ $category->name }}</p>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5"
                     data-aos="fade-up"
                     data-aos-delay="100">
                    No Categories Found
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Store new Products -->
    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col"
                     data-aos="fade-up">
                    <h5>New Products</h5>
                </div>
            </div>
            <div class="row">
                @php
                $productIncrement = 0;
                @endphp
                @forelse ($products as $product)
                @if ($product->user->store_status == 1)
                <div class="col-6 col-md-4 col-lg-3"
                     data-aos="fade-up"
                     data-aos-delay="{{ $productIncrement += 100 }}">
                    <a href="{{ route('detail', $product->slug) }}"
                       class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                 style="
                                         @if ($product->galleries->count()) background-image: url('{{ Storage::url($product->galleries->first()->photo) }}');
@else
background-color: #333; @endif
">
                            </div>
                        </div>
                        <div class="products-text">{{ $product->name }}</div>
                        <div class="products-price">IDR. <?= number_format($product->price) ?></div>
                    </a>
                </div>
                @endif
                @empty
                <div class="col-12 text-center py-5"
                     data-aos="fade-up"
                     data-aos-delay="100">
                    No Products Found
                </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
@endsection