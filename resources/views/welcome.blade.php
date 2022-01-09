@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<div class="container-fluid">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/images/carousel1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h5>We know what you love</h5>
            <p>Welcome to our hotel</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/carousel2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h5>Stay with friends & families</h5>
            <p>Come & enjoy precious moment with us</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/carousel3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h5>want luxurious vacation?</h5>
            <p>Get accommodation today</p>
            </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </button>
    </div>

    {{-- ABOUT --}}

    <div class="row m-3" style="background-color: #FFAE42">
        <div class="col-md-12 mt-4 my-4">
            <h1 class="page-header">
                <center>ABOUT</center>
            </h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron">
                <h1 class="display-5">HELLOTEL</h1>
                <p class="lead">Where your vacations dreams start.</p>
                <hr class="my-4">
                <p>
                    HelloTel is a great place for rest and business.<br>
                    Along with the closest surroundings it is a frequently visited, interesting tourist and sightseeing region.<br>
                    Tourists are attracted by wonderful natural conditions, large forest areas and numerous picturesque lakes.<br>
                    Investors are attracted by the dynamically developing part of the city's industry.<br>
                    At our hotel, we care for a pleasant atmosphere during your stay and professional service.
                </p>
                <a class="btn btn-primary btn-lg" href="/room" role="button">View Our Room</a>
              </div>
        </div>
    </div>

    {{-- END OF ABOUT --}}

    {{-- ROOM AVAILABLE --}}
    <div class="row m-3" style="background-color: #FFAE42">
        <div class="col-md-12 mt-4 my-4">
            <h1 class="page-header">
                <center>ROOM AVAILABLE</center>
            </h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4><center>Check Room Available</center></h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('guest.search')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="time_from" class="col-md-4 col-form-label text-md-end">Check In Date: </label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker1" class="form-control" name="checkin_date">
                                </div>
                            </div>

                            @error('time_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="time_to" class="col-md-4 col-form-label text-md-end">Check Out Date: </label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="datepicker2" class="form-control" name="checkout_date">
                                </div>
                            </div>

                            @error('time_to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Check
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     {{-- SERVICES --}}

    <div class="row m-3" style="background-color: #FFAE42">
        <div class="col-md-12 mt-4 my-4">
            <h1 class="page-header">
                <center>OUR SERVICES</center>
            </h1>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-4">
            <div class="card">
                <center><img src="/images/wifi.png" class="card-img-top" style="width:50%"></center>
                <div class="card-body">
                    <h5 class="card-title">WIFI</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="card">
                <center><img src="/images/tv.png" class="card-img-top" style="width:50%"></center>
                <div class="card-body">
                    <h5 class="card-title">TV</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <center><img src="/images/restaurant.png" class="card-img-top" style="width:50%"></center>
                <div class="card-body">
                    <h5 class="card-title">24 HOURS RESTAURANT</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- END OF SERVICES --}}

    {{-- CONTACT --}}

    <div class="row m-3" style="background-color: #FFAE42">
        <div class="col-md-12 mt-4 my-4" >
            <h1 class="page-header">
                <center >CONTACT</center>
            </h1>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-4 ml-2">
            <div class="card">
                <div class="card-header">
                    <center><h1>Contact Information</h1></center>
                </div>
                <div class="card-body">
                    <p ><strong>Phone :</strong>+(06) 999 222 333</p>
                    <p><strong>Email :</strong> <a href="mailto:name@example.com">INFO@HELLOTEL.COM</a></p>
                    <p ><strong>Address :</strong> Teluk Kemaman 2, Port Dickson,NS. , Malaysia</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="1200" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=blue%20lagoon,%20port%20dickson&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://www.whatismyip-address.com"></a><br>
                    <style>.mapouter{position:relative;text-align:right;height:456px;width:1200px;}</style>
                </div>
            </div>
        </div>
    </div>
    

    {{-- END CONTACT --}}


    <!-- FOOTER -->

    <footer class="container">
        <p class="float-right btn btn-dark"><a style="color: #FFFFFF; text-decoration: none" href="#">Back to top</a></p>
        <p>&copy; 2021 HELLOTEL, Inc. </p>
    </footer>

    {{-- END OF FOOTER --}}
	
</div>
    
@endsection