<?php

session_start();
       # check if the LOGGED IN 
// Check if the user is logged in, if not then redirect him to login page
if($_SESSION["status"] === true){
 
}else {
  header('location: ../logs/pages/login.php');
  die();
}

$user_id = $_SESSION['user_id'];

$file_data = json_decode(file_get_contents('./../folds/'. $user_id .'_id/account.json'), true);

$account_balance = $file_data['data']['acct_balance'];
$total_invested = $file_data['data']['total_invested'];

var_dump($file_data['data']['total_invested']);

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
        <div class="notification">
          <h6 class="top-title"><i class="fa fa-bell"></i></h6>
          <span>3</span>
        </div>
        <!-- other links -->
        <div>
          <a href="../admin/index.php" class="link-btn-5 text-white">Admin<i class="fa fa-sign-in"></i></a>
        </div>
        <div>
          <a href="../logs/pages/logout.php" class="link-btn-4 text-white">Log-Out<i class="fa fa-sign-out"></i></a>
        </div>
      </div>
  </div>  



  <!-- the bottom nav section -->
    <nav>
      <div class="nav-bar ">
        <div class="active">
          <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/contact.php"><i class="fa fa-commenting" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/settings.php"><i class="fa fa-cogs" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/profile.php"><i class="fa fa-user" aria-hidden="true"></i></a>
        </div>
      </div>
    </nav>


    <div class="section-1">
      <div class="container">
        <div class="card-body-1">
          <div class="long-card">
            <input type="text" hidden id="get_user_id" value="<?php echo $_SESSION['user_id'] ?>">
            <div>
              <!-- <h6 class="sub-text vat-margin">account</h6> -->
              <div class="display-flex"> 
                <div>
                  <h6 class="vat-margin">Account Name</h6>
                  <p class="sub-text-mini"><?php echo $_SESSION['name'] ?></p>
                </div>    
                <div><h1>|</h1></div>
                <div>
                  <h5 class="vat-margin text-blue">+15% of deposit</h5>
                  <span></span>
                  <h3 class="sub-text-mini">₦<?php echo $total_invested ?></h3>
                </div>    
              </div>
            </div>
          </div>
          <!-- nav link profile -->
          <!-- <div class="long-card">

            <div class="nav-profile">
              <h4 class="sub-text vat-margin">Profile</h4>
              <div class="display-flex">
                 <div class="display-flex">
                     <div class="nav-profile-img">
                        <img src="img/profile1.png" alt="">
                     </div>
                     <div class="nav-profile-text hor-margin">
                       <h4>Koji James</h4>
                     </div> 
                </div>
                <div>
                    <h4>account type</h4>
                    <h4 class="gold-tag">Gold</h4>
                </div>
              </div>
             
            </div>
          </div> -->
        </div>
        <div class="card-body-2">
          <div class="small-card">
              <div>
                <h5>pay into your account</h5>
              </div>
              <div>
                <h5><a class="link-btn-1" href="./pages/pay.php">Pay </a></h5>  
              </div>       
          </div>
          <div class="small-card">
              <div>
                <h5>widthdraw account</h5>
              </div>
            <div>
              <h5><a class="link-btn-2" href="./pages/withdraw.php"> widthdraw </a></h5>
            </div>   
          </div>
          <div class="small-card">
              <div>
                <h5>View History</h5>
              </div>
            <div class="display-flex">
                 <h5><a class="link-btn-4" href="./pages/history.php"> History </a></h5>
                <div class="notification">
                  <h6 class="top-title"><i class="fa fa-bell"></i></h6>
                  <span>5</span>
                </div>              
            </div>   
          </div>
          <div class="small-card">
              <div>
                <h4><i class="fa fa-charts"></i></h4>
                <h5>See all earnings Chart</h5>
              </div>
            <div>
              <h5><a class="link-btn-3" href="./pages/rates.html"> 
               Rates </a></h5>
            </div>   
          </div>
        </div>
      </div>
    </div>

<script src="./js/main.js"></script>
</body>
</html>