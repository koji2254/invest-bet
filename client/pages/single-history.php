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
          <a class="link-btn-3 text-white" href="./history.php"><i class="fa fa-chevron-left"></i>back</a>
        </div>
      </div>
      <input type="text" id="user_id" readonly hidden value="<?php echo $user_id ?>">      
      <input type="text" id="invoice_id" readonly hidden value="<?php echo $invoice_id ?>">      
  </div>  



    <div class="section-1">
      <div class="container">
                <!-- / Generate Invoice / -->
        <div id="invoice-card-body" class="invoice-card-body">
    
        </div>   

      </div>
    </div>


<script>

  let pay_array = [];
  let pay_array_2 = [];
  let mainArray = [];

  let user_id = document.getElementById('user_id')
  user_id = user_id.value;
  let invoice_id = document.getElementById('invoice_id')
  invoice_id = invoice_id.value;
  const history_body = document.getElementById('invoice-card-body')

 const fill_table = (data) => {

  let item = data.filter((item) => {
    return item.data.invoice_id === invoice_id
  })  
  
  pay_array = item[0]; 

  item = item[0]
  
    let output = `
        <div class="invoice-card-form small-font">
          <form action="">
          <div class="">
              <h5 class="sub-text vat-margin">Invoice Status</h5>
              <p class="${item.status.style} text-white">${item.status.invoice_status}</p>
          </div>
          <div class="display-flex">
              <div>
                  <h5>Date</h5>
                  <h4>${item.data.due_date}</h4>
              </div>
              <div>
                  <h5>Invoice Id</h5>
                  <h4>${item.data.invoice_id}</h4>
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
                    <h4 class="sub-text">$ ${item.data.form_amount}</h4>
                  
              </div>
              <div>
                  <label class="form-label" for="amt">Exp % returns</label>
                  <h4 class="sub-text">$ ${item.data.exp_amount}</h4> 
              </div>
            </div>
                  <div>
                      <label class="form-label" for="">Remark</label>
                      <h4 class="sub-text-mini">Lorem, ipsum dolor.</h4>
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
            <!--  send to admin to confirm payment    -->
            <div class="vat-margin">
              <h4 class="sub-text-midi">Please Fill in these input to confirm your payment</h4>
            </div>
            <div>
              <label class="form-label" for="">The money was sent to --Bank Name <i class="fa fa-bank"></i> </label>
              <input class="form-input" id="alert_bank" value='${item.pay_details.alert_bank}' type="text">
            </div>
            <div>
              <label class="form-label" for="">Senders Name <i class="fa fa-user"></i> </label>
              <input class="form-input" id="senders_name" value='${item.pay_details.senders_name}' type="text">
            </div>
            <div class="display-flex">
              <div>
                  <label class="form-label" for="amt">Amount #</label> 
                  <input class="form-input" id="amount_sent" value='${+item.pay_details.amount_sent}' type="number"> 
                  
              </div>
              <div>
                  <label class="form-label" for="amt">date</label>
                  <input class="form-input" id="date" value='${item.pay_details.date}' type="text"> 
              </div>
            </div>                 
            <div class="display-flex">
              <button ${item.status.my_btn} class="${item.status.btn_style} deliver_invoice text-white" ${item.status.my_btn} id="deliver_invoice">${item.status.btn_msg}</button>
              <button class="link-btn-4 text-white">Cancel</button>
            </div>
          </form> 
      </div> 
     `;
     history_body.innerHTML += output;



 }

  const get_history = async () => {
    const response = await fetch(`http://localhost/invest_bet/api/client/read.php?user_id=${user_id}&api_key=1234567890&request_type=get_all_history`,{
        method:'GET',
        headers:{
            'Content-Type' :'application/json',
        },
    })
    const data = await response.json()
    // console.log(data)
    mainArray = data
    fill_table(data)
  
 }
 get_history()

  const cardForm = document.querySelector('.invoice-card-body')

 const deliver_pay = async (form_obj) => {
    const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
        method:'POST',
        headers:{
            'Content-Type' :'application/json',
        },
        body: JSON.stringify(form_obj)
    })

    const data = await response.json()
    console.log(data)   
   
 }
 
 cardForm.addEventListener('click', (e) => {
  e.preventDefault()

    if(e.target.classList.contains('deliver_invoice')){  
      const alert_bank = document.getElementById('alert_bank')
      const senders_name = document.getElementById('senders_name')
      const amount_sent = document.getElementById('amount_sent')
      const date = document.getElementById('date')

 

        let form_obj = {
            // 'invoice_id' : pay_array.data.invoice_id,
            // 'user_id' : pay_array.user_id,
            // 'api_key' : pay_array.api_key,
            // 'request_type' : 'deliver_invoice',
            'data' : {
                'user_id' : pay_array.user_id,                
                'due_date' : pay_array.data.due_date,
                'date' : pay_array.data.date ,
                'invoice_id' : pay_array.data.invoice_id,
                'invoice_status' : pay_array.data.invoice_status,
                'full_name' : pay_array.data.full_name,
                'phone_1' : pay_array.data.phone_1,
                'email' : pay_array.data.email,
                'form_amount' : pay_array.data.form_amount,
                'promo_code' : pay_array.data.promo_code,
                'exp_amount' : pay_array.data.exp_amount,
                'niration' : pay_array.data.niration,
                'pay_method' : pay_array.data.pay_method,   
                'turn_btn' : '',
                'style' : 'link-btn-3'                          
            },
            'pay_details' : {
                'senders_name' : senders_name.value,
                'alert_bank' : alert_bank.value,
                'amount_sent' : amount_sent.value,
                'date' : date.value
            },
            'status':{
                'invoice_status' : 'Not Paid',
                'invoice_type' : 'Payment',
                'turn_btn' : '',
                'my_btn' : 'disabled',
                'style' : 'link-btn-3',
                'btn_style' : 'link-btn-3',
                'msg_status' : '',
                'msg_error' : '',
                'deliverd' : 'Confirm',
                'btn_msg' : 'Proccesing..',
                'date' : '20/20/20/'                 
            } 
        }      

    let user_data = mainArray.map((item) => (item.data.invoice_id === invoice_id ? {...item, ...form_obj} :item)) 

    let main_obj = {
      'user_id' : pay_array.user_id,
      'api_key' : pay_array.api_key,
      'request_type' : 'deliver_invoice',          
      'user_data' : user_data,
      'base_data' : form_obj
    } 

    // console.log(main_obj)
    deliver_pay(main_obj);

    // history_body.innerHTML = `
    //  <div class='long-card'>
    //     <div class='sub-text-mini'>
    //       <h4>Sent.... Successfully</h4>
    //       <h5>Wait for confirmation</h5>
    //       <a href="history.php">
    //        <h3 class='vat-margin'>History Page <i class='fa fa-history'></i></h3>
    //       </a>
    //     </div>
    //  </div>
    // `;
    // let minBtn = document.getElementById('deliver-btn')
    // minBtn.textContent
    e.target = '';

    
      window.location.reload()
    
    

    }
 })

</script>    

</body>
</html>