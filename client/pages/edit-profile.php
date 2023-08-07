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

  $profile_info = json_decode(file_get_contents('../../folds/'. $user_id . '_id/user_profile.json', true));

  $acct_info = json_decode(file_get_contents('../../folds/'. $user_id . '_id/account.json', true));

  $user = $profile_info->personal_info;
  $bank = $profile_info->bank_info;

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
          <a class="link-btn-3 text-white" href="./profile.php"><i class="fa fa-chevron-left"></i></a>
        </div>
      </div>
  </div>  

    <div class="section-1">
      <input type="text" id="get_user_id" hidden value="<?php echo $_SESSION['user_id'] ?>">
        <div class="container midi-font small-font">       
          <div class="long-card" id="profile_form">
            <form action="">
               
                <div class="display-flex sub-text-mini vat-margin">
                   <div class="nav-profile-img">
                    <img id="img_preview" src="" alt="">
                   </div> 
                   <div>
                     <input type="file" accept="image/*" name="" id="img_select">
                   </div>
                </div>  
                <div>
                    <h4 class="sub-text vat-margin"><i class="fa fa-users"></i></h4>
                </div>
                <div class="sub-text-mini">
                    <div class="">
                    <label class="form-label" for="">Full Name</label>
                    <input type="text" id="full_name" value="<?php echo $user->full_name ?>" class="form-input" >
                </div>
                <div class="">
                    <label class="form-label" for="">Email</label>
                    <input type="text" value="<?php echo $user->email ?>" id="email" class="form-input" >
                </div>
                <div class="">
                    <label class="form-label" for="">Phone <i class="fa fa-phone"></i></label>
                    <input type="text" id="phone_1" value="<?php echo $user->phone_1 ?>" class="form-input" >
                </div>
                <div class="">
                    <label class="form-label" for="">Phone 2 <i class="fa fa-phone"></i></label>
                    <input type="text" value="<?php echo $user->phone_2 ?>" id="phone_2" class="form-input" >
                </div>
                <div class="">
                    <label class="form-label" for="">Address</label>
                    <input type="text" value="<?php echo $user->address ?>" id="address" class="form-input" >
                </div>
                </div>
                <div>
                    <h4 class="vat-margin sub-text"><i class="fa fa-bank"></i></h4>
                </div>
                <div class="sub-text-mini">
                    <div class="">
                        <label class="form-label" for="">Bank Name <i class="fa fa-bank"></i></label>
                        <select class="link-btn-3" name="form-input" id="select_bank">
                          <option value="<?php echo $bank->bank_name ?>"><?php echo $bank->bank_name ?></option>
                          <option value="Zenith Bank">Zenith bank</option>
                          <option value="GTB Bank">GTB bank</option>
                        </select>
                    </div>
                    <div class="">
                        <label class="form-label" for="">Account Name</label>
                        <input type="text" value="<?php echo $bank->account_name ?>" id="account_name" class="form-input" >
                    </div>
                    <div class="">
                        <label class="form-label" for="">Account Number</label>
                        <input type="number" id="account_number" value="<?php echo $bank->account_number ?>" class="form-input" >
                    </div> 
                </div>
         
               
            </form>
          </div>  

          <div class="long-card display-flex" id="actions_form">
            <a href="./edit-profile.html">
              <button id="update_profile_btn" class="link-btn-5 text-white">Update Profile</button></a>
             </a>
            <a href="./profile.php"> <button class="link-btn-4 text-white">Cancel</button></a>
          </div>
    
          </div>
    </div>
<script>
  const profile_form = document.getElementById('profile_form')
  const actions_form = document.getElementById('actions_form')

  const user_id = document.getElementById('get_user_id');
  const imgPreview = document.getElementById('img_preview');
  const imgSelect = document.getElementById('img_select');

  const profileBtn  = document.getElementById('update_profile_btn')
  const full_name = document.getElementById('full_name')
  const email = document.getElementById('email')
  const address = document.getElementById('address')
  const phone_1 = document.getElementById('phone_1')
  const phone_2 = document.getElementById('phone_2')
  const select_bank = document.getElementById('select_bank')
  const account_name = document.getElementById('account_name')
  const account_number = document.getElementById('account_number')
  // console.log(select_bank.value)

  setTimeout(() => {
      console.log(select_bank.value)
  }, 3000)

  const profile_info = (e) => {
      e.preventDefault()

    let profile = {
        'personal_info' : {
          'full_name' : full_name.value,
          'email' : email.value,
          'phone_1' : phone_1.value,
          'phone_2' : phone_2.value,
          'address' : address.value,     
          'img':'../../img.url',      
          'acct_status':'silver',
          'user_id':user_id.value,
        },
        'bank_info' : {
          'bank_name' : select_bank.value,
          'account_name' : account_name.value,
          'account_number' : account_number.value,          
          'acct_status':'silver',
          'user_id':user_id.value,
        },
        
        'user_id':user_id.value,
        'api_key':'1234567890',
        'request_type':'update_profile',
    }

    updateProfile(profile)
  //    console.log(profile)
    actions_form.style.display = 'none'
    profile_form.innerHTML = `
      <div class='long-card'>
        <div class="sub-text-mini">
          <h3>Successfully Updated Your Profile</h3>
          <a href="./profile.php">My Profile <i class='fa fa-user'></i></a>
        </div>
      </div>
    `;
  }

  const getUserInfo = async () => {
      const response = await fetch('http://localhost/invest_bet/api/client/read.php?user_id=1212814&api_key=1234567890',{
          method:'GET',
          headers:{
              'Content-Type' :'application/json',
          },
      })
  }

  const updateProfile = async (profile) => {
      const response = await fetch('http://localhost/invest_bet/api/client/index.php',{
          method:'POST',
          headers:{
              'Content-Type' :'application/json',
          },
          body: JSON.stringify(profile)
      })

      const data = await response.json()
      // console.log(data)
  }

  profileBtn.addEventListener('click', profile_info)  

</script>

</body>
</html>