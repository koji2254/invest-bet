<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="./admin/css/main.css">
    <title>Document</title>
</head>
<style>
  .midi-img img{
    width: 300px;
    /* height: 400px; */
  }

  @media(max-width:600px){
    .midi-img img{
      width: 130px;
    }
    .display-flex {
      flex-direction: column-reverse;
    }
    .top-nav .display-flex {
      flex-direction: row;
    }
    .form.display-flex{
      flex-direction: row;
    }
  }
</style>
<body>
  <!-- the top nav section -->
  <div class="top-top-nav">
      <div class="top-nav">
        <div class="small-font">
            <h3>Site Name</h3>
        </div>
        <!-- other links -->
        <div class="display-flex small-font">
          <a href="./logs/pages/register.php" class="link-btn-2 text-white hor-margin">Register<i class="fa fa-sign-out"></i></a>
          <a href="./logs/pages/login.php" class="link-btn-1 text-white">Log-in<i class="fa fa-sign-out"></i></a>
        </div>
      </div>
  </div>      
  <div class="section-1"> 
    <div class="container small-font">
       <div class="long-card display-flex">
            <div class="display-col">
                <h2>About Platform</h2>
                <p class="sub-text-mini">Lorem ipsum dolor, sit amet consectetur adipisicing elit.distinctio optio quam?</p>
                <button class="link-btn-4 text-white">Read...</button>
            </div>
            <div class="midi-img">
              <img src="./client/img/iimg-1.png" alt="">
            </div>
       </div>        
       <div class="long-card display-flex">
            <div class="display-col">
                <h2>Payments Methods</h2>
                <p class="sub-text-mini">Lorem, ipsum dolor sit amet consectetur adipisicing elit. expedita cum eius blanditiis?</p>
                <div class="display-flex">
                   <h3 class="sub-text-mini vat-margin">
                    Transfer
                   </h3>                  
                   <h3 class="sub-text-mini vat-margin">
                    Card <i class="fa fa-debit-card"></i>
                   </h3>                  
                   <h3 class="sub-text-mini vat-margin">
                    Transfer
                   </h3>                  
                </div>
            </div>
            <div class="midi-img">
              <img src="./client/img/img-3.png" alt="">
            </div>
       </div>        
       <div class="long-card display-flex">
            <div class="display-col">
                <h2>About Security</h2>
                <p class="sub-text-mini">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni, sunt facilis sequi voluptatibus debitis dolores hic expedita cum eius blanditiis?</p>
                <button class="link-btn-4 text-white vat-margin">OK!!</button>
            </div>
            <div class="midi-img">
              <img src="./client/img/img-4.png" alt="">
            </div>
       </div> 
       <div class="long-card">            
        <H4>Contact Us</H4>
          <div class=" vat-margin">
            <div class="sub-text">
              <h4>+12345678900 <i class="fa fa-phone"></i> </h4>
            </div>
          </div>
          <div class="vat-margin">
             <h3>Address</h3>
             <div class="sub-text-mini">
                <h5>Utan lane opp rockland</h5>
             </div>
          </div>
          <div class="form display-flex sub-text-mini">
            <div>
              <h5>Send Us an Email to</h5>
            </div>
            <div>
              <h5>jjameskoji@gmail.com</h5>
            </div>
          </div>
       </div> 
       <div class="long-card">
          <form action="">   
            <div>
              <input type="text" class="form-input" placeholder="PLease Enter your email"> 
             </div>
             <div class="vat-margin">
              <input type="text" class="form-input" placeholder="Heading // Subject"> 
             </div>
             <div class="vat-margin">
              <input type="text" class="form-textarea" placeholder="PLease Enter your Note"> 
             </div>
             <div>
              <button class="link-btn-4 text-white">Send Email</button>
             </div>
          </form>
       </div>     
       
       
      </div>
    </div>
</body>
</html>