const Admin = {
    Logout: (route, home) => {
       alertify.confirm('Log Out', 'Are you sure do you wanna logout?', 
       ()=> {
         document.getElementById('mainLoader').style.display = 'flex';

         $.ajax({
           type: "POST",
           url: route,
           data: $('form#logoutForm').serialize(),
           success: res => {
             if(res.status === 'success'){
              window.location.href = home;
             }
           }
         });
       }, ()=>{
        console.log('cancel');
       }
       );
    },

    Terminal: {
      Add: (route, load, update)=>{
        
        const name = document.getElementById('terminalName');
        const name_e = document.getElementById('termName');

        const location = document.getElementById('terminalLocation');
        const location_e = document.getElementById('termLocation');

        let validity = 0;

        if(name.value === ''){
          name_e.style.display = '';
          name.classList.add('border', 'border-danger');
        }else{
          name_e.style.display = 'none';
          name.classList.remove('border', 'border-danger');
          validity++;
        }

        
        if(location.value === ''){
          location_e.style.display = '';
          location.classList.add('border', 'border-danger');
        }else{
          location_e.style.display = 'none';
          location.classList.remove('border', 'border-danger');
          validity++;
        }

        if(validity === 2){
          document.getElementById('mainLoader').style.display = 'flex';

          $.ajax({
            type: "POST",
            url: route,
            data: $('form#terminalForm').serialize(),
            success: res=>{
              if(res.status === 'success'){
                document.getElementById('mainLoader').style.display = 'none';
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Add Terminal Successfully');
                document.getElementById('closeTerminal').click();
                LoadTerminal(load, update);
              }
            }, error: xhr => {
              console.log(xhr.responseText);
            }
          })
        }
      },

      Edit: {
        View: (id, name, location)=>{
          $('#updateModal').modal('show');
          AssVal('updateTermName', name);
          AssVal('updateTermLocation', location);
          AssVal('updateTermId', id);
        },
        Update: (route, load) => {
          const name = document.getElementById('updateTermName');
          const name_e = document.getElementById('UptermName');
  
          const location = document.getElementById('updateTermLocation');
          const location_e = document.getElementById('UptermLocation');
  
          let validity = 0;
  
          if(name.value === ''){
            name_e.style.display = '';
            name.classList.add('border', 'border-danger');
          }else{
            name_e.style.display = 'none';
            name.classList.remove('border', 'border-danger');
            validity++;
          }
  
          
          if(location.value === ''){
            location_e.style.display = '';
            location.classList.add('border', 'border-danger');
          }else{
            location_e.style.display = 'none';
            location.classList.remove('border', 'border-danger');
            validity++;
          }
  
          if(validity === 2){
            document.getElementById('mainLoader').style.display = 'flex';
  
            $.ajax({
              type: "POST",
              url: route,
              data: $('form#updateTerminalForm').serialize(),
              success: res=>{
                if(res.status === 'success'){
                  document.getElementById('mainLoader').style.display = 'none';
                  alertify.set('notifier', 'position', 'top-right');
                  alertify.success('Successfully Updated Terminal');
                  document.getElementById('UpdatecloseTerminal').click();
                  LoadTerminal(load, route);
                }
              }, error: xhr => {
                console.log(xhr.responseText);
              }
            })
          }
        }
      }, 
      Disable: (route, load, id)=> {
      alertify.confirm("Delete Terminal?", "Are you sure do you want to delete this Terminal",
      ()=>{
        AssVal('disableTermId', id)
        document.getElementById('mainLoader').style.display = 'flex';
       
        $.ajax({
          type: "POST",
          url: route,
          data: $('form#DisableTerminal').serialize(),
          success: res=>{
            if(res.status === 'success'){
              document.getElementById('mainLoader').style.display = 'none';
              alertify.set('notifier', 'position', 'top-right');
              alertify.success('Successfully Deleted Terminal');
              LoadTerminal(load, route);
            }
          }, error: xhr => {
            console.log(xhr.responseText);
          }
        })
      }, ()=>{
        console.log('cancel');
      }
      );
      }
    },
  Bus:{
    Add: (route, load, update)=>{
        
      const code = document.getElementById('busCode');
      const codeE = document.getElementById('busCodeE');

      const type = document.getElementById('busType');
      const typeE = document.getElementById('busTypeE');

      const seats = document.getElementById('busSeats');
      const seatsE = document.getElementById('busSeatsE');

      let validity = 0;

      if(code.value === ''){
        codeE.style.display = '';
        code.classList.add('border', 'border-danger');
      }else{
        codeE.style.display = 'none';
        code.classList.remove('border', 'border-danger');
        validity++;
      }

      
      if(type.value === 'none'){
        typeE.style.display = '';
        type.classList.add('border', 'border-danger');
      }else{
        typeE.style.display = 'none';
        type.classList.remove('border', 'border-danger');
        validity++;
      }

      if(seats.value === ''){
        seatsE.style.display = '';
        seats.classList.add('border', 'border-danger');
      }else{
        seatsE.style.display = 'none';
        seats.classList.remove('border', 'border-danger');
        validity++;
      }

      if(validity === 3){
        document.getElementById('mainLoader').style.display = 'flex';

        $.ajax({
          type: "POST",
          url: route,
          data: $('form#busForm').serialize(),
          success: res=>{
            if(res.status === 'success'){
              document.getElementById('mainLoader').style.display = 'none';
              alertify.set('notifier', 'position', 'top-right');
              alertify.success('Add Bus Successfully');
              document.getElementById('closeBus').click();
              LoadBus(load, update);
            }
          }, error: xhr => {
            console.log(xhr.responseText);
          }
        })
      }
    },

    Edit: {
      View: (id, code, type, seats)=>{
        $('#updateBus').modal('show');
        AssVal('UpbusCode', code);
        AssVal('UpbusType', type);
        AssVal('UpbusSeats', seats);
        AssVal('upBusId', id);
      },
      Update: (route, load) => {
        const code = document.getElementById('UpbusCode');
        const codeE = document.getElementById('UpbusCodeE');
  
        const type = document.getElementById('UpbusType');
        const typeE = document.getElementById('UpbusTypeE');
  
        const seats = document.getElementById('UpbusSeats');
        const seatsE = document.getElementById('UpbusSeatsE');
  
        let validity = 0;
  
        if(code.value === ''){
          codeE.style.display = '';
          code.classList.add('border', 'border-danger');
        }else{
          codeE.style.display = 'none';
          code.classList.remove('border', 'border-danger');
          validity++;
        }
  
        
        if(type.value === 'none'){
          typeE.style.display = '';
          type.classList.add('border', 'border-danger');
        }else{
          typeE.style.display = 'none';
          type.classList.remove('border', 'border-danger');
          validity++;
        }
  
        if(seats.value === ''){
          seatsE.style.display = '';
          seats.classList.add('border', 'border-danger');
        }else{
          seatsE.style.display = 'none';
          seats.classList.remove('border', 'border-danger');
          validity++;
        }
  
        if(validity === 3){
          document.getElementById('mainLoader').style.display = 'flex';
  
          $.ajax({
            type: "POST",
            url: route,
            data: $('form#UpbusForm').serialize(),
            success: res=>{
              if(res.status === 'success'){
                document.getElementById('mainLoader').style.display = 'none';
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Successfully Bus Details');
                document.getElementById('UpcloseBus').click();
                LoadBus(load, route);
              }
            }, error: xhr => {
              console.log(xhr.responseText);
            }
          })
        }

      }
    }, 
    Disable: (route, load, id)=> {
    alertify.confirm("Delete Bus?", "Are you sure do you want to delete this Bus",
    ()=>{
      AssVal('disableBusId', id)
      document.getElementById('mainLoader').style.display = 'flex';
     
      $.ajax({
        type: "POST",
        url: route,
        data: $('form#DisableBus').serialize(),
        success: res=>{
          if(res.status === 'success'){
            document.getElementById('mainLoader').style.display = 'none';
            alertify.set('notifier', 'position', 'top-right');
            alertify.success('Successfully Deleted Bus');
            LoadBus(load, route);
          }
        }, error: xhr => {
          console.log(xhr.responseText);
        }
      })
    }, ()=>{
      console.log('cancel');
    }
    );
    }
  },  Route:{
    Add: (route, load, update)=>{
        
      const code = document.getElementById('busCode');
      const codeE = document.getElementById('busCodeE');

      const origin = document.getElementById('origin');
      const originE = document.getElementById('originE');

      const destination = document.getElementById('destination');
      const destinationE = document.getElementById('destinationE');

      const dept_date = document.getElementById('departureDate');
      const dept_dateE = document.getElementById('departureDateE');

      const dept_time = document.getElementById('departureTime');
      const dept_timeE = document.getElementById('departureTimeE');

      let validity = 0;

      if(code.value === 'none'){
        codeE.style.display = '';
        code.classList.add('border', 'border-danger');
      }else{
        codeE.style.display = 'none';
        code.classList.remove('border', 'border-danger');
        validity++;
      }

      
      if(origin.value === 'none'){
        originE.style.display = '';
        origin.classList.add('border', 'border-danger');
      }else{
        originE.style.display = 'none';
        origin.classList.remove('border', 'border-danger');
        validity++;
      }

      if(destination.value === 'none'){
        destinationE.style.display = '';
        destination.classList.add('border', 'border-danger');
      }else{
        destinationE.style.display = 'none';
        destination.classList.remove('border', 'border-danger');
        validity++;
      }

      if(dept_date.value === ''){
        dept_dateE.style.display = '';
        dept_date.classList.add('border', 'border-danger');
      }else{
        dept_dateE.style.display = 'none';
        dept_date.classList.remove('border', 'border-danger');
        validity++;
      }

      if(dept_time.value === ''){
        dept_timeE.style.display = '';
        dept_time.classList.add('border', 'border-danger');
      }else{
        dept_timeE.style.display = 'none';
        dept_time.classList.remove('border', 'border-danger');
        validity++;
      }

      if(validity === 5){
        document.getElementById('mainLoader').style.display = 'flex';

        $.ajax({
          type: "POST",
          url: route,
          data: $('form#routeForm').serialize(),
          success: res=>{
            if(res.status === 'success'){
              document.getElementById('mainLoader').style.display = 'none';
              alertify.set('notifier', 'position', 'top-right');
              alertify.success('Add Route Successfully');
              document.getElementById('closeRoute').click();
              LoadRoute(load, update);
            }
          }, error: xhr => {
            console.log(xhr.responseText);
          }
        })
      }
    },

    Edit: {
      View: (id, origin, destination, buscode, time, date, code)=>{
        $('#updateRoute').modal('show');
        document.getElementById('routeCode').textContent = code;
        AssVal('routeIdUp', id);
        AssVal('UpbusCode', buscode);
        AssVal('Uporigin', origin);
        AssVal('Updestination', destination);
        AssVal('UpdepartureDate', date);
        AssVal('UpdepartureTime', time);
      },
      Update: (route, load) => {
        const code = document.getElementById('UpbusCode');
        const codeE = document.getElementById('UpbusCodeE');
  
        const origin = document.getElementById('Uporigin');
        const originE = document.getElementById('UporiginE');
  
        const destination = document.getElementById('Updestination');
        const destinationE = document.getElementById('UpdestinationE');
  
        const dept_date = document.getElementById('UpdepartureDate');
        const dept_dateE = document.getElementById('UpdepartureDateE');
  
        const dept_time = document.getElementById('UpdepartureTime');
        const dept_timeE = document.getElementById('UpdepartureTimeE');
  
        let validity = 0;
  
        if(code.value === 'none'){
          codeE.style.display = '';
          code.classList.add('border', 'border-danger');
        }else{
          codeE.style.display = 'none';
          code.classList.remove('border', 'border-danger');
          validity++;
        }
  
        
        if(origin.value === 'none'){
          originE.style.display = '';
          origin.classList.add('border', 'border-danger');
        }else{
          originE.style.display = 'none';
          origin.classList.remove('border', 'border-danger');
          validity++;
        }
  
        if(destination.value === 'none'){
          destinationE.style.display = '';
          destination.classList.add('border', 'border-danger');
        }else{
          destinationE.style.display = 'none';
          destination.classList.remove('border', 'border-danger');
          validity++;
        }
  
        if(dept_date.value === ''){
          dept_dateE.style.display = '';
          dept_date.classList.add('border', 'border-danger');
        }else{
          dept_dateE.style.display = 'none';
          dept_date.classList.remove('border', 'border-danger');
          validity++;
        }
  
        if(dept_time.value === ''){
          dept_timeE.style.display = '';
          dept_time.classList.add('border', 'border-danger');
        }else{
          dept_timeE.style.display = 'none';
          dept_time.classList.remove('border', 'border-danger');
          validity++;
        }
  
        if(validity === 5){
          document.getElementById('mainLoader').style.display = 'flex';
  
          $.ajax({
            type: "POST",
            url: route,
            data: $('form#UprouteForm').serialize(),
            success: res=>{
              if(res.status === 'success'){
                document.getElementById('mainLoader').style.display = 'none';
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Update Route Successfully');
                document.getElementById('UpcloseRoute').click();
                LoadRoute(load, route);
              }
            }, error: xhr => {
              console.log(xhr.responseText);
            }
          })
        }
      }
    }, 
    Disable: (route, load, id)=> {
    alertify.confirm("Delete Route?", "Are you sure do you want to delete this Route",
    ()=>{
      AssVal('routeDisableId', id)
      document.getElementById('mainLoader').style.display = 'flex';
     
      $.ajax({
        type: "POST",
        url: route,
        data: $('form#DisableRoute').serialize(),
        success: res=>{
          if(res.status === 'success'){
            document.getElementById('mainLoader').style.display = 'none';
            alertify.set('notifier', 'position', 'top-right');
            alertify.success('Successfully Deleted Route');
            LoadRoute(load, route);
          }
        }, error: xhr => {
          console.log(xhr.responseText);
        }
      })
    }, ()=>{
      console.log('cancel');
    }
    );
    }
  },

  UserProfile:{
    ChangeTab: tab =>{
      const general = document.getElementById('generalUpdate');
      const changePass = document.getElementById('changePassUpdate');
      const uploadPic = document.getElementById('uploadPicUpdate');

      if(tab === 'general'){
        changePass.style.display = 'none';
        uploadPic.style.display = 'none';
        general.style.display = '';
      }else if( tab==='changePass'){
        changePass.style.display = '';
        uploadPic.style.display = 'none';
        general.style.display = 'none';
      }else{
        changePass.style.display = 'none';
        uploadPic.style.display = '';
        general.style.display = 'none';
      }
    },

   UpdateGeneral: route=>{
    let validity = 0;
    validity += CheckError('fullName', 'fullNameE');
    validity += CheckError('username', 'usernameE');

    if(validity == 2){

      document.getElementById('mainLoader').style.display = 'flex';
      $.ajax({
        type:"POST",
        url: route,
        data: $('form#generalForm').serialize(),
        success: res=>{
         if(res.status === 'success'){
          document.getElementById('mainLoader').style.display = 'none';
          alertify.set('notifier', 'position', 'top-right');
          alertify.success('User Info is Updated Successfully');
         }
        }, error: xhr=>{
          console.log(xhr.responseText);
        }
      });
    }


   },
   UpdatePassword: route=>{
    let validity = 0;
    validity += CheckError('currentPass', 'currentPassE');
    validity += CheckError('newPass', 'newPassE');
    validity += CheckError('confirmPass', 'confirmPassE');
    if(validity == 3){

      document.getElementById('mainLoader').style.display = 'flex';
      $.ajax({
        type:"POST",
        url: route,
        data: $('form#changePassword').serialize(),
        success: res=>{
          document.getElementById('mainLoader').style.display = 'none';
          alertify.set('notifier', 'position', 'top-right');
         if(res.status === 'success'){
          alertify.success('Password is Updated Successfully');
         }else if(res.status === 'failed'){
          alertify.error('Current Password Does not Match');
         }else{
          alertify.error('New password does not match');
         }
        }, error: xhr=>{
          console.log(xhr.responseText);
        }
      });
    }

   },
   UpdatePic: route=>{

    const file = document.getElementById('formFile');
    if(file.files.length === 0){
      alertify.alert('No file selected', 'Please select an image before clicking upload');
    }else{
      document.getElementById('mainLoader').style.display = 'flex';
      var formData = new FormData($('#uploadProfilePic')[0]);
      $.ajax({
        type:"POST",
        url: route,
        data: formData,
        processData: false,
        contentType:false,
        success: res=>{
          document.getElementById('mainLoader').style.display = 'none';
          alertify.set('notifier', 'position', 'top-right');
         if(res.status === 'success'){
          
          alertify.success('User Profile Picture is Updated Successfully');
         }else{
          alertify.error('Picture must be Png, JPG or JPEG');
         }
        }, error: xhr=>{
          console.log(xhr.responseText);
        }
      });
    }
    
   }
  }
}
function CheckError(inp, err){
  const input = document.getElementById(inp);
  const errs = document.getElementById(err);

  if(input.value === ''){
    input.classList.add('border', 'border-danger');
    errs.style.display = '';
    return 0;
  }else{
    input.classList.remove('border', 'border-danger');
    errs.style.display = 'none';
    return 1;
  }
}

var table; 

function LoadTerminal(route, update) {
  $.ajax({
    type: "GET",
    url: route,
    dataType: "json",
    success: res => {
      if (!$.fn.DataTable.isDataTable('#terminalList')) {
        // Initialize the DataTable for the first time
        table = $("#terminalList").DataTable({
          data: res.terminal,
          columns: [
            { title: "Name", data: "term_name" },
            { title: "Location", data: "term_location" },
            { 
              title: "Actions",
              data: null,
              render: function(data, type, row) {
                return `
                  <button title="Update ${data.term_name}" onclick="Admin.Terminal.Edit.View('${data.term_id}', '${data.term_name}', '${data.term_location}')" class="btn btn-primary"><i class="icon-edit"></i></button>
                  |
                  <button title="Delete ${data.term_name}" onclick="Admin.Terminal.Disable('${update}','${route}', '${data.term_id}')" class="btn btn-danger"><i class="icon-trash"></i></button>
                `;
              },
              orderable: false
            }
          ],
          lengthMenu: [
            [5, 10, 25, 50],
            [5, 10, 25, 50, "All"],
          ],
          language: {
            lengthMenu: "Display _MENU_ Records Per Page",
            info: "Showing Page _PAGE_ of _PAGES_",
          },
          autoWidth: true,     // Enable auto width adjustment
          scrollX: false,      // Disable horizontal scrolling
          responsive: true,   
        });
      } else {
        // Update the existing DataTable with new data
        table.clear().rows.add(res.terminal).draw();
      }
    },
    error: xhr => {
      console.log(xhr.responseText);
    }
  });
}

function LoadBus(route, update){
  $.ajax({
    type: "GET",
    url: route,
    dataType: "json",
    success: res => {
      if (!$.fn.DataTable.isDataTable('#busList')) {
        // Initialize the DataTable for the first time
        table = $("#busList").DataTable({
          data: res.bus,
          columns: [
            { title: "Bus Code", data: "bus_code" },
            { title: "Bus Type", data: "bus_type" },
            { title: "Bus Seats", data: "bus_seats" },
            { 
              title: "Actions",
              data: null,
              render: function(data, type, row) {
                return `
                  <button title="Update ${data.bus_code}" onclick="Admin.Bus.Edit.View('${data.bus_id}', '${data.bus_code}', '${data.bus_type}', '${data.bus_seats}')" class="btn btn-primary"><i class="icon-edit"></i></button>
                  |
                  <button title="Delete ${data.bus_code}" onclick="Admin.Bus.Disable('${update}','${route}', '${data.bus_id}')" class="btn btn-danger"><i class="icon-trash"></i></button>
                `;
              },
              orderable: false
            }
          ],
          lengthMenu: [
            [5, 10, 25, 50],
            [5, 10, 25, 50, "All"],
          ],
          language: {
            lengthMenu: "Display _MENU_ Records Per Page",
            info: "Showing Page _PAGE_ of _PAGES_",
          },
          autoWidth: true,     // Enable auto width adjustment
          scrollX: false,      // Disable horizontal scrolling
          responsive: true,   
        });
      } else {
        // Update the existing DataTable with new data
        table.clear().rows.add(res.bus).draw();
      }
    },
    error: xhr => {
      console.log(xhr.responseText);
    }
  });
}


function LoadRoute(route, update){
  $.ajax({
    type: "GET",
    url: route,
    dataType: "json",
    success: res => {
      if (!$.fn.DataTable.isDataTable('#routeList')) {
        // Initialize the DataTable for the first time
        table = $("#routeList").DataTable({
          data: res.route,
          columns: [
            { title: "Route Code", data: "route_code" },
            { title: "Route", data: "route" },
            { title: "Bus Code", data: "bus_code" },
            { title: "Departure Date", data: "route_departure_date" },
            { title: "Departure Time", data: "route_departure_time" },
            { 
              title: "Actions",
              data: null,
              render: function(data, type, row) {
                return `
                  <button title="Update ${data.bus_code}" onclick="Admin.Route.Edit.View('${data.route_id}', '${data.term_id_from}', '${data.term_id_to}', '${data.bus_id}', '${data.route_departure_time}', '${data.route_departure_date}', '${data.route_code}')" class="btn btn-primary"><i class="icon-edit"></i></button>
                  |
                  <button title="Delete ${data.bus_code}" onclick="Admin.Route.Disable('${update}','${route}', '${data.route_id}')" class="btn btn-danger"><i class="icon-trash"></i></button>
                `;
              },
              orderable: false
            }
          ],
          lengthMenu: [
            [5, 10, 25, 50],
            [5, 10, 25, 50, "All"],
          ],
          language: {
            lengthMenu: "Display _MENU_ Records Per Page",
            info: "Showing Page _PAGE_ of _PAGES_",
          },
          autoWidth: true,     // Enable auto width adjustment
          scrollX: false,      // Disable horizontal scrolling
          responsive: true,   
        });
      } else {
        // Update the existing DataTable with new data
        table.clear().rows.add(res.route).draw();
      }
    },
    error: xhr => {
      console.log(xhr.responseText);
    }
  });
}
function AssVal(id, value){
  document.getElementById(id).value = value;
}


function LoadBookedList(route){
  $.ajax({
    type: "GET",
    url: route,
    dataType: "json",
    success: res => {
      if (!$.fn.DataTable.isDataTable('#bookedList')) {
        // Initialize the DataTable for the first time
        table = $("#bookedList").DataTable({
          data: res.book,
          
          columns: [
            { title: "Booking Code", data: "booking_code" },
            { title: "Full Name", data: "fullname" },
            { title: "Email", data: "booking_email" },
            { title: "Contact", data: "booking_contact" },
            { title: "Reserve Seats", data: "booking_seats" },
           
          ],
          lengthMenu: [
            [5, 10, 25, 50],
            [5, 10, 25, 50, "All"],
          ],
          language: {
            lengthMenu: "Display _MENU_ Records Per Page",
            info: "Showing Page _PAGE_ of _PAGES_",
          },
          autoWidth: true,     // Enable auto width adjustment
          scrollX: false,      // Disable horizontal scrolling
          responsive: true,   
        });
      } else {
        // Update the existing DataTable with new data
        table.clear().rows.add(res.book).draw();
      }
    },
    error: xhr => {
      console.log(xhr.responseText);
    }
  });
}

document.getElementById('formFile').addEventListener('change', function(event) {
  const file = event.target.files[0];
  if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
          const img = document.getElementById('profilePic');
          img.src = e.target.result;
      }
      reader.readAsDataURL(file);
  }
});

function LoadFeedback(route){
  $.ajax({
    type: "GET",
    url: route,
    dataType: "json",
    success: res => {
      if (!$.fn.DataTable.isDataTable('#feedback')) {
        // Initialize the DataTable for the first time
        table = $("#feedback").DataTable({
          data: res.feedback,
          columns: [
            { title: "Full Name", data: "fullname" },
            { title: "Email", data: "fb_email" },
            { title: "Message", data: "fb_message" },
          ],
          lengthMenu: [
            [5, 10, 25, 50],
            [5, 10, 25, 50, "All"],
          ],
          language: {
            lengthMenu: "Display _MENU_ Records Per Page",
            info: "Showing Page _PAGE_ of _PAGES_",
          },
          autoWidth: true,     // Enable auto width adjustment
          scrollX: false,      // Disable horizontal scrolling
          responsive: true,   
        });
      } else {
        // Update the existing DataTable with new data
        table.clear().rows.add(res.feedback).draw();
      }
    },
    error: xhr => {
      console.log(xhr.responseText);
    }
  });
}