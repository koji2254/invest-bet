<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../logs/css/logs.css">    
    <link rel="stylesheet" href="../logs/css/main.css">    
    <title>register</title>
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
  <div class="top-top-nav">
      <div class="top-nav">
        <div class="small-font">
            <h3> <a href="login.php" class="text-white">Site Name</a> </h3>
        </div>
        <!-- other links -->
        <div class="display-flex small-font">
          <a href="./register.php" class="link-btn-2 text-white hor-margin">Register<i class="fa fa-sign-out"></i></a>
          <a href="./login.php" class="link-btn-1 text-white">Log-in<i class="fa fa-sign-out"></i></a>
        </div>
      </div>
  </div   