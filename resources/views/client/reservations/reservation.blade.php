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
                        <h2>RESERVATION DETAILS</h2>
                        <p>RESERVATION DETAILS</p>
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
                        
                        <!-- CONTENT -->
                        <div class="col-md-8 col-lg-9">

                            <div class="reservation_content">
                            @if($reservedRooms->count()>0)
        <div class="alert alert-info">found {{ $reservedRooms->count() }} Results for search operation</div>
        <table class="table table-bordered table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th width="10%">Room Type</th>
                    <th width="10%">Check In</th>
                    <th width="10%">Check Out</th>
                    <th width="5%">Price</th>
                    <th width="5%">Capacity</th>
                    <th width="5%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservedRooms as $reservedRoom)
                <tr>
                    <td>{{ $reservedRoom->room->room_type }}</td>
                    <td>{{ $reservedRoom->check_in }}</td>
                    <td>{{ $reservedRoom->check_out }}</td>
                    <td>${{ $reservedRoom->room->price }}</td>
                    <td>{{ $reservedRoom->room->capacity }}</td>
                    <td class="text-right"> 
                           
                            <!-- {{$check_in=date('Y-m-d', strtotime('$request->check_in'))}}
                            {{$check_out=date('Y-m-d', strtotime('$request->check_out'))}} -->
                            
                                     
                        <a class="btn btn-sm btn-primary" href='{{ route("home.reservationCancellation",["id" => $reservedRoom->room_id]) }}'><i class='fa fa-edit'></i>Cancel</a>  
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
                                
                                <div class="reservation-billing-detail">

                                    <p class="reservation-login">Returning To Home Page? <a href="{{ route('logout') }}" onclick="event.preventDefault();
																					document.getElementById('logout-form').submit();">Click here to logout</a></p>
                                    

																	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																		@csrf
																	</form>
                                </div>

                            </div>

                        </div>
                        <!-- END / CONTENT -->
                        
                    </div>
                </div>
            </div>

        </section>
        <!-- END / RESERVATION -->
        

    </div>
    <!-- END / PAGE WRAP -->
    @endsection

