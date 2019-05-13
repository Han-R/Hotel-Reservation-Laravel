@extends('layouts._hotel')
@section('title','Hotel Room Detail')
@section('content') 
        <!-- SUB BANNER -->
        <section class="section-sub-banner awe-parallax bg-1">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>{{$room->room_type}}</h2>
                        <p>{{$room->description}}</p>   
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->
        
        <!-- ROOM DETAIL -->
        <section class="section-room-detail bg-white">
            <div class="container">
                
                <!-- DETAIL -->
                <div class="room-detail">
                    <div class="row">
                        <div class="col-lg-9">
                            
                                            <!-- COMPARE ACCOMMODATION -->
                <div class="room-detail_compare">
                    <h2 class="room-compare_title">THESE ALL ROOMS OF {{$room->room_type}} TYPE PLEASE ENTER TO CHECK AVALIABILITY</h2>

                    <div class="room-compare_content">
                        
                        <div class="row">
                            <!-- ITEM -->
                            @foreach($allrooms as $specificroom)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="room-compare_item">
                                    <div class="img">
                                        <a href="#"><img src='{{ asset("storage/images/" . $specificroom->image)  }}' alt=""></a>
                                    </div>  
                                
                                    <div class="text">
                                        <h2><a href="">{{$room->room_type}}</a></h2>
                                
                                        <ul>
                                            <li><i class="hillter-icon-person"></i> Max:{{$specificroom->capacity}} Person(s)</li>
                                            <li><i class="hillter-icon-bed"></i> Bed: King-size or twin beds</li>
                                            <li><i class="hillter-icon-view"></i> View: Ocen</li>
                                            <li><span class="price">Starting <span class="amout">${{$room->price}}</span> /day</span></li>
                                        </ul>
                                
                                    </div>
                                
                                </div>
                            </div>
                            @endforeach
                            <!-- END / ITEM -->
                        </div>

                    </div>
                </div>
                <!-- END / COMPARE ACCOMMODATION -->

                        </div>

                        <div class="col-lg-3">

                            <!-- FORM BOOK -->
                            <div class="room-detail_book">

                                <div class="room-detail_total">
                                    <img src="images/icon-logo.png" alt="" class="icon-logo">
                                    
                                    <h6>STARTING ROOM FROM</h6>
                                    
                                    <p class="price">
                                        <span class="amout">${{$room->price}}</span>  /day
                                    </p>
                                </div>
                                <form>
                                <div class="room-detail_form">
                                    <label>Arrive</label>
                                    <input type="date" value="$request->check_in" name="check_in" id="check_in" class="awe-calendar" placeholder="Arrive Date">
                                    <label>Depature</label>
                                    <input type="date" value="$request->check_out" name="check_out" id="check_out" class="awe-calendar" placeholder="Departure Date">
                                    <label>Person No</label>
                                    <select class="awe-select" value="$request->capacity" name="capacity" id="capacity">
                                        <option>2</option>
                                        <option>3</option>
                                        <option selected>4</option>
                                        <option>6</option>
                                    </select>
                                    <button type="submit" class="awe-btn awe-btn-13">Book Now</button>
                                </div>
                               </form>
                            </div>
                            <!-- END / FORM BOOK -->

                        </div>
                    </div>
                </div>
                <!-- END / DETAIL -->
                
                



            </div>
        </section>
        <!-- END / SHOP DETAIL -->
@endsection