@extends('layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/shop">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @if (@isset($products))
                                @foreach($products as $product)
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic" >
                                            <img src="{{ asset('/storage/' . $product[0]['product_photo']) }}" alt="" style="max-width:50%;">
                                        </div>
                                        <div class="product__cart__item__text" style="overflow:unset;">
                                            <h6>{{ $product[0]['product_name'] }}</h6>
                                            <h5>{{ "$ " . $product[0]['price'] }}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" value="{{ $product['quantity'] }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{ "$ " . $product['total'] }}</td>
                                    <td class="cart__close"><a href='/shopping-cart/remove/{{ $product[0]["id"] }}'><i class="fa fa-close" style="color:red;"></i></a></td>
                                </tr>
                                @endforeach
                              
                                
                                
                                @endif
                                @if (@isset($no_products))
                                <tr><td class="product__cart__item">{{$no_products}}</td></tr>    
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/shop">Continue Shopping</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span>{{ '$ ' . $total }}</span></li>
                        </ul>
                        @if (@isset($no_products))
                        <form action=""><button class="primary-btn" disabled>Proceed to checkout</button> 
                        @csrf
                        </form>
                         
                        @else
                        <form action="/checkout"><button class="primary-btn">Proceed to checkout</button>
                        @csrf
                        </form>
                       
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection('content')