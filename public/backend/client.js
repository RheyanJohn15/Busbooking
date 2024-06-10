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