@extends('layouts._hotel')
@section('title','Hotel Room Check&Reservation')
@section('content')
    <!-- PAGE WRAP -->
    <div id="page-wrap">
        
        <!-- SUB BANNER -->
        <section class="section-sub-banner awe-parallax bg-16">

            <div class="awe-overlay"></div>

            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>RESERVATION</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->
        
        <!-- RESERVATION -->
        <section class="section-reservation-page bg-white">

            <div class="container">
                <div class="reservation-page">

                    <div class="row">
                        
                        <div class="col-md-4 col-lg-3">

                            <div class="reservation-sidebar">

                                 <!-- FORM BOOK -->
                            <div class="room-detail_book">

<div class="room-detail_total">
    <img src="{{asset('hotel/images/icon-logo.png')}}" alt="" class="icon-logo">
    
    <h6>STARTING ROOM FROM</h6>
    
    <p class="price">
        <span class="amout">$190</span>/day
    </p>
</div>
<form>
<div class="room-detail_form">
    <label>Arrive</label>
    <input type="text"  name="check_in" id="check_in" class="awe-calendar" placeholder="Arrive Date">
    <label>Departure</label>
    <input type="text"  name="check_out" id="check_out" class="awe-calendar" placeholder="Departure Date">
    <label>Person No</label>
    <select class="awe-select" name="capacity" id="capacity">
        <option>2</option>
        <option>3</option>
        <option selected>4</option>
        <option>6</option>
    </select>
    <button type="submit" class="awe-btn awe-btn-13" v-on:click="seen = !seen" >Check Avaliability</button>
</div>
</form>
</div>
<!-- END / FORM BOOK -->

                            </div>

                        </div>
                        
                        <div class="col-md-8 col-lg-9">
                                                                        <!-- COMPARE ACCOMMODATION -->
                <div id="avaliableRoom" v-if="seen" class="room-detail_compare">
                    <h2 class="room-compare_title">THESE ALL AVALIABLE ROOMS </h2>

                    <div class="room-compare_content">
                        
                        <div class="row">
                            <!-- ITEM -->
                            
@if($rooms->count()>0)
        <div class="alert alert-info">found {{ $rooms->count() }} Results for search operation</div>
        <table class="table table-bordered table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th width="10%">Room Type</th>
                    <th width="5%">Price</th>
                    <th width="5%">Capacity</th>
                    <th width="5%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->price }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td class="text-right"> 
                           
                            <!-- {{$check_in=date('Y-m-d', strtotime('$request->check_in'))}}
                            {{$check_out=date('Y-m-d', strtotime('$request->check_out'))}} -->
                            
                                     
                        <a class="btn btn-sm btn-primary" href='{{ route("home.reservation",["id" => $room->id]) }}'><i class='fa fa-edit'></i> Book Now</a>  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
@else
        <div class="alert alert-warning">
             Sorry, there is no results to show try another date :(
        </div>
@endif
                        </div>
                        
                    </div>
                </div>
            </div>

        </section>
        <!-- END / RESERVATION -->

    </div>
    <!-- END / PAGE WRAP -->
@endsection
@section("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
<script>
var app = new Vue({
        el: '#avaliableRoom',
        data: {
            seen: false
        }
    })	
</script>
@endsection