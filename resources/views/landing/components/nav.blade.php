<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{route('home')}}" class="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="{{route('home')}}" class="{{$active==='home' ? 'active' : ''}}">Home</a></li>
              <li><a href="{{route('routes')}}" class="{{$active==='routes' ? 'active' : ''}}">Routes</a></li>
              <li><a href="{{route('booking')}}" class="{{$active==='booking' ? 'active' : ''}}">Booking</a></li>
              <li><a href="{{route('contact')}}" class="{{$active==='home' ? 'active' : ''}}">Contact Us</a></li> 
              <li><div class="main-white-button"><a href="#"><i class="fa fa-plus"></i> Reserve a seat </a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>