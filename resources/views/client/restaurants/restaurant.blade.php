@extends('layouts._hotel')
@section('title','Hotel Restaurant')
@section('content')

    <!-- PAGE WRAP -->
    <div id="page-wrap">
        
        <!-- SUB BANNER -->
        <section class="section-sub-banner awe-parallax bg-16">

            <div class="awe-overlay"></div>

            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>Restaurant</h2>
                        <p>Hotel Restaurant</p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->
        
        <!-- RESTAURANTS -->
        <section class="section-restaurant-1 bg-white">
            <div class="container">

                <div class="restaurant-lager">
                  @foreach($products as $product)
                    <div class="restaurant_content">

                        <!-- HEADING -->
                      
                        <!-- <div class="restaurant_title text-center">
                            <h2 class="heading"></h2>
                            <span class="time"></span>
                        </div> -->
                        
                        <!-- END / HEADING -->

                        <div class="row">

                            <!-- ITEM -->
                            <div class="col-md-6">
                                <div class="restaurant_item lager-thumbs">
                                
                                    <div class="img">
                                        <a href="#"><img src='{{ asset("storage/images/" . $product->image)  }}' alt=""></a>
                                    </div>
                                
                                    <div class="text">
                                        <h2><a href="#">{{$product->product}}</a></h2>
                                        <!-- لاحقا حنعمل على اضافة عمود التفاصيل للمنتج -->
                                        <p class="desc">Egg Beaters scrambled with slow-roasted tomatoes, onion, fresh spinach and mushrooms.</p>
                                
                                        <p class="price">
                                            <span class="amout">${{$product->price}}</span>
                                        </p>
                                    </div>
                                
                                </div>
                            </div>
                            <!-- END / ITEM -->

                        </div>
                        
                        <!-- HR -->
                        <div class="hr"></div>
                        <!-- END  / HR -->

                    </div>
                  @endforeach
                </div>

            </div>
        </section>
        <!-- END / RESTAURANTS -->

    </div>
    <!-- END / PAGE WRAP -->
@endsection