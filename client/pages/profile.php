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
  

  $profile_info = json_decode(file_get_contents('../../folds/'. $user_id . '_id/user_profile.json'));

  $acct_info = json_decode(file_get_contents('../../folds/'. $user_id . '_id/account.json'));

  $user = $profile_info->personal_info;
  $bank = $profile_info->bank_info;

  // var_dump($acct_info->amt)
// print_r($user->full_name);
  // die();
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
  </div>  



  <!-- the bottom nav section -->
    <!-- <nav>
      <div class="nav-bar ">
        <div class="active">
          <a href="../index.html"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="../pages/contact.html"><i class="fa fa-commenting" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="../pages/settings.html"><i class="fa fa-cogs" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="../pages/profile.html"><i class="fa fa-user" aria-hidden="true"></i></a>
        </div>
      </div>
    </nav> -->


    <div class="section-1">
      <div class="container midi-font small-font">
          <div class="long-card">
            <input hidden type="text" id="get_user_id" value="<?php echo $_SESSION['user_id'] ?>">
            <div>
              <h4 class="sub-text vat-margin">accounts</h4>
              <div class="display-flex">
                <div>
                  <span>available amt</span>
                  <h3>$</h3>
                </div> 
                <div>
                  <h1>|</h1>
                </div>   
                <div>
                  <h5 class="hor-margin text-blue">+15%</h5>
                  <span>invested amt</span>
                  <h3>+</h3>
                </div>    
              </div>
            </div>
          </div>
          <div class="long-card small-font">
            <!-- <div class="sub-text-midi"><h4>Profile</h4></div> -->
            <div class=""><h3>Profile</h3></div>
            <div class="display-flex vat-margin sub-text-mini">
              <div>
              <div class="nav-profile-img">
                <img src="../img/profile1.png" alt="">
              </div>                
              </div>
              <div class="sub-text-mini">
                <h5>Full Name</h5>
                <h4 class=""><?php echo $user->full_name ?></h4>
              </div>
            </div>
            <div class="display-flex vat-margin sub-text-mini">
              <div class="sub-text-mini">
                <h5>Phone <i class="fa fa-phone"></i></h5>
                <h4><?php echo $user->phone_1 ?></h4>
              </div>
              <div class="sub-text-mini">
                <h5>account type</h5>
                <h4 class="gold-tag"><?php echo $bank->acct_status ?></h4>
              </div>
            </div>
            <div class="display-flex vat-margin sub-text-mini">
              <div class="sub-text-mini">
                <h5>Address</h5>
                <h4><?php echo $user->address ?></h4>
              </div>
              <div class="sub-text-mini">
                <h6>Email</h6>
                <h4 class=""><?php echo $user->email ?></h4>
              </div>
            </div>
          </div>        
          <div class="long-card midi-font small-font">
            
            <h3>My Bank Details <i class="fa fa-bank"></i></h3>
            <div class="">
              <div class="sub-text-mini vat-margin">
                <h5 class="">Account Name <i class="fa fa-user"></i></h5>
                <h3 class=""><?php echo $bank->account_name ?></h3>
              </div>
              <div class="sub-text-mini vat-margin">
                <h5 class="">Bank Name <i class="fa fa-bank"></i></h5>
                <h3 class=""><?php echo $bank->bank_name ?></h3>
              </div>
              <div class="sub-text-mini vat-margin">
                <h5 class="">Account Number <i class="fa fa-"></i></h5>
                <h3 class=""><?php echo $bank->account_number ?></h3>
              </div>
            </div>
          </div>   
          <div class="long-card display-flex">
            <a href="./edit-profile.php">
              <button class="link-btn-4 text-white">Edit Profile</button></a>
            
          </div>
          
          </div>
        </div>
        
      </div>
    </div>

   <script src="../js/profile.js"></script>
</body>
</html>