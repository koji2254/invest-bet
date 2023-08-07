<?php

  session_start();
        # check if the LOGGED IN 
  // Check if the user is logged in, if not then redirect him to login tpage
  if($_SESSION["status"] === true){
      
  }else {
    header('location: ../../logs/pages/login.php');
    die();
  }

  // $user_id = $_SESSION['user_id'];

  $acct_info = json_decode(file_get_contents('./../folder/active/mainAccount.json'),true);

  // $user = $profile_info->personal_info;
  $bank = $acct_info['data'];

  // var_dump($bank);
  // die();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">
    <title>Invest-Bet</title>
</head>
<body>    
  <!-- the top nav section -->
  <div class="top-top-nav">
      <div class="top-nav">
        <div>
          <h3> Admin dash-Board</h3>
        </div>
        <div>
          <a href="./pages/logout.php" class="link-btn-4 text-white">Log-Out<i class="fa fa-sign-out"></i></a>
        </div>
      </div>
  </div>  



  <!-- the bottom nav section -->
    <nav>
      <div class="nav-bar ">
        <div class="active">
          <a href="index.html"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/email.html"><i class="fa fa-commenting" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/settings.html"><i class="fa fa-cogs" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/profile.php"><i class="fa fa-user" aria-hidden="true"></i></a>
        </div>
      </div>
    </nav>


    <div class="section-1">
      <div class="container">
        <!--  -->
         <!-- <div class="long-card midi-font small-font"> -->
            <div class="sub-text-mini btn-good display-flex hor-margin vat-margin">
              <p class="small-font">Sesssion is Runing . . . . . . . . . . .</p>
              <div class="small-loading-gif btn-good">
                <img src="./img/Loading_icon.gif" alt="">
              </div>
            </div>  
         <!-- </div> -->
        <!-- ----------- -->
        <!--  -->
         <div class="long-card">
            <div>
                <h4></h4>
            </div>
            <div class="display-col">
              <div class="display-flex bg-white sub-text-mini ">
                <div>
                   <p>Invested Total</p>
                   <h4 class="sub-text-mini">₦ <?php echo $bank['total_balance'] ?></h4>
                </div>
                <div><h2>|</h2></div>
                <div>
                   <p>Total invested <span class="text-blue">+15%</span></p>
                   <h4 class="sub-text-mini">₦ <?php echo $bank['total_invested'] ?></h4>
                </div>
              </div>
              <div class="display-flex">
                <div>

                </div>
              </div>
            </div>
         </div>
        <!-- ----------- -->
        <div class="card-body-2">
          <div class="small-card">
              <div>
                <h5>Admin Actions</h5>
              </div>
              <div>
                 <a href="./pages/admin-actions.php">
                  <button class="link-btn-dark"><h4>Admin Actions</h4></button>
                 </a>
              </div>       
          </div>
          <div class="small-card">
              <div>
                <h5>widthdraw List Of clients</h5>
              </div>
            <div>
              <h5><a class="link-btn-2" href="./pages/withdraw-list.php"> widthdraw Invoice</a></h5>
            </div>   
          </div>
          <div class="small-card">
              <div>
                <h4 class="">List of all paymets</h4>
              </div>
            <div class="display-flex">
                 <h5><a class="link-btn-1" href="./pages/payment-list.php"> Payments </a></h5>
                <div class="notification">
                  <!-- <h6 class="top-title"><i class="fa fa-bell"></i></h6> -->
                  <!-- <span>5</span> -->
                </div>              
            </div>   
          </div>
          <div class="small-card">
              <div>
                <h4><i class="fa fa-charts"></i></h4>
                <h5>See all earnings Chart</h5>
              </div>
            <div>
              <h5><a class="link-btn-3" href="./pages/rates.php"> 
               Rates </a></h5>
            </div>   
          </div>
          <div class="small-card">
              <div>
                <h4><i class="fa fa-charts"></i></h4>
                <h5>View all profiles</h5>
              </div>
            <div>
              <h5><a class="link-btn-3" href="./pages/users.html"> 
               Users Account </a></h5>
            </div>   
          </div>
        </div>
    
        </div>
    </div>
    <!--   -->
       <div class="pop-body">
          <div class="pop-card">
            <div>
              <form action="">
                <div>
                  <label for="" class="form-label link-btn-dark">admin pin</label>
                  <input type="text" class="pop-input">
                </div>
                <div>
                  <button class="link-btn-1 vat-margin">Verify</button>
                </div>
              </form>
            </div>
         </div>
       </div>
      
          <!--  -->
    

</body>
</html>