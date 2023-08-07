<?php

  session_start();
        # check if the LOGGED IN 
  // Check if the user is logged in, if not then redirect him to login tpage
  if($_SESSION["status"] === true){
  
  }else {
    header('location: ../../logs/pages/login.php');
    die();
  }

  $user_id = $_SESSION['user_id'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/main.css">
    <title>Invest-Bet</title>
</head>

<style>
  a {
    color: #000;
  }
</style>
<body>    
  <!-- the top nav section -->
  <div class="top-top-nav small-font">
      <div class="top-nav">     
        <div class="sub-text text-red hor-margin">
            <h5>Money To Send</h5>
            <i class="fa fa-upload" aria-hidden="true"></i>
        </div>
        <!-- <div>
          <h3>List Request withdraw <i class="fa fa-money" aria-hidden="true"></i></h3>
        </div>         -->
    
        <!-- other links -->
        <div>
          <a class="link-btn-3 text-white small-font" href="../index.php"><i class="fa fa-home"></i></a>
        </div>
      </div>
      <input type="text" id="user_id" hidden readonly value="<?php echo $user_id ?>">
  </div>  



    <div class="section-1">
      <div class="container">
        <div class="card-body-1">
        </div>

        <div class="invoice-history-page">
            <div class="display-flex vat-margin hor-margin">
                <div>
                    <h4 class="text-white">Filter By <i class="fa fa-filter"></i></h4>
                </div>
                <select class="link-btn-3 " name="" id="">
                    <option value="date">Date</option>
                    <option value="date">cleard</option>
                    <option value="date">Pending</option>
                    <option value="date">All</option>
                </select>
            </div>
            <div class="invoice-history-body">
                                
            </div>
        </div>

      </div>
    </div>

    
  <!-- the bottom nav section -->
    <nav>
      <div class="nav-bar ">
        <div class="active">
          <a href="../index.html"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/contact.html"><i class="fa fa-commenting" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/settings.html"><i class="fa fa-cogs" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/profile.html"><i class="fa fa-user" aria-hidden="true"></i></a>
        </div>
      </div>
    </nav>


<script>

  let user_id = document.getElementById('user_id')
  user_id = user_id.value
  const history_body = document.querySelector('.invoice-history-body')

  const fill_table = (data) => {
    let output; 
    console.log(data)
    data.forEach((item) => {
     output = `
      <a href="./single-with.php?id=${item.invoice_id}&uuid=${item.user_id}">
      <div class="invoice-history-card display-flex vat-margin bg-white small-font">
        <div>
          <h6></h6>
          <h5 class='sub-text-mini'>${item.personal_info.full_name}</h5>  
        </div>
        <div>
          <h4 class='sub-text-mini'>₦ ${item.withdraw_details.request_amt}</h4>  
        </div>
        <div>
          <h6></h6>
          <p class='${item.status.style} text-white'>${item.status.invoice_status}</p>  
        </div>
      </div> 
      </a>      
      `;
    history_body.innerHTML += output;
  })
  }


  const get_history = async () => {
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${user_id}&api_key=1234567890&request_type=withdraw_history`,{
        method:'GET',
        headers:{
            'Content-Type' :'application/json',
        },
    }) 
    const data = await response.json()
    // console.log(data)
    fill_table(data.base_data)
 }

 get_history()         
</script>

</body>
</html>

