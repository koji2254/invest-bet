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

  // $profile_info = json_decode(file_get_contents('../../folds/'. $user_id . '_id/user_profile.json', true));

  // $acct_info = json_decode(file_get_contents('../../folds/'. $user_id . '_id/account.json', true));

  $file_data = json_decode(file_get_contents('../../folds/'. $user_id .'_id/account.json'), true);

  $info_data = json_decode(file_get_contents('../../folds/'. $user_id .'_id/user_profile.json'), true);

  $account_balance = $file_data['data']['acct_balance'];
  $total_invested = $file_data['data']['total_invested'];

  // print_r($info_data['personal_info']);
  // print_r($info_data);
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
          <a class="link-btn-3 text-white" href="../index.php"><i class="fa fa-chevron-left"></i></a>
        </div>
      </div>
      <input type="text" id="user_id" hidden readonly value="<?php echo $user_id ?>">
  </div>  



    <div class="section-1">
      <div class="container">
        <div class="card-body-1">
          <div class="long-card">
            <h3><?php echo $info_data['personal_info']['full_name'] ?></h3>
            <div>
              <h4></h4>
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
        </div>

        <!-- / Generate Invoice / -->
        <div class="invoice-card-body">
           <div class="display-flex">
            <button id="generate_pay" class="link-btn-5 vat-margin"><h4>Request Payment Invoice</h4> <i class="fa fa-invoice"></i>
            </button> 
            
            <input id="invoice_part" class="link-btn-3 text-white" type="text" value="" disabled>
           </div>

            <div class="invoice-card-form small-font show-not " id="payment_form">
               <form action="">
                <div class="display-flex">
                    <div>
                      <h5>Invoice Status</h5>
                      <h3 id="invoice_status">Not Paid</h3>
                    </div>
                    <div>
                        <h5>Invoice Id</h5>
                        <h4 id="invoice_id">23456789</h4>
                    </div>                   
                 </div>
                <div class="display-flex">
                    <div>
                        <h5>Date</h5>
                        <h4 id="date">20/20/2030</h4>
                    </div>
                    <div>
                        <h5><i class="fa fa-phone"></i> call</h5>
                        <h4 id="phone_1">0909298383</h4>
                    </div>
                </div>
                <div class="display-flex">
                    <div>
                        <h5>due Date</h5>
                        <h4 id="due_date"></h4>
                    </div>
                    <div>
                        <h5>User Id</h5>
                        <h4 id="user_id"><?php echo $user_id ?></h4>
                    </div>
                </div>
                 <div class="display-flex">
                 <div class="">
                    <h5>Client Full Name</h5>
                    <h4 id="full_name"><?php echo $info_data['personal_info']['full_name'] ?></h4>
                 </div>
                 <div class="">
                    <h5>Email</h5>
                    <h4 id="email"><?php echo $info_data['personal_info']['email'] ?></h4>
                 </div>
                 </div>
                 <!-- / this is the inputs of the form  / -->
                 <div>
                    
                 </div>
                 <div class="display-flex">
                    <div>
                        <label class="form-label" for="amt">Amount #</label> 
                        <input class="form-input" id="form_amount" type="number"> 
                       
                    </div>
                    <div>
                        <label class="form-label" for="amt">Exp*10% <span class="text-blue"><bold>+</bold> </span></label>
                        <input class="form-input" type="number" id="exp_amount" value="" readonly> 
                    </div>
                 </div>
                      <div class="bg-white">
                            <label class="form-label" for="amt">Promo Code *</label>
                            <input class="form-input" type="number" id="promo_code" value="" readonly> 
                        </div>
                        <div>
                            <label class="form-label" for="">Niration *</label>
                            <input id="niration" class="form-input" type="text">
                       </div>  
                       <!--  payment types  -->
                    <div class="">
                      <div class="display-flex">
                          <div class="vat-margin">
                              <h4>Methods to Pay <i class="fa fa-credit-card"></i> </h4>
                          </div>
                          <div>
                              <select name="" id="pay_method">
                                  <option value="transfer">Transfer<h4></h4></option>
                                  <option value="cash"><h4>Cash</h4></option>
                                  <option value="wallet">E-Wallet<h4></h4></option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <div>
                      <h4 class="sub-text-mini mid-font">Our Bank Options</h4>
                    </div>
                    <div class="display-flex">
                      <div class="sub-text-mini">
                        <h4>First bank <i class="fa fa-bank"></i></h4>
                        <h4>3120563910</h4>
                        <h4>Bet Invest Org</h4>
                      </div>
                      <div class="sub-text-mini">
                        <h4>Zenith Bank  <i class="fa fa-bank"></i></h4>
                        <h4>2251819550</h4>
                        <h4>Bet Invest Org</h4>
                      </div>
                    </div>
                  <div class="display-flex">
                    <button id="confirm_invoice" class="link-btn-5">Confirm Invoice</button>
                    <button id="cancle_form" class="link-btn-4 text-white">Cancel</button>
                  </div>
               </form> 
            </div> 
            <!-- End of long form -->
        </div>          
      </div>
    </div>


    <script src="../js/pay.js"></script>
</body>
</html>