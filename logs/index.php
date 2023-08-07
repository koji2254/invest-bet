<?php 
       # check if the LOGGED IN 
    if(!isset($_SESSION) || $_SESSION['loggedin'] !== true){
        header('location: pages/login.php');
        exit;
    }

    $username = $_SESSION['name'];
    $useremail = $_SESSION['email'];
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Wellcome man</h1>


   <div class="card-div">
            <h4>username</h4>
           <h2>Welcome  <?php echo $username; ?></h2>  
         </div>
         <div class="card-div">
            <h4>Useremail</h4>
            <h2><?php echo $useremail; ?></h2>
         </div>

</body>
</html>