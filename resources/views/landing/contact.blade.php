

<!DOCTYPE html>
<html lang="en">

  <head>
    @include('landing.components.header', ['title'=>'Vallacar - Contact Us'])
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
  @include('landing.components.nav', ['active'=>'contact'])


  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Keep in touch with us</h6>
            <h2>Feel free to send us a message or send your feedback</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg-6">
                <div id="map">
                  <iframe src="https://maps.google.com/maps?q=Bacolod+City,+Negros+Occidental,+Philippines&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <form id="contact" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <fieldset>
                        <small id="nameE" style="display: none" class="text-danger">(This Field is Empty)</small>
                        <input type="text" name="name" id="name" placeholder="Name" autocomplete="on" required>
                      </fieldset>
                 
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <small id="surnameE" style="display: none" class="text-danger">(This Field is Empty)</small>
                        <input type="text" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <small id="emailE" style="display: none" class="text-danger">(This Field is Empty)</small>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                      </fieldset>
                    </div>
                    
                    <div class="col-lg-12">
                      <fieldset>
                        <small id="messageE" style="display: none" class="text-danger">(This Field is Empty)</small>
                        <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="button" onclick="SubmitFeedBack('{{route('sendFeedback')}}')" id="form-submit" class="main-button "><i class="fa fa-paper-plane"></i> Send Message</button>
                      </fieldset>
                    </div>
                
                  </div>
                </form>
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
