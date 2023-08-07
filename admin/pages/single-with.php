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

  if(!isset($_GET['id'])){
    header('location: ./withdraw-list.php');
    die();
  }

  $uuid = $_GET['uuid'];

  $invoice_id = $_GET['id'];


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
  <div class="top-top-nav small-font">
      <div class="top-nav">
        <div class="notification">
          <h6 class="top-title"><i class="fa fa-bell"></i></h6>
          <span>3</span>
        </div>
        <div class="sub-text text-red hor-margin">
            <h5>Money To Send</h5>
            <i class="fa fa-upload" aria-hidden="true"></i>
        </div>
        <!-- other links -->
        <div>
          <a class="link-btn-3 text-white" href="./withdraw-list.php"><i class="fa fa-chevron-left"></i></a>
        </div>
      </div>
      <input type="text" readonly hidden value="<?php echo $user_id ?>" id="user_id" > 
      <input type="text" readonly hidden value="<?php echo $invoice_id ?>" id="invoice_id" >
      <input type="text" hidden readonly  value="<?php echo $uuid ?>" id="uuid" >
  </div>  


    <div class="section-1">
      <div class="container">
        <div class="card-body-1">
        </div>

        <!-- / Generate Invoice / -->
        <div class="invoice-card-body">
            <div class="invoice-card-form small-font">
              
            </div> 
        </div>          
      </div>
    </div>

<script>
  let user_id = document.getElementById('user_id')
  user_id = user_id.valul
  let invoice_id = document.getElementById('invoice_id')
  invoice_id = invoice_id.value
  let uuid = document.getElementById('uuid')
  uuid = uuid.value
  // console.log(uuid)
  const history_body = document.querySelector('.invoice-card-form')

  let sin_data = []
  let com_data = []
  let base_data = []
  let long_acct = []
  let itemArr = []
// FILL THE BODY   
  const fill_table = (data) => {

      // let user_obj = data.map((item) => (item.invoice_id == invoice_id ? {...item, ...new_obj} :item))  

      let single_data = data.filter((item) => {
        return item.invoice_id == invoice_id
      })
       
      sin_data = single_data
      // sin_data = user_obj
      let item = single_data[0]
      itemArr = item      
      // console.log(item)
      let output = `
      <div>
      <form>
        <div>
            <h5 class='sub-text vat-margin'>Invoice Status</h5>
            <p class='${item.status.style} text-white'>${item.status.invoice_status}</p>
        </div>
        <div class="display-flex">
            <div>
                <h5>Date</h5>
                <h4>${item.status.date}</h4>
            </div>
            <div>
                <h5>Invoice Id</h5>
                <h4>${item.invoice_id}</h4>
            </div>
        </div>
          <div class="display-flex">
          <div class="">
            <h5>Client Full Name</h5>
            <h4>${item.personal_info.full_name}</h4>
          </div>
          <div class="">
            <h5>Email</h5>
            <h4>${item.personal_info.email}</h4>
          </div>
          </div>
          <div class="display-flex">
            <div>
                <p>Bank Name</p>
                <h3>${item.bank_info.bank_name}</h3>
            </div>
            <div>
                <p>Account Name</p>
                <h3>${item.bank_info.account_name}</h3>
            </div>
          </div>

          <!-- / this is the inputs of the form  / -->
          <div>
            <!-- <span class="error-text">error in text</span> -->
          </div>
          <div class="display-flex">
            <div>
                <label class="form-label" for="amt">Amount #</label> 
                <input readonly value='${item.withdraw_details.request_amt}' class="form-input" type="text">                       
            </div>
          </div> 
                <!--  payment types  -->
          <div class="">
            <div class="display-flex">
                <div>
                    <h4>Methods Recieve Your Money <i class="fa fa-credit-card"></i> </h4>
                </div>
                <div class="sub-text">
                    <h4>${item.withdraw_details.request_method}</h4>
                </div>
            </div>
          </div>

          <div class="sub-text-midi">
            <h4>Incase of Error and Problems:</h4>
            <h6>Send The Client a remark from the invoice</h6>
          </div>
          <div>
            <label class="form-label" for="">Status / Issue <i class="fa fa-commenting"></i> </label>
            <input class="form-input" value='${item.status.msg_status}' id='msg_status' multiline="true" type="text">
          </div>                 
          <div>
            <label class="form-label" for="">Error Message <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></label>
            <input class="form-input" value='${item.status.msg_error}' id='msg_error' multiline="true" type="text">
          </div>                    
          <div class="display-flex">
            <button ${item.status.turn_btn} class="${item.status.style} confirm-withdraw text-white">Confirm Sent</button>
            <button class="link-btn-3 text-white confirm-error">! Remark</button>
            <button class="btn-danger text-white terminate">Terminate</button>
          </div>
        </form>    
      </div> `;
      history_body.innerHTML = output;
  }

  const get_history = async () => {
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${uuid}&api_key=1234567890&request_type=withdraw_history`,{
        method:'GET',
        headers:{
            'Content-Type' :'application/json',
        },
    }) 
    const data = await response.json()
    com_data = data.user_data
    base_data = data.base_data
    fill_table(data.base_data)
 }
 get_history()  

 const update_withdraw = async (new_obj) => {
    const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
        method:'POST',
        headers:{
            'Content-Type' :'application/json',
        },
        body: JSON.stringify(new_obj)
    })
    const data = await response.json()  
 }

  const delete_withdraw = async (new_obj) => {
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
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${uuid}&api_key=1234567890&request_type=get_accts`,{
        method:'GET',
        headers:{
            'Content-Type' :'application/json',
        },
    })
    let data = await response.json()
    long_acct = data.data
    // console.log(long_acct)
}

const debit_accounts = async (main_obj) => {
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
 
    // console.log(itemArr.withdraw_details)
    let baseAcct = {
      'data' : {
        'user_pass' : '',
        'total_balance':  base_int.data.total_balance,
        'total_invested' : base_int.data.total_invested - +itemArr.withdraw_details.request_amt,
        'loan_invested' : 0,
        'status':'----------',
        'note' : 'Note:'     
      }
    }
    let userAcct = {
      'data' : {
        'user_id' : uuid,
        'acct_balance': user_int.data.acct_balance,
        'total_invested' : user_int.data.total_invested - +itemArr.withdraw_details.request_amt,
        'status':''        
      }
    }

    let main_obj = {
      'api_key' : '1234567890',
      'user_id' : uuid,
      'request_type' : 'credit_acct',
      'user_acct' : userAcct,
      'base_acct' : baseAcct
    }

    // console.log(main_obj)
    debit_accounts(main_obj)

 }


 // Add an Event to the whole body of the INVOICE
 history_body.addEventListener('click', (e) => {
  e.preventDefault()

  if(e.target.classList.contains('confirm-withdraw')){
    const msg_status = document.getElementById('msg_status')
    const msg_error = document.getElementById('msg_error')

    let user_bal = long_acct.user_acct.data.total_invested
    let ask_amt = +itemArr.withdraw_details.request_amt

    if(ask_amt > user_bal){
      alert('Oga, u be thief, your money no reach that amount na????')
    }else{
      let fresh = {
      ...sin_data[0],
      'status' : {
        'invoice_status' : 'Success',
        'invoice_type' : 'withdraw',
        'turn_btn' : 'disabled',
        'style' : 'link-btn-3',
        'deliverd' : 'true',
        'btn_msg' : 'Confirmed',
        'date' : '20/20/20/',
        'msg_status' : msg_status.value,
        'msg_error' : msg_error.value,  
      }

    }

    let base_obj = base_data.map((item) => (item.invoice_id == invoice_id ? {...item, ...fresh} :item))
    
    let user_obj = com_data.map((item) => (item.invoice_id == invoice_id ? {...item, ...fresh} :item))

    let main_obj_2 = 
      {'api_key':'1234567890',
       'user_id' : uuid,
       'request_type' : 'update_withdraw',
       'base_data' : base_obj, 
       'user_data' : user_obj 
      }

    // console.log(main_obj_2)
    update_withdraw(main_obj_2)
    set_accounts()

    location.href = "http://localhost/invest_bet/admin/pages/withdraw-list.php" 
    }
  
  }else if(e.target.classList.contains('confirm-error')){
    console.log('Error in the invoice')
  }else if(e.target.classList.contains('terminate')){
    let main_obj = base_data.filter((item) => (item.invoice_id != invoice_id))
    

    let main_obj_2 = 
      {'api_key':'1234567890',
       'user_id' : uuid,
       'request_type' : 'delete_withdraw',
       'base_data' : main_obj, 
      }

    // console.log(main_obj)
    delete_withdraw(main_obj_2)   

    location.href = "http://localhost/invest_bet/admin/pages/withdraw-list.php"    

  }
 })

get_accts()


</script>

</body>
</html>