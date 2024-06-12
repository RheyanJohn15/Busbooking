<!DOCTYPE html>
<html lang="en">

  <head>
   @include('landing.components.header', ['title'=>'Vallacar - Boooking'])
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

  @include('landing.components.nav', ['active'=>'booking'])
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
            <h6>Did you already booked a ticket?</h6>
            <h2>Find your reservation by searching here</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <form id="search-form"  method="POST" role="search" >
            @csrf
            <div class="row">
              <div class="col-lg-3 align-self-center">
                <fieldset>
                    <input type="text" name="firstname" id="FirstName" class="" placeholder="Enter your First Name" autocomplete="on" required>
                </fieldset>
            </div>
              <div class="col-lg-3 align-self-center">
                  <fieldset>
                      <input type="text" name="lastname" id="LastName" class="searchText" placeholder="Enter your Last Name" autocomplete="on" required>
                  </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                <fieldset>
                  <input type="text" name="contact" id="Contact" class="" placeholder="Enter your Contact" autocomplete="on" required>
              </fieldset>
              </div>
              <div class="col-lg-3">                        
                  <fieldset>
                      <button type="button" onclick="SearchBooking('{{route('searchBooking')}}')" class="main-button"><i class="fa fa-search"></i> Search Now</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="recent-listing" style="display:none" id="searchResult">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Your Booking Search Results</h2>
            <h6>Check Them Out</h6>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-carousel owl-listing">
            <div class="item">
              <div class="row" id="bookResult">

              
               
               
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