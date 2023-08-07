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
          <a class="link-btn-3 text-white" href="../index.html"><i class="fa fa-home"></i></a>
        </div>
      </div>
  </div>  



    <div class="section-1">
      <div class="container">
        <div class="card-body-1">
          <div class="long-card">
            <div>
              <h4>accounts</h4>
              <div class="display-flex">
                <div>
                  <span>available amt</span>
                  <h3>$200,000</h3>
                </div> 
                <div>
                  <h1>|</h1>
                </div>   
                <div>
                  <h5 class="hor-margin text-blue">+15%</h5>
                  <span>invested amt</span>
                  <h3>+ $200,000</h3>
                </div>    
              </div>
            </div>
          </div>
        </div>

        <!-- / Generate Invoice / -->
        <div class="invoice-card-body">
            <button class="link-btn-5 vat-margin"><h4>Request Payment Invoice</h4> <i class="fa fa-invoice"></i>
            </button>
            <div class="invoice-card-form small-font">
               <form action="">
                <div>
                    <h5>Invoice Status</h5>
                    <h3>Not Paid</h3>
                </div>
                <div class="display-flex">
                    <div>
                        <h5>Date</h5>
                        <h4>20/20/2030</h4>
                    </div>
                    <div>
                        <h5>Invoice Id</h5>
                        <h4>23456789</h4>
                    </div>
                </div>
                <div class="display-flex">
                    <div>
                        <h5>due Date</h5>
                        <h4>20/20/2030</h4>
                    </div>
                    <div>
                        <h5>Invoice Id</h5>
                        <h4>23456789</h4>
                    </div>
                </div>
                 <div class="display-flex">
                 <div class="">
                    <h5>Client Full Name</h5>
                    <h4>James Joshua Koji</h4>
                 </div>
                 <div class="">
                    <h5>Email</h5>
                    <h4>James@gmail.com</h4>
                 </div>
                 </div>
                 <!-- / this is the inputs of the form  / -->
                 <div>
                    <span class="error-text">error in text</span>
                 </div>
                 <div class="display-flex">
                    <div>
                        <label class="form-label" for="amt">Amount #</label> 
                        <input class="form-input error" type="number"> 
                       
                    </div>
                    <div>
                        <label class="form-label" for="amt">Exp %</label>
                        <input class="form-input" type="number" value="900" readonly> 
                    </div>
                 </div>
                      <div class="bg-white">
                            <label class="form-label" for="amt">Promo Code *</label>
                            <input class="form-input" type="number" value="900" readonly> 
                        </div>
                        <div>
                            <label class="form-label" for="">Remark</label>
                            <input class="form-input" type="text">
                       </div>  
                       <!--  payment types  -->
                  <div class="">
                    <div class="display-flex">
                        <div>
                            <h4>Methods to Pay <i class="fa fa-credit-card"></i> </h4>
                        </div>
                        <div>
                            <select name="" id="">
                                <option value="transfer">Transfer<h4></h4></option>
                                <option value="cash"><h4>Cash</h4></option>
                                <option value="wallet">E-Wallet<h4></h4></option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="display-flex">
                    <button class="link-btn-5">Generate Invoice</button>
                    <button class="link-btn-4 text-white">Cancel</button>
                  </div>
               </form> 
            </div> 
        </div>          
      </div>
    </div>


</body>
</html>