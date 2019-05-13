@extends('layouts._hotel')
@section('title','Hotel Events')
@section('content')
    <!-- PAGE WRAP -->
    <div id="page-wrap">

        
        
        <!-- SUB BANNER -->
        <section class="section-sub-banner awe-parallax bg-2">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>EVENT</h2>
                        <p>Hotel EVENT</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / SUB BANNER -->
        
        <!-- BLOG -->
        <section class="section-blog bg-white">
            <div class="container">
                <div class="blog">
                    <div class="row">

                        <div class="col-md-8 col-md-push-4">
                            <h1 class="element-invisible">Event</h1>
                            <div class="blog-content events-content">

                                <!-- POST ITEM -->
                                <article class="post">
                                   @foreach($events as $event)
                                    <div class="entry-media">
                                        <a href="#" class="post-thumbnail"> <img src='{{ asset("storage/images/" . $event->image)  }}' alt=""></a>

                                        <span class="posted-on"><strong>{{ $event->event_date->format('d') }}</strong>{{ $event->event_date->format('M') }}</span>
                                        
                                        <div class="count-date" data-end="2015/10/08 7:20:00"></div>

                                    </div>
                                    
                                    <div class="entry-header">
                                        <h2 class="entry-title"><a href="#">{{$event->event_name}}</a></h2>
                                    </div>

                                    <div class="entry-content">
                                        <!-- ممكن نضيف على جودل الاحداث قصة التفاصيل لاحقا و نحطها هان -->
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                    </div>
                                    @endforeach
                                </article>
                                <!-- END / POST ITEM -->

                            </div>
                        </div> 

                        <div class="col-md-4 col-md-pull-8">
                            <div class="sidebar">

                                <!-- UPCOMING EVENTS -->
                                <div class="widget widget_upcoming_events">
                                    <h4 class="widget-title">Upcoming Events</h4>
                                    <ul>
                                        @foreach($events as $event)
                                        <li>
                                            <span class="event-date">
                                                <strong>{{ $event->event_date->format('d') }}</strong>
                                                {{ $event->event_date->format('M') }}
                                            </span>
                                            <div class="text">
                                                <a href="#">{{ $event->event_name }}</a>
                                                <span class="date">in {{ $event->event_date }} </span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- END / UPCOMING EVENTS -->
                                
                                <!-- WIDGET SOCIAL -->
                                <div class="widget widget_social">
                                    <h4 class="widget-title">HILLTER SOCIALS</h4>
                                    <div class="widget-social">
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                                <!-- END / WIDGET SOCIAL -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- END / BLOG -->

    </div>
    <!-- END / PAGE WRAP -->
@endsection


