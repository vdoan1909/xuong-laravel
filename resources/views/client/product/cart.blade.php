@extends('client.layout.master')

@section('title', 'Cart')

@section('content')
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-banner-content">
                        <h1>Cart</h1>
                        <ul class="breadcrumb">
                            <li class="active">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section section pt-120 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('client.order.save') }}" method="post" class="form-group">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="cart-table table-responsive mb-40">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="pro-title">Product</th>
                                                <th class="pro-price">Price</th>
                                                <th class="pro-price">Sale</th>
                                                <th class="pro-price">Size</th>
                                                <th style="width: 30px" class="pro-price">Color</th>
                                                <th class="pro-quantity">Quantity</th>
                                                <th class="pro-remove">Remove</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (session()->has('cart'))
                                                @foreach (session('cart') as $item)
                                                    <tr>
                                                        <td class="pro-title">
                                                            <a href="#">
                                                                {{ $item['name'] }}
                                                            </a>
                                                        </td>
                                                        <td class="pro-price">
                                                            <span class="amount">
                                                                {{ number_format($item['price_regular']) }} VND
                                                            </span>
                                                        </td>
                                                        <td class="pro-price">
                                                            <span class="amount">
                                                                {{ number_format($item['price_sale']) }} VND
                                                            </span>
                                                        </td>
                                                        <td class="pro-price">
                                                            <span class="amount">
                                                                {{ $item['product_size']['name'] }}
                                                            </span>
                                                        </td>
                                                        <td style="width: 30px" class="pro-price">
                                                            <div
                                                                style="width: 30px; height: 30px; border-radius: 50%; background-color: {{ $item['product_color']['name'] }}">

                                                            </div>
                                                        </td>
                                                        <td class="pro-quantity">
                                                            <div class="product-quantity">
                                                                <input type="text" value="{{ $item['quantity'] }}" />
                                                            </div>
                                                        </td>
                                                        <td class="pro-remove"><a href="#">×</a></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-xl-8 col-md-4 col-12">
                                <div class="cart-buttons mb-30">
                                    <input type="submit" value="Update Cart" />
                                    <a href="{{ route('client.index') }}">Continue Shopping</a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-8 col-12">
                                <div class="cart-total mb-40">
                                    <h3>Cart Totals</h3>

                                    <table>
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td><span class="amount">{{ number_format($totalAmount) }}</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td>
                                                    <strong><span
                                                            class="amount">{{ number_format($totalAmount) }}</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="mt-5 pt-5">
                                        <div class="mt-2">
                                            <label class="form-label" for="user_name">User name</label>
                                            <input class="form-control" type="text" name="user_name"
                                                value="{{ Auth::user()?->name }}">
                                        </div>
                                        <div class="mt-2">
                                            <label class="form-label" for="user_email">Email</label>
                                            <input class="form-control" type="text" name="user_email"
                                                value="{{ Auth::user()?->email }}">
                                        </div>
                                        <div class="mt-2">
                                            <label class="form-label" for="user_phone">Phone</label>
                                            <input class="form-control" type="text" name="user_phone">
                                        </div>
                                        <div class="mt-2">
                                            <label class="form-label" for="user_address">Address</label>
                                            <input class="form-control" type="text" name="user_address">
                                        </div>
                                        <div class="mt-2">
                                            <label class="form-label" for="user_note">Note</label>
                                            <input class="form-control" type="text" name="user_note">
                                        </div>
                                    </div>

                                    <div class="proceed-to-checkout section mt-30">
                                        <button type="submit">Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
