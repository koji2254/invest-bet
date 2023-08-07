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

  $profile_info = json_decode(file_get_contents('../../folds/'. $user_id . '_id/user_profile.json', true));


  // var_dump($acct_info->amt)

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
<body>    
  <!-- the top nav section -->
  <div class="top-top-nav">
      <div class="top-nav">
        <div class="notification">
          <h6 class="top-title"><i class="fa fa-bell"></i></h6>
          <span>3</span>
        </div>
        <!-- other links -->
        <div>
          <a class="link-btn-3 text-white" href="../index.php"><i class="fa fa-home"></i></a>
        </div>
      </div>
      <input type="text" id="user_id" readonly hidden value="<?php echo $user_id ?>">
  </div>  



    <div class="section-1">
      <div class="container">
        <div class="card-body-1">
          <!-- <div class="long-card">
            <div>
              <h4>accounts</h4>
              <div class="display-flex">
                <div>
                  <span>available amt</span>
                  <h3></h3>
                </div> 
                <div>
                  <h1>|</h1>
                </div>   
                <div>
                  <h5 class="hor-margin text-blue">+15%</h5>
                  <span>invested amt</span>
                  <h3></h3>
                </div>    
              </div>
            </div>
          </div> -->
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
            <div id="invoice-history-body" class="invoice-history-body">
                <!-- <div class="invoice-history-card display-flex vat-margin hor-margin bg-white small-font">
                    <div>
                      <h6>date</h6>
                      <h4>20/20/2030</h4>  
                    </div>
                    <div>
                      <h6>type</h6>
                      <h4>Pay-In</h4>  
                    </div>
                    <div>
                      <h6>amount</h6>
                      <h4>$5,000</h4>  
                    </div>
                    <div>
                      <h6>status</h6>
                      <h4>cleared</h4>  
                    </div>
                    <div>
                      <a href="./single-history.php"><button class="link-btn-5 text-white">Open</button></a>  
                    </div> 
                </div> -->
            </div>
        </div>

      </div>
    </div>

    
  <!-- the bottom nav section -->
  

<script>
  let user_id = document.getElementById('user_id')
  user_id = user_id.value;

 const fill_table = (data) => {
  const history_body = document.getElementById('invoice-history-body')
   let output = '';
   data.forEach((item) => {
     output = `
      <div class="invoice-history-card display-flex vat-margin hor-margin bg-white small-font">
          <div class='sub-text-mini'>
            <h6>amount</h6>
            <h5>$ ${item.data.form_amount}</h5>  
          </div>
          <div>
            <h6></h6>
            <p class='${item.status.style} text-white'>${item.status.invoice_status}</p>  
          </div>
          <div>
            <a href="./single-history.php?id=${item.data.invoice_id}"><button class="link-btn-4 text-white">Open</button></a>  
          </div> 
      </div>
      </br>
     `;
     history_body.innerHTML += output;
   })
 }

  const get_history = async () => {
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${user_id}&api_key=1234567890&request_type=get_all_history`,{
        method:'GET',
        headers:{
            'Content-Type' :'application/json',
        },
    })
    const data = await response.json()

    fill_table(data)
  
 }



 get_history()

</script>
</body>
</html>