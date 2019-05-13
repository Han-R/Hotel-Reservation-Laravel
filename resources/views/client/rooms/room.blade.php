@extends('layouts._hotel')
@section('title','Hotel Rooms')
@section('content')        
        <!-- SUB BANNER -->
        <section class="section-sub-banner awe-parallax bg-20">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>ROOMS &amp; RATES</h2>
                        <p>Hotel Rooms</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / SUB BANNER -->

        <!-- ROOM -->
        <section class="section-room bg-white">
            <div class="container">

                <div class="room-wrap-1">
                    <div class="row">
                        
                        <!-- ITEM -->
                        @foreach($rooms as $room)
                        <div class="col-md-6">
                            <div class="room_item-1">
                            
                                <h2><a href="#">{{$room->room_type}}</a></h2>
                            
                                <div class="img">
                                    <a href="#"><img src='{{ asset("storage/images/" . $room->image)  }}' alt=""></a>
                                </div>
                            
                                <div class="desc">
                                    <p>{{$room->description}}</p>
                                    <ul>
                                        <li>Max: {{$room->capacity}}Person(s)</li>
                                        <li>Size: 35 m2 / 376 ft2</li>
                                        <li>View: Ocen</li>
                                        <li>Bed: King-size or twin beds</li>
                                    </ul>
                                </div>
                            
                                <div class="bot">
                                    <span class="price">Starting <span class="amout">${{$room->price}}</span> /day</span>
                                    <a href="{{route('home.roomDetail',$room->id)}}" class="awe-btn awe-btn-13">VIEW DETAILS</a>
                                </div>
                            
                            </div>
                        </div>
                        @endforeach
                        <!-- END / ITEM -->

                    </div>
                </div>
                
            </div>
        </section>
        <!-- END / ROOM -->
@endsection        
