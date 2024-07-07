<header class="header-section section sticker">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-auto">
                <div class="header-logo">
                    <a href="#"><img src="{{ asset('theme/client/img/logo.png') }}" alt="main logo"></a>
                </div>
            </div>
            <div class="col-auto d-flex">
                <nav class="main-menu">
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">shop</a>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                        </li>
                        <li>
                            <a href="#">Blog</a>
                        </li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
                <div class="header-option-btns d-flex">
                    <div class="header-search">
                        <button class="search-toggle"><i class="pe-7s-search"></i></button>
                        <div class="header-search-form">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button><i class="fa fa-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="header-account">
                        <ul>
                            <li><a href="#" class="account-toggle"><i class="pe-7s-config"></i></a>
                                <ul class="account-menu">
                                    <li><a href="#">Log in</a></li>
                                    <li><a href="#">Register</a></li>
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Wish list</a></li>
                                    <li><a href="#">Checkout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="header-cart">
                        <a class="cart-toggle" href="#">
                            <i class="pe-7s-cart"></i>
                            <span>2</span>
                        </a>
                        <div class="mini-cart-brief text-left">
                            <div class="all-cart-product clearfix">
                                <div class="single-cart clearfix">
                                    <div class="cart-image">
                                        <a href="#">
                                            <img src="{{ asset('theme/client/img/product/cart-1.jpg') }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="cart-info">
                                        <h5>
                                            <a href="#">
                                                Le Parc Minotti Chair
                                            </a>
                                        </h5>
                                        <p>1 x £9.00</p>
                                        <a href="#" class="cart-delete" title="Remove this item">
                                            <i class="pe-7s-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="single-cart clearfix">
                                    <div class="cart-image">
                                        <a href="#"><img src="{{ asset('theme/client/img/product/cart-2.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="cart-info">
                                        <h5><a href="#">DSR Eiffel chair</a></h5>
                                        <p>1 x £9.00</p>
                                        <a href="#" class="cart-delete" title="Remove this item"><i
                                                class="pe-7s-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-totals">
                                <h5>Total <span>£12.00</span></h5>
                            </div>
                            <div class="cart-bottom  clearfix">
                                <a href="#">Check out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu"></div>
        </div>
    </div>
</header>

@if (Request::RouteIs('client.index'))
    @include('client.layout.banner')
@endif
