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
        <div>
          <h3> Admin Actions</h3>
        </div>
        <div>
          <a class="link-btn-3 text-white small-font" href="../index.php"><i class="fa fa-chevron-left"></i></a>
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
          <a href="pages/email.html"><i class="fa fa-commenting" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/settings.html"><i class="fa fa-cogs" aria-hidden="true"></i></a>
        </div>
        <div class="">
          <a href="pages/profile.html"><i class="fa fa-user" aria-hidden="true"></i></a>
        </div>
      </div>
    </nav>


    <div class="section-1">
      <div class="container">
        <!--  -->
         <div class="long-card midi-font bg-dark small-font">
            <div class="sub-text-mini btn-good display-flex vat-margin">
              <h2 class="small-font">Sesssion is Runing . . . . . . . . . . .</h2>
              <div class="small-loading-gif btn-good">
                <img src="../img/Loading_icon.gif" alt="">
              </div>
            </div>  
            <!-- <div class="sub-text-mini btn-danger display-flex vat-margin"> -->
              <!-- <h2 class="small-font">Session has Ended .. . . . .</h2> -->
              <!-- <div class="small-loading-gif btn-danger">
                <img src="../img/Loading_icon.gif" alt="">
              </div> -->
            <!-- </div>   -->
            <div class="display-flex">
                <div>
                    <button class="btn-good">Start Session . .</button>
                </div>
                <div>
                    <button class="btn-danger">End Session ? . . </button>
                </div>
            </div>
         </div>
        <!-- ----------- -->
         <div class="long-card bg-dark">
            <h4 class="text-white">Account Details</h4>
         </div>
        <!--  -->
         <div class="long-card bg-dark">
             <div class="display-flex">
                <div>
                    <h5 class="sub-text">Total Cloud Amt</h5>
                </div>
                <div>
                    <h5 class="sub-text-mini">$400.000
                </div>
            </div>
             <div class="display-flex vat-margin">
                <div>
                    <h5 class="sub-text">Total Invested Amt</h5>
                </div>
                <div>
                    <h5 class="sub-text-mini">$400.000
                </div>
            </div>
             <div class="display-flex vat-margin">
                <div>
                    <h5 class="sub-text">Expeced Pay</h5>
                </div>
                <div>
                    <h5 class="sub-text-mini">$450.000
                </div>
            </div>
         </div>
         <!--  -->
         <div class="long-card bg-dark">
            <div class="display-flex">
                <button class="link-btn-1">Credit</button>
                <button class="link-btn-5 text-white">widthdraw</button>
            </div>
         </div>
         <!--  -->
         <div class="long-card">
            <div>
                <div class="vat-margin">
                    <h4>Credit Form</h4>
                </div>
                <form action=""> 
                    <div>
                        <input type="text" class="form-input" placeholder="Remark">
                    </div>
                    <div class="display-flex">
                        <div>
                            <input type="number" class="pop-input" placeholder="Amount">
                        </div>
                        <div>
                            <button class="link-btn-1 vat-margin">Credit</button>
                        </div>
                    </div>
                </form>
            </div>
         </div>
         <!--  -->
         <!--  -->
         <div class="long-card">
            <div>
                <div class="vat-margin">
                    <h4>Debit Form</h4>
                </div>
                <form action=""> 
                    <div>
                        <input type="text" class="form-input" placeholder="Remark">
                    </div>
                    <div class="display-flex">
                        <div>
                            <input type="number" class="pop-input" placeholder="Amount">
                        </div>
                        <div>
                            <button class="link-btn-2 vat-margin">widthdraw</button>
                        </div>
                    </div>
                </form>
            </div>
         </div>
         <!--  -->
        </div>
      </div>

</body>
</html>