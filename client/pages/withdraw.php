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
  .bg-dark{
    background: #464f65;
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
          <a class="link-btn-3 text-white" href="../index.php"><i class="fa fa-chevron-left"></i></a>
        </div>
      </div>
      <input hidden type="text" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
  </div>  

    <div class="section-1">
      <div class="container">
        <div class="card-body-1">
          <div class="long-card">
            <div>
              <h4>accounts</h4>
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
          <div class="long-card display-flex">
             <button id="request_form" class="link-btn-5 bg-dark"><h4>Debit Invoice</h4> <i class="fa fa-invoice"></i>
            </button>
            <input type="text" class="link-btn-3 text-white" readonly value="Ticket" id="invoice_note">
            <div>
              <a href="./withdraw-history.php">history <i class="fa fa-history"></i></a>
            </div>
            
          </div>
           
            <div class="invoice-card-form small-font">
               
            </div> 
        </div>          
      </div>
    </div>


<script>
  
  const form_body = document.querySelector('.invoice-card-form')
  const request_form = document.getElementById('request_form')
  let user_id = document.getElementById('user_id')
   user_id = user_id.value

   let userArray = []
   let withdraw_history = []
   let dynamic_id;
const random_id = (e) => {
    let id = Math.floor(1000000 + Math.random() * 9000000);
    dynamic_id = id;
}
random_id()

const populateProfile = (infos) => {

    let user = infos.personal_info
    let bank = infos.bank_info

    let date = new Date().getFullYear()

    let output = `
    <div>
      <form action="">
        <div>
            <h5>Invoice Status</h5>
            <h3>Not Credited</h3>
        </div>
        <div class="display-flex">
            <div>
                <h5>Date</h5>
                <h4>${date}</h4>
            </div>
            <div>
                <h5>Invoice Id</h5>
                <h4>${dynamic_id}</h4>
            </div>
        </div>
        <div class="display-flex">
            <div>
                <h5>due Date</h5>
                <h4>${date}</h4>
            </div>
            <div>
                <h5>callk office <i class="fa fa-phone"></i>
                </h5>
                <h4>${user.phone_1}</h4>
            </div>
        </div>
          <div class="display-flex">
          <div class="">
            <h5>Client Full Name</h5>
            <h4>${user.full_name}</h4>
          </div>
          <div class="">
            <h5>Email</h5>
            <h4>${user.email}</h4>
          </div>
          </div>
          <div class="sub-text-mini display-col">
            <h4 class="hor-margin">NOTE</h4>
            <h5 class="hor-margin">Change Account details from profile</h5>
          </div>
          <div class="display-flex">
            <div>
                <h4>Bank Name</h4>
                <h3>${bank.bank_name}</h3>
            </div>
            <div>
                <h4>Account Name</h4>
                <h3>${bank.account_name}</h3>
            </div>
          </div>
          <div class="display-flex">
            <div>
                <div class="sub-text">
                    <h4>For Cash Request</h4>
                </div>
            </div>
            <div>
                <h4>Come To Office</h4>
            </div>
          </div>
          <!-- / this is the inputs of the form  / -->
          <div>
            <span class="error-text"></span>
          </div>
          <div class="display-flex">
            <div>
                <label class="form-label" for="amt">Amount #</label> 
                <input class="form-input" id='request_amt' type="number">                       
            </div>
          </div> 
                <!--  payment types  -->
          <div class="">
            <div class="display-flex">
                <div>
                    <h4>Methods Recieve Your Money <i class="fa fa-credit-card"></i> </h4>
                </div>
                <div>
                    <select name="" id="request_method">
                        <option value="transfer">Transfer<h4></h4></option>
                        <option value="cash"><h4>Cash</h4></option>
                        <option value="wallet">E-Wallet<h4></h4></option>
                    </select>
                </div>
            </div>
          </div>
          <div class="display-flex">
            <button class="generate-btn link-btn-5" id='generate_btn'>Generate Invoice</button>
            <button class="cancle-btn link-btn-4 text-white" id='cancel-btn'>Cancel</button>
          </div>
        </form>     
    </div>
    `;

    form_body.innerHTML = output
}

const getUserInfo = async () => {

    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${user_id}&api_key=1234567890&request_type=get_all_data`)

    const data = await response.json()

    let infos = data.profile;
    userArray = infos
    populateProfile(infos)
}

const get_all_withdraws = async () => {
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${user_id}&api_key=1234567890&request_type=get_all_withdraws`)

    const data = await response.json()

    withdraw_history = data

    console.log(withdraw_history)
}

const process_withdraw = async (form_obj) => {
    const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
        method:'POST',
        headers:{
            'Content-Type' :'application/json',
        },
        body: JSON.stringify(form_obj)
    })

    const data = await response.json()
    // console.log(withdraw_history)
}

form_body.addEventListener('click', (e) => {
  e.preventDefault()
  const request_amt = document.getElementById('request_amt')
  const request_method = document.getElementById('request_method')
 

  if(e.target.classList.contains('generate-btn')){ 

      let debit_details = {
        'withdraw_details' : {
        'user_id' : user_id,
        'invoice_id' : dynamic_id,
        'request_amt' : request_amt.value,
        'request_method' : request_method.value,
        'date' : new Date().getFullYear()
        }}

      let new_obj = {
        ...userArray,
        ...debit_details,
        'user_id' : user_id,
        'invoice_id' : dynamic_id,
        'status': {
          'invoice_status' : 'Not Sent',
          'invoice_type' : 'withdraw',
          'turn_btn' : '',
          'style' : 'link-btn-4',
          'msg_status' : '',
          'msg_error' : '',
          'deliverd' : '',
          'btn_msg' : 'Send to Confirm',
          'date' : '20/20/20/'
        }
      }

      // withdraw_history.user_data.push(new_obj)
      withdraw_history.user_data.push(new_obj)

      let data = {
        'api_key' : '1234567890',
        'request_type' : 'create_withdraw',
        'user_id' : user_id,
        'user_data' : withdraw_history.user_data
      }
      console.log(withdraw_history.user_data)

      process_withdraw(data)


      form_body.innerHTML = `
        <div>
          <a href="./history.php">
            Send Confirmation From Your History <i class='fa fa-history'></i>
          </a>
        </div>
      `;

  }else if(e.target.classList.contains('cancle-btn')){
    // console.log('cancle btn')
    form_body.style.display = 'none'
  }
})
  request_form.addEventListener('click', (e) => {
    // populateProfile()
    form_body.style.display = 'block'
    getUserInfo()
  })

  get_all_withdraws()

form_body.style.display = 'none'
</script>    
</body>
</html>