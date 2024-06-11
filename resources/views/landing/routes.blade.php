<!DOCTYPE html>
<html lang="en">

  <head>
    @include('landing.components.header', ['title'=>'Vallacar - Routes'])
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
  @include('landing.components.nav', ['active'=>'routes'])
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Check Out Our Scheduled Routes</h6>
            <h2>Reserve a seat for your next travel</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
               
                <div class="col-lg-12">
                  <ul class="nacc">
   
                    <li class="active">
                      <div>
                        <div class="col-lg-12">
                          <div class="owl-carousel owl-listing">
                           
                            @foreach ($chunkedRoutesArray as $data)
                            <div class="item">
                              <div class="row">
                                 @foreach ($data as $d)
                                 @php
                                 $bus = App\Models\Bus::where('bus_id', $d->bus_id)->first();
                                 $from = App\Models\Terminal::where('term_id', $d->term_id_from)->first();
                                 $to = App\Models\Terminal::where('term_id', $d->term_id_to)->first();
                                     switch ($bus->bus_type) {
                                      case 'Economy':
                                        $pic = 'CeresEconomy.jpg';
                                        break;
                                      case 'Ceres Tour':
                                        $pic = 'CeresTour.jpg';
                                        break;
                                      case 'AirCon':
                                        $pic = 'AirConBus.jpg';
                                        break;
                                      case 'One Stop':
                                        $pic = '1Stop.jpg';
                                        break;
                                      case 'Two Stop':
                                        $pic = '2Stop.png';
                                        break;
                                     }
                                 @endphp
                                 <div class="col-lg-12">
                                  <div class="listing-item">
                                    <div class="left-image w-50">
                                      <a href="#"><img class="w-100 h-100" src="landing/assets/images/{{$pic}}" alt=""></a>
                                      <div class="hover-content float-right">
                                        <div class="main-white-button">
                                          <a onclick="Booking.GetRoute(`{{route('getRoute')}}?route_id={{$d->route_id}}`)" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#book"><i class="fa fa-eye"></i> Reserve Now</a>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="right-content align-self-center w-100">
                                      <a href="#"><h4>Route Code({{$d->route_code}})</h4></a>
                                      <h6>Bus Code({{$bus->bus_code}})</h6>
                                      <span class="price"><div class="icon"><img src="landing/assets/images/search-icon-04.png" alt=""></div>{{$from->term_location}} - {{$to->term_location}}</span>
                                      <span class="details">Available Seats: <em>{{$bus->bus_seats}}</em></span>
                                      <span class="info"><img src="landing/assets/images/search-icon-03.png" alt=""> Departure Date: {{$d->route_departure_date}}<br><img src="landing/assets/images/search-icon-03.png" alt=""> Departure Time: {{timeFormat($d->route_departure_time)}}</span>
                                    </div>
                                  </div>
                                </div>
                                 @endforeach
                              </div>
                            </div>
                            @endforeach
                         
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

  <div class="modal fade" id="book" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">
         Reserve A Ticket for This Route
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"> 
       
        <div class="row mb-4">
          <div class="col-md-6">
            <h5>Route Code: <span id="routeCodeT"></span></h5>
            <p>Bus Code: <span id="busCodeT"></span></p>
            <p>Available Seats: <span id="busSeatsT"></span></p>
          </div>
          <div class="col-md-6">
            <h4><span id="originT"></span> - <span id="destinationT"></span></h4>
            <p>Departure Date: <span id="departureDateT"></span></p>
            <p>Departure Time: <span id="departureTimeT"></span></p>
          </div>
        </div>

        <h5>Fill up your reservation information <span class="text-danger">(All Fields are required)</span></h5>
        <div class="mt-2 align-self-center">
        <form id="reserveSeats" method="POST">
          @csrf
          <input type="hidden" name="route_id" id="route_id">
          <div class="row">
            <div class="col-lg-6 mt-2">
              <fieldset>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Name" autocomplete="on" required>
                <small style="display:none" id="fnameE" class="text-danger">(Don't Leave this field Empty)</small>
              </fieldset>
            </div>
            <div class="col-lg-6 mt-2">
              <fieldset>
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                <small style="display:none" id="surnameE" class="text-danger">(Don't Leave this field Empty)</small>
              </fieldset>
            </div>
            <div class="col-lg-12 mt-2">
              <fieldset>
                <input type="email" class="form-control" name="email" id="email"  placeholder="Your Email" required="">
                <small style="display:none" id="emailE" class="text-danger">(Don't Leave this field Empty)</small>
              </fieldset>
            </div>
            <div class="col-lg-6 mt-2">
              <fieldset>
                <input type="text" class="form-control" name="contact" id="contact"  placeholder="Contact" required="">
                <small style="display:none" id="contactE" class="text-danger">(Don't Leave this field Empty)</small>
              </fieldset>
            </div>
            <div class="col-lg-6 mt-2">
              <fieldset>
                <input type="number" class="form-control" name="tickets" id="tickets" placeholder="# of Tickets" autocomplete="on" required>
                <small style="display:none" id="ticketsE" class="text-danger">(Don't Leave this field Empty)</small>
              </fieldset>
            </div>
          </div>
        </form>
      </div></div>
      <div class="modal-footer">
        <button type="button" id="reserveClose" class="btn btn-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="button" onclick="Booking.Reserve('{{route('reserve')}}')" class="btn btn-primary">
          Reserve Seats
        </button>
      </div>
    </div>
  </div>
  </div>
  </div>
  
  @include('landing.components.footer')
  @include('landing.components.scripts')
</body>

</html>