@extends('layout')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Shop</a>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                @foreach ($categories as $category)
                                                <div class="row">
                                                    <li><a href="/shop/filter-category/{{$category->cat_name}}">{{$category->cat_name . '('. $category->count .')'}}</a></li>
                                                    <li><a href="/shop/filter-category/unset/{{$category->cat_name}}">X</a></li>
                                                    </div>
                                                @endforeach    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="/shop/filter-price/0-800">$ 0.00 - $ 800.00</a></li>
                                                    <li><a href="/shop/filter-price/801-1000">$ 801.00 - $ 1000.00</a></li>
                                                    <li><a href="/shop/filter-price/1001-10000">$ 1001.00 - $ 10000.00</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right" style='text-align:left;'>
                                    <p>Sort by Price:</p>
                                    <select onchange="window.location.href=this.options[this.selectedIndex].value">
                                        <option value="/shop/sort/no-sort">No sort</option>
                                        <option value="/shop/sort/low-to-high">Low To High</option>
                                        <option value="/shop/sort/high-to-low">High To Low</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    @foreach ($products[0] as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('/storage/' . $product->product_photo) }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $product->product_name }}</h6>
                                    <a href="/add/{{$product->id}}" class="add-cart ">+ Add To Cart</a>
                                    <h5>{{ "$ " . $product->price  }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            
                        {{ $products[0]->links() }}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    @endsection('content')
