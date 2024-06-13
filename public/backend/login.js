function Login(route, dashboard){
    document.getElementById('mainLoader').style.display = 'flex';

    $.ajax({
      type: "POST",
      url: route,
      data: $('form#adminLogin').serialize(),
      success: res => {
        const box = document.getElementById('errorBox');
        if(res.status === 'success'){
            window.location.href = dashboard;
        }else if(res.status === 'incorrect'){
            document.getElementById('mainLoader').style.display = 'none';
            box.classList.add('mt-4');
           box.innerHTML = `<div class="alert border border-danger text-center alert-dismissible fade show" role="alert">
           Incorrect Password
           </div>`;
        }else{
            document.getElementById('mainLoader').style.display = 'none';
            box.classList.add('mt-4');
            box.innerHTML = `<div class="alert border border-danger text-center alert-dismissible fade show" role="alert">
            User Not Found
            </div>`;
        }

      }, error: xhr => {
        console.log(xhr.responseText);
      }
    });
}

function ShowPass(id){
  const pass = document.getElementById(id);
  if(pass.type === 'text'){
    pass.type = 'password';
  }else{
    pass.type = 'text';
  }
}