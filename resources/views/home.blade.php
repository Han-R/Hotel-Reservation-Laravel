@extends('layouts._hotel')

@section("slider")
<!-- BANNER SLIDER -->
@if($sliders->count()>0)
        <section class="section-slider">

            <div class="banner-slider" id="banner-slider">

                <!-- ITEM -->
                @foreach($sliders as $slider)
                <div class="slider-item text-center" data-image='{{ asset("storage/images/" . $slider->image)  }}'>
                    <div class="slider-text">
                        <span class="slider-caption-sub slider-caption-sub-1">{{ $slider->title }}</span>
                        <h2 class="slider-caption slider-caption-1">{{ $slider->subtitle }}</h2>
                        <!-- <a href="#" class="awe-btn awe-btn-12 awe-btn-slider">VIEW NOW</a> -->
                    </div>
                </div>
                @endforeach
                <!-- ITEM -->
            </div>

        </section>
@endif
        <!-- END / BANNER SLIDER -->
@endsection
@section('content')
<!-- CHECK AVAILABILITY -->
@yield("content")
        <section class="section-check-availability">
            <div class="container">
                <div class="check-availability">
                    <div class="row">
                        <div class="col-lg-3">
                            <h2>CHECK AVAILABILITY</h2>
                        </div>
                        <div class="col-lg-9">
                            <form id="ajax-form-search-room" action="search_step_2.php" method="post">
                                <div class="availability-form">
                                    <input type="text" name="arrive" class="awe-calendar from" placeholder="Arrival Date">
                                    <input type="text" name="departure" class="awe-calendar to" placeholder="Departure Date">

                                    <select class="awe-select" name="adults">
                                        <option>Adults</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                    <select class="awe-select" name="children">
                                        <option>Children</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                    <div class="vailability-submit">
                                        <button class="awe-btn awe-btn-13" href="asset{{('client.resrvations.reservation')}}">CHECK AVALIABILITY</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / CHECK AVAILABILITY -->

        <!-- ACCOMD ODATIONS -->
        <section class="section-accomd awe-parallax bg-14">
            <div class="awe-overlay"></div>

            <div class="container">
                <div class="accomd-modations">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="accomd-modations-header">
                                <h2 class="heading">ACCOM MODATIONS</h2>
                                <p>Our Rooms With Best Services</p>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-1">
                            <div class="accomd-modations-content owl-single">
                                
                                <div class="row">

                                    <!-- ITEM -->
                                    @foreach($rooms as $room)
                                    <div class="col-xs-6">
                                        <div class="accomd-modations-room">
                                            <div class="img">
                                                <a href="#"><img alt="" src='{{ asset("storage/images/" . $room->image)  }}' ></a>
                                            </div>
                                            <div class="text">
                                                <h2><a href="#">{{$room->room_type}}</a></h2>
                                                <p class="price">
                                                    <span class="amout">{{$room->price}}</span>/days
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- END / ITEM -->

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- END / ACCOMD ODATIONS -->

        <!-- ABOUT -->
        <section class="section-home-about bg-white">
            <div class="container">
                <div class="home-about">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="img">
                                <a href="#"><img src='{{ asset("storage/images/" . $about->image)  }}' alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text">
                                <h2 class="heading">{{$about->title}}</h2>
                                <p>{{$about->details}}</p>
                                <a href="{{asset('/about')}}" class="awe-btn awe-btn-default">READ MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / ABOUT -->

        <!-- OUR BEST -->
        <section class="section-our-best bg-white">
            <div class="container">

                <div class="our-best">
                    <div class="row">

                        <div class="col-md-6 col-md-push-6">
                            <div class="img">
                                <img src='{{ asset("storage/images/" . $ourbest->file)  }}' alt="">
                            </div>
                        </div>

                        <div class="col-md-6 col-md-pull-6 ">
                            <div class="text">
                                <h2 class="heading">Our Best</h2>
                                <p>One of Catalina Island's best-loved hotels, Hotel Vista Del Mar is recognized as one of Avalon's leading hotels with gracious island hospitality, thoughtful amenities and distinctive .</p>
                                <ul>
                                    <li>Coffee maker</li>
                                    <li>25 inch or larger TV</li>
                                    <li>Cable/satellite TV channels</li>
                                    <li>AM/FM clock radio</li>
                                    <li>Voicemail</li>
                                    <li>Private concierge</li>
                                    <li>Oversized work desk</li>
                                    <li>Hairdryer</li>
                                    <li>Iron/ironing board upon request</li>
                                    <li>Dataport</li>
                                    <li>Phone access fees waived</li>
                                    <li>24-hour Concierge service</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- END / OUR BEST -->
        
        <!-- GALLERY -->
        <section class="section-gallery bg-white">
            
            <div class="gallery  no-padding">
                <h2 class="heading text-center">GALLERY</h2>
                
                <!-- FILTER -->
                <div class="gallery-cat text-center">
                    <ul class="list-inline">
                        <li class="active"><a href="#" data-filter="*">All</a></li>
                        <li><a href="#" data-filter=".ground">HOTEL &amp; GROUND</a></li>
                        <li><a href="#" data-filter=".suite">ROOM/SUITE </a></li>
                        <li><a href="#" data-filter=".bathroom">EVENTS</a></li>
                        <li><a href="#" data-filter=".dining">DINING</a></li>
                    </ul>
                </div>
                <!-- END / FILTER -->

                <!-- GALLERY CONTENT -->
                <div class="gallery-content">
                    <div class="row">
                        <div class="gallery-isotope col-6 pd-0">

                            <!-- ITEM SIZE -->
                                <div class="item-size"></div>
                                <!-- END / ITEM SIZE -->
                            <!-- ITEM -->
                        @foreach($eventphotos as $eventphoto)
                            <div class="item-isotope  bathroom ">
                                <div class="gallery_item">
                                    <a  href='{{ asset("storage/images/" . $eventphoto->file)  }}' class="gallery-popup mfp-image" title="Luxury Room view all">
                                        <img src='{{ asset("storage/images/" . $eventphoto->file)  }}' alt="">
                                    </a>
                                   
                                </div>
                            </div>
                        @endforeach
                            <!-- END / ITEM -->

                            <!-- ITEM -->
                             <!-- Hotel & ground -->
                        @foreach($menuphotos as $menuphoto)     
                            <div class="item-isotope   dining">
                                <div class="gallery_item">
                                    <a  href='{{ asset("storage/images/" . $menuphoto->file)  }}' class="gallery-popup mfp-image" title="Luxury Room view all">
                                        <img src='{{ asset("storage/images/" .  $menuphoto->file)  }}' alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                            <!-- END / ITEM -->
                            <!-- ITEM -->
                            @foreach($roomphotos as $roomphoto)    
                            <div class="item-isotope   suite">
                                <div class="gallery_item">
                                    <a  href='{{ asset("storage/images/" . $roomphoto->file)  }}'class="gallery-popup mfp-image" title="Luxury Room view all">
                                        <img src='{{ asset("storage/images/" . $roomphoto->file)  }}' alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->
                            @endforeach
                            <!-- ITEM -->
                            @foreach($staticpagephotos as $staticpagephoto)
                            <div class="item-isotope  ground">
                                <div class="gallery_item">
                                    <a  href='{{ asset("storage/images/" . $staticpagephoto->file)  }}' class="gallery-popup mfp-image" title="Luxury Room view all">
                                        <img src='{{ asset("storage/images/" . $staticpagephoto->file)  }}' alt="">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            <!-- END / ITEM -->

                        </div>
                    </div>

                    <div class="our-gallery text-center">
                        <a href="{{route('home.gallery')}}" class="awe-btn awe-btn-default">BROWSE OUR GALLERY</a>
                    </div>

                </div>
                <!-- GALLERY CONTENT -->

            </div>
        </section>
        <!-- END / GALLERY -->
@endsection
