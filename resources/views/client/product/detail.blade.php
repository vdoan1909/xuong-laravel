@extends('client.layout.master')

@section('title', $model->name)

@section('content')
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-banner-content">
                        <h1>{{ $model->name }}</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">{{ $model->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form class="page-section section pt-120 pb-120" action="{{ route('client.cart.store') }}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{ $model->id }}">
        <div class="container">
            <div class="row mb-40">
                <div class="col-md-5 col-sm-6 col-xs-12 mb-40">
                    <div class="tab-content mb-10">
                        <div class="pro-large-img tab-pane active" id="pro-large-img-0">
                            <img src="{{ \Storage::url($model->img_thumbnail) }}" alt="" />
                        </div>

                        @foreach ($model->galleries as $index => $gallerie)
                            <div class="pro-large-img tab-pane" id="pro-large-img-{{ $index + 1 }}">
                                <img src="{{ \Storage::url($gallerie->image) }}" alt="" />
                            </div>
                        @endforeach
                    </div>

                    <div class="pro-thumb-img-slider nav">
                        <div>
                            <a href="#pro-large-img-0" class="active" data-bs-toggle="tab">
                                <img src="{{ \Storage::url($model->img_thumbnail) }}" alt="" />
                            </a>
                        </div>

                        @foreach ($model->galleries as $index => $gallerie)
                            <div>
                                <a href="#pro-large-img-{{ $index + 1 }}" data-bs-toggle="tab">
                                    <img src="{{ \Storage::url($gallerie->image) }}" alt="" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-7 col-sm-6 col-xs-12 mb-40">
                    <div class="product-details section">
                        <h1 class="title">
                            {{ $model->name }}
                        </h1>

                        <div class="price-ratting section">
                            <span class="price float-start">
                                <span class="new">
                                    {{ number_format($model->price_regular) }} VND
                                </span>
                            </span>
                        </div>

                        <div class="short-desc section">
                            <h5 class="pd-sub-title">Quick Overview</h5>
                            <p>
                                {{ $model->description }}
                            </p>
                        </div>

                        <div class="product-size section">
                            <h5 class="pd-sub-title">Select Size</h5>
                            @foreach ($sizes as $sizeKey => $size)
                                <input type="radio" name="product_size_id" value="{{ $size->id }}"
                                    {{ $sizeKey == 0 ? 'checked' : '' }}>
                                <label>{{ $size->name }}</label>
                            @endforeach
                        </div>

                        <div class="color-list section">
                            <h5 class="pd-sub-title">Select Color</h5>
                            @foreach ($colors as $colorKey => $color)
                                <div class="d-flex gap-2 mb-2">
                                    <input type="radio" name="product_color_id" value="{{ $color->id }}"
                                        {{ $colorKey == 0 ? 'checked' : '' }}>
                                    <div
                                        style="background-color: {{ $color->name }};  width: 30px; height: 30px; border-radius: 50%;">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="quantity-cart section">
                            <div class="product-quantity">
                                <input type="number" name="quantity" value="1">
                            </div>
                            <button class="add-to-cart" type="submit">add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <ul class="pro-info-tab-list section nav">
                        <li><a class="active" href="#more-info" data-bs-toggle="tab">More info</a></li>
                </div>
                <div class="tab-content col-xs-12">
                    <div class="pro-info-tab tab-pane active" id="more-info">
                        <p>
                            {{ $model->material }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
