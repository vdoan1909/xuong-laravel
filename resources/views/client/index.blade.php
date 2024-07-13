@extends('client.layout.master')

@section('title', 'Home')

@section('content')
    <div class="product-section section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <div class="isotope-product-filter col-auto">
                    <button class="active">all</button>
                </div>
                <div class="col-auto">
                    <button class="product-filter-toggle">filter</button>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="product-filter-wrapper">
                        <div class="row">
                            <div class="product-filter col-lg-3 col-md-6 col-12 mb-30">
                                <h5>color filters</h5>
                                <ul class="color-filter">
                                    @foreach ($colors as $color)
                                        <li>
                                            Color:
                                            <a href="#">
                                                <i style="background-color: {{ $color->name }};"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="product-filter col-lg-3 col-md-6 col-12 mb-30">
                                <h5>product tags</h5>
                                <div class="product-tags">
                                    @foreach ($tags as $tag)
                                        <a href="#">{{ $tag->name }}</a>,
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="isotope-grid row">
                @foreach ($data as $product)
                    <div class="isotope-item chair home-decor col-xl-3 col-lg-4 col-md-6 col-12 mb-50">
                        <div class="product-item product-item-2 text-center">
                            <div class="product-img">
                                <a class="image" href="{{ route('client.show', $product->slug) }}">
                                    <img src="{{ \Storage::url($product->img_thumbnail) }}" alt="{{ $product->name }}" />
                                </a>

                                {{-- <div class="action-btn-2">
                                    <a href="#" title="Add to Cart"><i class="pe-7s-cart"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                        title="Quick View"><i class="pe-7s-look"></i></a>
                                    <a class="wishlist" href="#" title="Wishlist"><i class="pe-7s-like"></i></a>
                                </div> --}}
                            </div>
                            <div class="product-info">
                                <h5 class="title">
                                    <a href="{{ route('client.show', $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div class="price-ratting fix">
                                    <span class="price">
                                        <span class="new">{{ number_format($product->price_regular) }} VND</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="text-center col-xs-12 mt-30">
                    <a href="#" class="btn load-more-product">load more</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="quickViewModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-5 col-md-6 col-12 mb-40">
                            <div class="tab-content mb-10">
                                <div class="pro-large-img tab-pane active" id="pro-large-img-1">
                                    <img src="{{ asset('theme/client/img/product/2.jpg') }}" alt="" />
                                </div>
                                <div class="pro-large-img tab-pane" id="pro-large-img-2">
                                    <img src="{{ asset('theme/client/img/product/1.jpg') }}" alt="" />
                                </div>
                                <div class="pro-large-img tab-pane" id="pro-large-img-3">
                                    <img src="{{ asset('theme/client/img/product/3.jpg') }}" alt="" />
                                </div>
                                <div class="pro-large-img tab-pane" id="pro-large-img-4">
                                    <img src="{{ asset('theme/client/img/product/4.jpg') }}" alt="" />
                                </div>
                                <div class="pro-large-img tab-pane" id="pro-large-img-5">
                                    <img src="{{ asset('theme/client/img/product/5.jpg') }}" alt="" />
                                </div>
                            </div>
                            <div class="pro-thumb-img-slider nav">
                                <div>
                                    <a href="#pro-large-img-1" class="active" data-bs-toggle="tab">
                                        <img src="{{ asset('theme/client/img/product/2.jpg') }}" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-md-6 col-12 mb-40">
                            <div class="product-details section">
                                <h1 class="title">DSR Eiffel chair</h1>
                                <div class="price-ratting section d-flex flex-column flex-sm-row justify-content-between">
                                    <span class="price"><span class="new">€ 120.00</span></span>
                                    <span class="ratting">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <span> (01 Customer Review)</span>
                                    </span>
                                </div>
                                <div class="short-desc section">
                                    <h5 class="pd-sub-title">Quick Overview</h5>
                                    <p>There are many variations of passages of Lorem Ipsum avaable, b majority have
                                        suffered alteration in some form, by injected humour, or randomised words
                                        which don't look even slightly believable. make an ami jani na.</p>
                                </div>
                                <div class="product-size section">
                                    <h5 class="pd-sub-title">Select Size</h5>
                                    <button>s</button>
                                    <button class="active">m</button>
                                    <button>x</button>
                                    <button>xl</button>
                                </div>
                                <div class="color-list section">
                                    <h5 class="pd-sub-title">Select Color</h5>
                                    <button class="active" style="background-color: #51bd99;"><i
                                            class="fa fa-check"></i></button>
                                    <button style="background-color: #ff7a5f;"><i class="fa fa-check"></i></button>
                                    <button style="background-color: #baa6c2;"><i class="fa fa-check"></i></button>
                                    <button style="background-color: #414141;"><i class="fa fa-check"></i></button>
                                </div>
                                <div class="quantity-cart section">
                                    <div class="product-quantity">
                                        <input type="text" value="0">
                                    </div>
                                    <button class="add-to-cart">add to cart</button>
                                </div>
                                <ul class="usefull-link section">
                                    <li><a href="#"><i class="pe-7s-mail"></i> Email to a Friend</a></li>
                                    <li><a href="#"><i class="pe-7s-like"></i> Wishlist</a></li>
                                    <li><a href="#"><i class="pe-7s-print"></i> print</a></li>
                                </ul>
                                <div class="share-icons section">
                                    <span>share :</span>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
