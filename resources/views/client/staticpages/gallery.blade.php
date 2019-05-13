@extends('layouts._hotel')
@section('title','Hotel Gallery')
@section('content')

    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- SUB BANNER -->
        <section class="section-sub-banner awe-parallax bg-12">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>Gallery</h2>
                        <p>Hotel Gallery</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / SUB BANNER -->
        
        <!-- GALLERY -->
        <section class="section_page-gallery">
            <div class="container">
                <div class="gallery">

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
                            <div class="gallery-isotope col-4">

                                <!-- ITEM SIZE -->
                                <div class="item-size "></div>
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

                    </div>
                    <!-- GALLERY CONTENT -->

                </div>
            </div>       
        </section>
        <!-- END / GALLERY -->

    </div>
    <!-- END / PAGE WRAP -->


@endsection