@extends('layouts._hotel')
@section('title','About')
@section('content')
        <!-- SUB BANNER -->
        <section class="section-sub-banner awe-parallax bg-9">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>{{$item->title}}</h2>
                        <p>{{$item->title}}</p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->
        
        <!-- ABOUT -->
        <section class="section-about">
            <div class="container">

                <div class="about">

                    <!-- ITEM -->
                    <div class="about-item">

                        <div class="img owl-single">
                            <img src='{{ asset("storage/images/" . $item->image)  }}' alt="">
                            <img src='{{ asset("storage/images/" . $item->image)  }}' alt="">
                        </div>

                        <div class="text">
                            <h2 class="heading">{{$item->title}}</h2>
                            <div class="desc">
                                <p>{{$item->details}}</p>
                            </div>
                        </div>

                    </div>
                    <!-- END / ITEM -->

                    <!-- ITEM -->
                    <div class="about-item about-right">

                        <div class="img">
                            <img src='{{ asset("storage/images/" . $item->image)  }}' alt="">
                        </div>

                        <div class="text">
                            <h2 class="heading">WHY GUEST CHOOSE HILLTER HOTEL?</h2>
                            <div class="desc">
                                <p>{{$item->detail}}</p>
                            </div>
                        </div>

                    </div>
                    <!-- END / ITEM -->

                </div>

            </div>
        </section>
        <!-- END / ABOUT -->
@endsection


