<?php

  session_start();
        # check if the LOGGED IN 
  // Check if the user is logged in, if not then redirect him to login tpage
  if($_SESSION["status"] === true){
  
  }else {
    header('location: ../../logs/pages/login.php');
    die();
  }

  $invoice_id = $_GET['id'];
  // print_r($invoice_id);
  // die();

  $user_id = $_SESSION['user_id'];

  $history = json_decode(file_get_contents('../../folds/'. $user_id . '_id/docs/credit.json', true));

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
          <a class="link-btn-3 text-white" href="./withdraw-history.php"><i class="fa fa-chevron-left"></i>back</a>
        </div>
      </div>
      <input type="text" id="user_id" readonly hidden value="<?php echo $user_id ?>">      
      <input type="number" id="invoice_id" readonly hidden value="<?php echo $invoice_id ?>">      
  </div>  



    <div class="section-1">
      <div class="container">
                <!-- / Generate Invoice / -->
        <div id="invoice-card-body" class="invoice-card-body">
      
        </div>   

      </div>
    </div>


<script>

  let userData = [];
  let pay_array_2 = [];

  let sinItem = []

  let user_id = document.getElementById('user_id')
  user_id = user_id.value;
  let invoice_id = document.getElementById('invoice_id')
  invoice_id = invoice_id.value;
  const history_body = document.getElementById('invoice-card-body')

 const fill_table = (data) => {

  let item = data.filter((item) => {
    return item.invoice_id == invoice_id
  })  
  
  item = item[0]
  sinItem = item
//   exit()
  
    let output = `
        <div class="invoice-card-form small-font">
          <form action="">
          <div class="">
              <h5 class="sub-text vat-margin">Invoice Status</h5>
              <h3 class="${item.status.style} text-white">${item.status.invoice_status}</h3>
          </div>
          <div class="display-flex">
              <div>
                  <h5>Date</h5>
                  <h4>${item.withdraw_details.date}</h4>
              </div>
              <div>
                  <h5>Invoice Id</h5>
                  <h4>${item.withdraw_details.invoice_id}</h4>
              </div>
          </div>
          <div class="display-flex">
              <div>
                  <h5>Call <i class="fa fa-phone"></i></h5>
                  <h4>${item.personal_info.phone_1}</h4>
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
            <!-- / this is the inputs of the form  / -->
            <div class="display-flex">
              <div>
                  <label class="form-label" for="amt">Amount #</label> 
                    
              </div>
              <div>
              <h4 class="sub-text">$ ${item.withdraw_details.request_amt}</h4>
              </div>
            </div>
            <div class="">
              <div class="display-flex">
                  <div>
                      <h4>Get Paid Through <i class="fa fa-credit-card"></i> </h4>
                  </div>
                  <div>
                      <h3 class="sub-text">${item.withdraw_details.request_method}</h3>
                  </div>
              </div>
            </div>
            <!--  send to admin to confirm payment    -->
            <div class="vat-margin">
              <h4 class="sub-text-midi">My Bank Deatils *cross check</h4>
            </div>
            <div>
              <label class="form-label" for="">User Bank<i class="fa fa-bank"></i> </label>
              <input class="form-input" id="alert_bank" value='${item.bank_info.bank_name}'  readonly type="text">
            </div>
            <div>
              <label class="form-label" for="">Account Name <i class="fa fa-user"></i> </label>
              <input class="form-input" id="senders_name" value='${item.bank_info.account_name}' readonly type="text">
            </div>               
            <div class="display-flex">
              <button ${item.status.turn_btn} class="${item.status.style} deliver_invoice text-white" id="deliver_invoice">${item.status.btn_msg}</button>
              <div></div>
              <div class="sub-text-midi" >
              <h5>NOTE:</h5>
              ${item.status.msg_status}
              </div>
            </div>
          </form> 
      </div> 
     `;
     history_body.innerHTML += output;
 }

  const get_history = async () => {
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${user_id}&api_key=1234567890&request_type=get_all_withdraws`)

    const data = await response.json()
    userData = data
    fill_table(data.user_data)

    // console.log(data.user_data)
  
 }
 get_history()

  const cardForm = document.querySelector('.invoice-card-body')

 const deliver_withdraw = async (form_obj) => {
    const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
        method:'POST',
        headers:{
            'Content-Type' :'application/json',
        },
        body: JSON.stringify(form_obj)
    })

    const data = await response.json()
    // console.log(data)   
   
 }
 
  const update_front = (form_obj, sin_item) => {
    let dataList = userData.user_data
    let invoice_id = sinItem.invoice_id

     let user_obj = dataList.map((item) => (item.invoice_id === invoice_id ? {...item, ...sin_item} :item))

     let data = {
        'user_data' : user_obj,
        'api_key' : '1234567890',
        'user_id' : user_id,
        'request_type' : 'create_withdraw'
     }
     re_upload(data)
  }
 const re_upload = async (form_obj) => {
    const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
        method:'POST',
        headers:{
            'Content-Type' :'application/json',
        },
        body: JSON.stringify(form_obj)
    })
    const data = await response.json()
 } 

 // Run an Event Listener on card Body
 cardForm.addEventListener('click', (e) => {
  e.preventDefault()

    if(e.target.classList.contains('deliver_invoice')){  
      
      sin_item = {
        ...sinItem,
        'status' : {
          'invoice_status' : 'Not Sent',
          'invoice_type' : 'withdraw',
          'turn_btn' : 'disabled',
          'style' : 'link-btn-3',
          'msg_status' : 'It might take some time',
          'msg_error' : '',
          'deliverd' : '',
          'btn_msg' : 'Wait approval',
          'date' : '20/20/20/20/20'
        }
      }

      let form_obj = {
        'user_data' : sinItem,
        'user_id' : user_id,
        'api_key' : '1234567890',
        'request_type' : 'deliver_withdraw'
      }

      deliver_withdraw(form_obj);
      update_front(form_obj, sin_item)
      e.target.textContent = 'Sending .....'
      
      setTimeout(() => {
        window.location.reload()
      }, 1000)
    }
 })

</script>    

</body>
</html>