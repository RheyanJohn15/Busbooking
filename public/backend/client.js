function SearchRoute(event, route) {
    event.preventDefault(); 
    const search = document.getElementById('searchResult');

    search.style.display = 'none';
    const origin = document.getElementById('origin');
    const destination = document.getElementById('destination');
    const bus = document.getElementById('bus');

    let validity = 0;
    alertify.set('notifier', 'position', 'top-right');
    if(origin.value === 'none'){
        alertify.error('Please Select Your Terminal');
    }else{
        validity++;
    }

    if(destination.value === 'none'){
        alertify.error('Please Select Your Destination Terminal');
    }else{
        validity++;
    }

    if(bus.value === 'none'){
        alertify.error('Please Select Your Bus Choice');
    }else{
        validity++;
    }

    if(validity === 3){
        document.getElementById('mainLoader').style.display = 'flex';
        
        const list = document.getElementById('routeList');
        $.ajax({
          type: "POST",
          url: route,
          data: $('form#search-form').serialize(),
          success: res=>{
            document.getElementById('mainLoader').style.display = 'none';

           if(res.status=== 'success'){
            list.innerHTML = '';
            res .route.forEach(data=>{
                

                switch(data.bus.bus_type){
                    case "Economy":
                       var pic = 'CeresEconomy.jpg';
                       break;
                    case "Ceres Tour":
                        var pic = 'CeresTour.jpg';
                        break;
                    case "AirCon":
                        var pic = 'AirConBus.jpg';
                        break;
                    case "One Stop":
                        var pic = '1Stop.jpg';
                        break;
                    case "Two Stop":
                        var pic = '2Stop.png';
                        break;
                }
             list.innerHTML += ` <div class="col-lg-12">
             <div class="listing-item">
               <div class="left-image" style="width: 50%">
                 <a href="#"><img src="landing/assets/images/${pic}" alt=""></a>
               </div>
               <div class="right-content align-self-center">
                 <h4>Route Code(${data.route_code})</h4>
                 <h6>Bus Code(${data.bus.bus_code})</h6>
                
                 <span class="price"><div class="icon"><img src="landing/assets/images/search-icon-04.png" alt=""></div>${data.origin.term_location} - ${data.destination.term_location}</span>
                 <span class="details">Available Seats: <em>${data.bus.bus_seats}</em></span>
                 <ul class="info">
                   <li><img src="assets/images/listing-icon-03.png" alt=""> Departure Date: ${data.route_departure_date}</li>
                   <li><img src="assets/images/listing-icon-03.png" alt=""> Departure Time:  ${TimeFormat(data.route_departure_time)}</li>
                 </ul>
                 <div class="main-white-button">
                   <a href="contact.html"><i class="fa fa-eye"></i> Book Now</a>
                 </div>
               </div>
             </div>
           </div>
           `;
            });

            search.style.display = '';
            window.location.href = `#searchResult`;
           }else{
            alertify.error('Details Searched Not Found')
           }
          }, error: xhr=>{
            console.log(xhr.responseText);
          }
        });
    }

    return true;
}


function TimeFormat(time) {
    
    let [hours, minutes] = time.split(':');
    
    hours = parseInt(hours);
    minutes = parseInt(minutes);
    const ampm = hours >= 12 ? 'PM' : 'AM';

    hours = hours % 12 || 12; 

    minutes = minutes.toString().padStart(2, '0');
    return `${hours}:${minutes} ${ampm}`;
}


const Booking = {
    GetRoute: route => {
      $.ajax({
        type: "GET",
        url: route,
        dataType: "json",
        success: res => {
          AsText('routeCodeT', res.route.route_code );
          AsText('busCodeT', res.route.bus_code);
          AsText('busSeatsT', res.seats);
          AsText('originT', res.route.origin);
          AsText('destinationT', res.route.destination);
          AsText('departureDateT', res.route.route_departure_date);
          AsText('departureTimeT', TimeFormat(res.route.route_departure_time));
          AsVal('route_id', res.route.route_id);
        }, error: xhr => {
          console.log(xhr. responseText);
        }
      })   
    },
    Reserve: route => {
     
      let validity = 0;

      validity += CheckError('fname', 'fnameE');
      validity += CheckError('surname', 'surnameE');
      validity += CheckError('email', 'emailE');
      validity += CheckError('contact', 'contactE');
      validity += CheckError('tickets', 'ticketsE');

      if(validity === 5){
        alertify.confirm("Confirm Reservation", "Are you sure do you want to submit this reservation of tickets",
        ()=>{
          document.getElementById('mainLoader').style.display = 'flex';

          $.ajax({
           type: "POST",
           url: route,
           data: $('form#reserveSeats').serialize(),
           success: res=>{
            if(res.status === 'success'){
              document.getElementById('mainLoader').style.display = 'none';
              alertify.set('notifier', 'position', 'top-right');
              alertify.success('Successfully Reserve Tickets');
              document.getElementById('reserveClose').click();
            }
    
           }, error: xhr=>{
            console.log(xhr.responseText);
           }
          });
        }, ()=>{
          console.log('cancel');
        })
      }
       
    
    }
}

function AsText(id, value){
  document.getElementById(id).textContent = value;
}

function AsVal(id, value){
  document.getElementById(id).value = value;
}

function CheckError(input, text){
  const inp = document.getElementById(input);
  const tex = document.getElementById(text);
  if(inp.value === ''){
    tex.style.display = '';
    inp.classList.add('border', 'border-danger');
    return 0;
  }else{
    tex.style.display = 'none';
    inp.classList.remove('border', 'border-danger');
    return 1;
  }
}

function CheckErrorSearch(id){
 const input = document.getElementById(id);
 alertify.set('notifier', 'position', 'top-center');

 if(input.value === ''){
  alertify.error(id + ' search field is empty');
  return 0;
 }else{
  return 1;
 }
}

function SearchBooking(route){
  let validity = 0;
  
  validity += CheckErrorSearch('FirstName');
  validity += CheckErrorSearch('LastName');
  validity += CheckErrorSearch('Contact');

  if(validity== 3){
    document.getElementById('mainLoader').style.display = 'flex';

    $.ajax({
      type: "POST",
      url: route,
      data: $('form#search-form').serialize(),
      success: res=>{
        document.getElementById('mainLoader').style.display = 'none';
        if(res.status === 'success'){
          const result = document.getElementById('bookResult');
          const search = document.getElementById('searchResult');
          result.innerHTML = '';
          res.book.forEach(data =>{
             result.innerHTML += `  <div class="col-lg-12">
             <div class="listing-item">
            
               <div class="right-content align-self-center w-100 d-flex">
               <div class="w-50">
                 <a href="#"><h4>Booking Code: ${data.booking_code}</h4></a>
                 <h6>by: ${data.booking_firstname} ${data.booking_surname}(${data.booking_contact})</h6>
             
                 
                 <span class="price"><div class="icon"><img src="landing/assets/images/listing-icon-01.png" alt=""></div> ${data.origin} - ${data.destination}</span>
                 <span class="details">Seat Reserved: <em>${data.booking_seats}</em></span>
               </div>
                 <ul class="info w-50">
                   <br>
                   <li>Route Code: ${data.route.route_code}</li>
                   <li>Bus Code: ${data.bus}</li>
                   <li>Departure Date: ${data.route.route_departure_date}</li>
                   <li>Departute Time: ${TimeFormat(data.route.route_departure_time)}</li>
                 </ul>
                
               </div>
             </div>
           </div>`;
          });

          search.style.display = '';
          window.location.href = '#searchResult'
        }else{
          alertify.set('notifier','position', 'top-right');
          alertify.error('We Found nothing in the database');
          search.style.display = 'none';
        }
      }, error: xhr =>{
        console.log(xhr.responseText);
      }
    });
  }
}

function SubmitFeedBack(route){
  let validity = 0;

  validity += CheckError('name', 'nameE');
  validity += CheckError('surname', 'surnameE');
  validity += CheckError('email', 'emailE');
  validity += CheckError('message', 'messageE');

  if(validity === 4){
    document.getElementById('mainLoader').style.display = 'flex';

    $.ajax({
      type: "POST",
      url:route,
      data: $('form#contact').serialize(),
      success: res=>{
        if(res.status=== 'success'){
          document.getElementById('mainLoader').style.display = 'none';
          alertify.set('notifier', 'position', 'top-right');
          alertify.success('Feedback Sent');
          ClearInp('name');
          ClearInp('surname');
          ClearInp('email');
          ClearInp('message');
        }
      }, error: xhr=>{
        console.log(xhr.responseText);
      }
    });
  }
}


function ClearInp(id){
document.getElementById(id).value = '';

}