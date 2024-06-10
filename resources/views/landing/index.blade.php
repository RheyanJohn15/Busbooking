

<!DOCTYPE html>
<html lang="en">

  <head>

  @include('landing.components.header', ['title'=>'Vallacar Transit Booking'])
  </head>

<body>
@include('admin.components.loading')
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  @include('landing.components.nav')
  <!-- ***** Header Area End ***** -->

  @php
  $bus = App\Models\Bus::where('bus_status', 1)->get();
  $terminal = App\Models\Terminal::where('term_status', 1)->get();
@endphp

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
            <h6>Reserve your seats now!</h6>
            <h2>Vallacar Transit Booking</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <form onsubmit="return SearchRoute(event, '{{route('searchRoute')}}')" id="search-form" method="POST" >
            @csrf
            <div class="row">
              <div class="col-lg-3 align-self-center">
                  <fieldset>
                      <select name="origin" id="origin" class="form-select" aria-label="Area" id="chooseCategory" onchange="this.form.click()">
                          <option value="none" selected disabled>Select Origin</option>
                          @foreach ($terminal as $term)
                              <option value="{{$term->term_id}}">{{$term->term_name}} - {{$term->term_location}}</option>
                          @endforeach
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                <fieldset>
                  <select name="destination" id="destination" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                      <option selected value="none" disabled>Destination</option>
                      @foreach ($terminal as $term)
                              <option value="{{$term->term_id}}">{{$term->term_name}} - {{$term->term_location}}</option>
                      @endforeach
                  </select>
              </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                  <fieldset>
                      <select name="bus" class="form-select" id="bus" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                          <option value="none" selected disabled>Bus</option>
                          @foreach ($bus as $b)
                          <option value="{{$b->bus_id}}">{{$b->bus_code}} - {{$b->bus_type}}</option>
                         @endforeach
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-3">                        
                  <fieldset>
                      <button class="main-button"><i class="fa fa-search"></i> Search Now</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-10 offset-lg-1">
          <ul class="categories">
            <li><a href="category.html"><span class="icon"><img src="landing/assets/images/economy.png" alt="Home"></span> Economy</a></li>
            <li><a href="listing.html"><span class="icon"><img src="landing/assets/images/tour.png" alt="Food"></span> Ceres Tour </a></li>
            <li><a href="#"><span class="icon"><img src="landing/assets/images/aircon.png" alt="Vehicle"></span> AirCon </a></li>
            <li><a href="#"><span class="icon"><img src="landing/assets/images/one.png" alt="Shopping"></span> One Stop </a></li>
            <li><a href="#"><span class="icon"><img src="landing/assets/images/two.png" alt="Travel"></span> Two Stop </a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="recent-listing" id="searchResult" style="display: none">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Search Results</h2>
            <h6>Check Them Out</h6>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-carousel owl-listing">
            <div class="item">
              <div class="row" id="routeList">
               
              </div>
            </div>


            
            
          
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="popular-categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Vallacar Transit Busses</h2>
            <h6>Check Them Out</h6>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                    <div class="first-thumb active">
                      <div class="thumb">
                        <span class="icon"><img src="landing/assets/images/economy.png" alt=""></span>
                        Economy
                      </div>
                    </div>
                    <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="landing/assets/images/tour.png" alt=""></span>
                       Ceres Tour
                      </div>
                    </div>
                    <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="landing/assets/images/aircon.png" alt=""></span>
                       AirCon
                      </div>
                    </div>
                    <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="landing/assets/images/one.png" alt=""></span>
                        One Stop
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">                 
                        <span class="icon"><img src="landing/assets/images/two.png" alt=""></span>
                       Two Stop
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="col-lg-9 align-self-center">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Economy Busses</h4>
                                @foreach ($bus as $b)
                                @php
                                    $eco = 1;
                                @endphp
                                @if ($b->bus_type === 'Economy' && $eco <= 5)
                                <p><b>{{$b->bus_code}}</b> - <span>Seats: {{$b->bus_seats}}</span></p>
                                @php
                                $eco++;
                                @endphp
                                @endif
                                    
                                @endforeach
                                
                                <div class="main-white-button"><a href="#"><i class="fa fa-eye"></i> See More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="landing/assets/images/CeresEconomy.jpg" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Ceres Tour Busses</h4>
                                @foreach ($bus as $b)
                                @php
                                    $tour = 1;
                                @endphp
                                @if ($b->bus_type === 'Ceres Tour' && $tour <= 5)
                                <p><b>{{$b->bus_code}}</b> - <span>Seats: {{$b->bus_seats}}</span></p>
                                @php
                                $tour++;
                                @endphp
                                @endif
                                    
                                @endforeach
                                <div class="main-white-button"><a href="#"><i class="fa fa-eye"></i> See More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="landing/assets/images/CeresTour.jpg" alt="Foods on the table">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>AirCon Busses</h4>
                                @foreach ($bus as $b)
                                @php
                                    $air = 1;
                                @endphp
                                @if ($b->bus_type === 'AirCon' && $tour <= 5)
                                <p><b>{{$b->bus_code}}</b> - <span>Seats: {{$b->bus_seats}}</span></p>
                                @php
                                $tour++;
                                @endphp
                                @endif
                                    
                                @endforeach
                                <div class="main-white-button"><a href="listing.html"><i class="fa fa-eye"></i> See Listing</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="landing/assets/images/AirConBus.jpg" alt="cars in the city">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>One Stop Busses</h4>
                                @foreach ($bus as $b)
                                @php
                                    $one = 1;
                                @endphp
                                @if ($b->bus_type === 'One Stop' && $one <= 5)
                                <p><b>{{$b->bus_code}}</b> - <span>Seats: {{$b->bus_seats}}</span></p>
                                @php
                                $one++;
                                @endphp
                                @endif
                                    
                                @endforeach
                                <div class="main-white-button"><a href="#"><i class="fa fa-eye"></i> See More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="landing/assets/images/1Stop.jpg" alt="Shopping Girl">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Two Stop Busses</h4>
                                @foreach ($bus as $b)
                                @php
                                    $two = 1;
                                @endphp
                                @if ($b->bus_type === 'Two Stop' && $two <= 5)
                                <p><b>{{$b->bus_code}}</b> - <span>Seats: {{$b->bus_seats}}</span></p>
                                @php
                                $two++;
                                @endphp
                                @endif
                                    
                                @endforeach
                                <div class="main-white-button"><a rel="nofollow" href="https://templatemo.com/contact"><i class="fa fa-eye"></i> Read More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="landing/assets/images/2Stop.png" alt="Traveling Beach">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>          
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  


 @include('landing.components.footer')

 @include('landing.components.scripts')

</body>

</html>
