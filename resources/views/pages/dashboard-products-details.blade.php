@extends('layouts.dashboard')

@section('title')
Store Dashboard Products Details
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home"
     data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h3 class="dashboard-title">{{ $product->name }}</h2>
                <p class="dashboard-subtitle">Product Details</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('dashboard-product-update', $product->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden"
                               name="users_id"
                               value="{{ Auth::user()->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text"
                                                   name="name"
                                                   value="{{ $product->name }}"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="number"
                                                   name="price"
                                                   value="{{ $product->price }}"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="categories_id"
                                                    class="form-select">
                                                <option value="{{ $product->categories_id }}">Tidak Diganti
                                                    {{ $product->category->name }}</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description"
                                                      id="editor">{!! $product->description !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit"
                                                class="btn btn-success px-5 btn-block">Save Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @forelse ($product->galleries as $gallery)
                                <div class="col-md-4">
                                    <div class="gallery-container">
                                        <img src="{{ Storage::url($gallery->photo ?? '') }}"
                                             alt="product"
                                             class="w-100" />
                                        <a href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}"
                                           class="delete-gallery"><img src="/assets/images/icon-delete.svg"
                                                 alt="delete" /></a>
                                    </div>
                                </div>
                                @empty
                                <p class="text-muted text-center">Product Image Not Found</p>
                                @endforelse
                                <div class="col-12">
                                    <form action="{{ route('dashboard-product-gallery-upload') }}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden"
                                               name="products_id"
                                               value="{{ $product->id }}">
                                        <input type="file"
                                               name="photo"
                                               id="file"
                                               multiple
                                               style="display: none"
                                               onchange="form.submit()" />
                                        <button class="btn btn-secondary btn-block mt-2"
                                                type="button"
                                                onclick="thisFileUpload()">Add Photo</button>
                                    </form>
                                </div>
                            </div>
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
    $('#menu-toggle').click(function(e) {
            e.preventDefault();
            $('#wrapper').toggleClass('toggled');
        });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#editor'))
            .then((editor) => {
                console.log(editor);
            })
            .catch((error) => {
                console.error(error);
            });
</script>
<script>
    const thisFileUpload = () => {
            document.getElementById('file').click();
        };
</script>
@endpush