@extends('layouts._hotel')
@section('title','Contact Us')
@section('content')
    <!-- PAGE WRAP -->
    <div id="page-wrap">

        
        
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

        <!-- CONTACT -->
        <section class="section-contact">
            <div class="container">
                <div class="contact">
                    <div class="row">

                        <div class="col-md-6 col-lg-5">

                            <div class="text">
                                <h2>{{$item->title}}</h2>
                                <p>{{$item->details}}</p>
                                <ul>
                                    <li><i class="icon hillter-icon-location"></i> 225 Beach Street, Australian</li>
                                    <li><i class="icon hillter-icon-phone"></i> +61 2 6854 8496</li>
                                    <li><i class="icon fa fa-envelope-o"></i> hillterhotel@gmail.com</li>
                                </ul>
                            </div>

                        </div>

                        <div class="col-md-6 col-lg-6 col-lg-offset-1">
                            <div class="contact-form">
                                <form   method="POST" action="{{ route('message.store') }}">
                                @csrf 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input autofocus value="{{ old('name') }}" type="text" class="field-text"  name="name" placeholder="Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input value="{{ old('email') }}" type="text" class="field-text" name="email" placeholder="Email">
                                        </div>
                                        <div class="col-sm-12">
                                            <input value="{{ old('subject') }}" type="text" class="field-text" name="subject" placeholder="Subject">
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea cols="30" rows="10" name="message_content"  class="field-textarea" placeholder="Write what do you want">{{ old('message_content') }}</textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="awe-btn awe-btn-13">SEND</button>
                                        </div>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>

                    </div>  
                </div>
            </div>
        </section>
        <!-- END / CONTACT -->

        <!-- MAP -->
        <section class="section-map">
            <h1 class="element-invisible">Map</h1>
            <div class="contact-map">
                <div id="map" data-locations="39.0926986,-94.5747324--39.0912284,-94.5743515" data-center="39.0926986,-94.5747324"></div>
            </div>
        </section>
        <!-- END / MAP -->
    </div>
    <!-- END / PAGE WRAP -->
@endsection


   