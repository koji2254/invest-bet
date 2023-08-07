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

  $invoice_id = $_GET['id'];

  // $profile_info = json_decode(file_get_contents('../../folds/'. $user_id . '_id/user_profile.json', true));

  // $acct_info = json_decode(file_get_contents('../../folds/'. $user_id . '_id/account.json', true));

  // $user = $profile_info->personal_info;
  // $bank = $profile_info->bank_info;

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
<style>
  .link-btn-5,
  .btn-danger,
  .link-btn-4 {
    font-size: 10px;
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
          <a class="link-btn-3 text-white" href="./payment-list.php"><i class="fa fa-chevron-left"></i></a>
        </div>
      </div>
      <input type="text" id="user_id" hidden readonly value="<?php echo $user_id ?>">
      <input type="text" id="invoice_id" hidden readonly value="<?php echo $invoice_id ?>">
  </div>  



    <div class="section-1">
      <div class="container">
                <!-- / Generate Invoice / -->
        <div class="invoice-card-body">
            
        </div>   

      </div>
    </div>

    
<script>

  const invoice_body = document.querySelector('.invoice-card-body')
  let itemArr = [];
  let object = [];
  let user_array = [];
  let mainArray = [];
  let user_id = document.getElementById('user_id') 
  user_id = user_id.value

  let my_user_id;
  // ------- //
  let invoice_id = document.getElementById('invoice_id') 
  invoice_id = invoice_id.value
  // Empty Variable for my accounts data
  let long_acct = []

  const fill_table = (object) => {
    item = object[0]
    itemArr = item
     let output = `
      <div class="invoice-card-form small-font">
      <form action="">
      <div class="">
          <div class="display-flex">
              <div>
            
                <h3 class="${item.status.style} text-white">${item.status.invoice_status}</h3>
              </div>
          </div>
      </div>
      <div class="display-flex">
          <div>
              <h5>Date</h5>
              <h4>${item.pay_details.date}</h4>
          </div>
          <div class='sub-text-mini'>
              <h5>id</h5>
              <h5>${item.data.invoice_id}</h5>
          </div>
          <div class='sub-text-mini'>
              <h5>id</h5>
              <h5 id='my_user_id'>${item.data.user_id}</h5>
          </div>
      </div>
      <div class="display-flex">
          <div>
              <h5>due Date</h5>
              <h4>${item.data.due_date}</h4>
          </div>
          <div>
              <h5>Call <i class="fa fa-phone"></i></h5>
              <h4>${item.data.phone_1}</h4>
          </div>
      </div>
        <div class="display-flex">
        <div class="">
          <h5>Client Full Name</h5>
          <h4>${item.data.full_name}</h4>
        </div>
        <div class="">
          <h5>Email</h5>
          <h4>${item.data.email}</h4>
        </div>
        </div>
        <!-- / this is the inputs of the form  / -->
        <div class="display-flex">
          <div>
              <label class="form-label" for="amt">Amount #</label> 
                <h4 class="sub-text-mini">$ ${item.data.form_amount}</h4>
          </div>
          <div>
              <label class="form-label" for="amt">Exp % returns</label>
              <h4 class="sub-text-mini">$ ${item.data.exp_amount}</h4> 
          </div>
        </div>
              <div>
                  <label class="form-label" for="">Remark</label>
                  <h4 class="sub-text-mini">${item.data.niration}</h4>
              </div>  
              <!--  payment types  -->
        <div class="">
          <div class="display-flex">
              <div>
                  <h4>Paid Through <i class="fa fa-credit-card"></i> </h4>
              </div>
              <div>
                  <h3 class="sub-text">${item.data.pay_method}</h3>
              </div>
          </div>
        </div>
        <div>
          <label class="form-label" for="">Bank Name <i class="fa fa-bank"></i> </label>
          <input class="form-input" value='${item.pay_details.alert_bank}' readonly type="text">
        </div>
        <div>
          <label class="form-label" for="">Senders Name <i class="fa fa-user"></i> </label>
          <input class="form-input" value='${item.pay_details.senders_name}' readonly type="text">
        </div>
        <div class="display-flex">
          <div>
              <label class="form-label" for="amt">Amount #</label> 
              <input readonly value='${item.pay_details.amount_sent}'class="form-input" type="number"> 
              
          </div>
          <div>
              <label class="form-label" for="amt">date</label>
              <input readonly value='${item.pay_details.date}'class="form-input" type="text"> 
          </div>
        </div>                 
        <div class="sub-text-midi">
          <h4>Incase of Error and Problems:</h4>
          <h6>Send The Client a remark from the invoice</h6>
        </div>
        <div>
          <label class="form-label" for="">Status / Issue <i class="fa fa-commenting"></i> </label>
          <input class="form-input" id='msg_status' value='Nill' multiline="true" type="text">
        </div>                 
        <div>
          <label class="form-label" for="">Error Message <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></label>
          <input class="form-input" id='msg_error' value='Nill' multiline="true" type="text">
        </div>                 
        <div class="display-flex small-font">
          <button ${item.status.turn_btn} class="${item.status.btn_style} confirm_pay text-white">${item.status.deliverd}</button>
          <button class="link-btn-4 error_pay text-white">error</button>
          <button class="btn-danger terminate_pay text-white">Terminate Invoice</button>
        </div>
      </form> 
  </div>      
     `;
     invoice_body.innerHTML += output;

    my_user_id = document.getElementById('my_user_id').textContent
    my_user_id = my_user_id    
    
    get_accts()
  }



  const get_history = async () => {
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${user_id}&api_key=1234567890&request_type=history_folder`,{
        method:'GET',
        headers:{
            'Content-Type' :'application/json',
        },
    })
    let data = await response.json()
    // console.log(data)
    user_array = data.user_data   
    mainArray = data.file_data

    // set the data to get jsut the user data
    data = data.file_data

    object = data.filter((item) => {
      return item.data.invoice_id === invoice_id 
    })

    fill_table(object)
  }

  const checked_invoice = async (new_obj) => {
    const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
        method:'POST',
        headers:{
            'Content-Type' :'application/json',
        },
        body: JSON.stringify(new_obj)
    })
    const data = await response.json()
  }

  const delete_invoice = async (new_obj) => {
    const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
        method:'POST',
        headers:{
            'Content-Type' :'application/json',
        },
        body: JSON.stringify(new_obj)
    })
    const data = await response.json()
  }

 const get_accts = async () => {
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${my_user_id}&api_key=1234567890&request_type=get_accts`,{
        method:'GET',
        headers:{
            'Content-Type' :'application/json',
        },
    })
    let data = await response.json()
    long_acct = data.data
    // console.log(long_acct)
}

const credit_accounts = async (main_obj) => {
    const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
        method:'POST',
        headers:{
            'Content-Type' :'application/json',
        },
        body: JSON.stringify(main_obj)
    })
    const data = await response.json()  

    
}

const set_accounts = () => {
  
    let user_int = long_acct.user_acct
    let base_int = long_acct.base_acct
 
    console.log(long_acct)
    let baseAcct = {
      'data' : {
        'user_pass' : '',
        'total_balance':  base_int.data.total_balance + itemArr.data.form_amount,
        'total_invested' : base_int.data.total_invested + itemArr.data.exp_amount,
        'loan_invested' : 0,
        'status':'----------',
        'note' : 'Note:'     
      }
    }
    let userAcct = {
      'data' : {
        'user_id' : my_user_id,
        'acct_balance': user_int.data.acct_balance + itemArr.data.form_amount,
        'total_invested' : user_int.data.total_invested + itemArr.data.exp_amount,
        'status':''        
      }
    }

    let main_obj = {
      'api_key' : '1234567890',
      'user_id' : my_user_id,
      'request_type' : 'credit_acct',
      'user_acct' : userAcct,
      'base_acct' : baseAcct
    }

    console.log(main_obj)
    credit_accounts(main_obj)

 }

 invoice_body.addEventListener('click', (e) => {
   const msg_status = document.getElementById('msg_status')
   const msg_erro = document.getElementById('msg_erro')
  e.preventDefault()
  // console.log(itemArr)
  if(e.target.classList.contains('confirm_pay')){
    
    if(itemArr.data.form_amount !== +itemArr.pay_details.amount_sent){
      msg_status.value = 'The Money set does not match'
        alert('The Main Payment sum does not match')
    }else{
       let left_obj = itemArr

      let join_obj = {
        'invoice_id' : itemArr.data.invoice_id,
        'request_type' : 'update_invoice',
        'status' : {
          'msg_status' : msg_status.value,  
          'msg_error' : msg_error.value,  
          'invoice_status' : 'Paid',
          'turn_btn' : 'disabled',
          'style' : 'link-btn-2',
          'deliverd' : 'Confirmed',
          'btn_style' : 'link-btn-3',
          'btn_msg' : 'Paid Done'
      }}

      let new_obj = {
        ...left_obj,
        ...join_obj
      } 

      let main_obj = mainArray.map((item) => (item.data.invoice_id === invoice_id ? {...item, ...new_obj} :item))
      
      let user_obj = user_array.map((item) => (item.data.invoice_id === invoice_id ? {...item, ...new_obj} :item))
      my_user_id = document.getElementById('my_user_id').textContent
      my_user_id = my_user_id
      
      let main_obj_2 = 
        {'api_key':'1234567890',
        'user_id' : my_user_id,
        'request_type' : 'update_invoice',
        'base_data' : main_obj, 
        'user_data' : user_obj 
        }
      console.log(main_obj_2)
      checked_invoice(main_obj_2) 
      set_accounts()  

      window.location.reload()
      
    }
   
  }else if(e.target.classList.contains('error_pay')){
    return 'Error In details'
  }
  else if(e.target.classList.contains('terminate_pay')){
    let main_obj = mainArray.filter((item) => (item.data.invoice_id !== invoice_id))
    

    let main_obj_2 = 
      {'api_key':'1234567890',
       'user_id' : itemArr.user_id,
       'request_type' : 'delete_invoice',
       'base_data' : main_obj, 
      }

    delete_invoice(main_obj_2)   

    location.href = "http://localhost/invest_bet/admin/pages/payment-list.php"
    
  }
 })

 get_history()  

</script>
</body>
</html>





