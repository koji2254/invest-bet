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
<style>
  a {
    color: #000;
  }
</style>
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
          <a class="link-btn-3 text-white" href="./withdraw.php"><i class="fa fa-chevron-left"></i></a>
        </div>
      </div>
      <input type="text" id="user_id" readonly hidden value="<?php echo $user_id ?>">
  </div>  



    <div class="section-1">
      <div class="container">
        <div class="card-body-1">
          <div class="long-card">
            <div>
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
              
            </div>
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
  user_id = user_id.value;

 const fill_table = (data) => {
  const history_body = document.getElementById('invoice-history-body')
   let output = '';
   data.forEach((item) => {
     output = `
        <a href="./withdraw-single.php?id=${item.invoice_id}">
            <div class="invoice-history-card display-flex vat-margin hor-margin bg-white small-font">
            <div>
            <h6>amount</h6>
            <h5>$ ${item.withdraw_details.request_amt}</h5>  
            </div>
            <div>
            <h4 class='link-btn-3 text-white'>${item.status.invoice_type}</h4>  
            </div>
            <div>
            <button class="${item.status.style} text-white">${item.status.invoice_status}</button>
            </div> 
            </div>  
       </a>  
    
      </br>
     `;
     history_body.innerHTML += output;
   })
 }

const get_all_withdraws = async () => {
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${user_id}&api_key=1234567890&request_type=get_all_withdraws`)

    const data = await response.json()

    // withdraw_history = data
    console.log(data)
    fill_table(data.user_data)
}



 get_all_withdraws()

</script>
</body>
</html>