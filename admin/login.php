<?php 
        include './inc/database.php';
        include './helpers/helpers.php';

        session_start();
        // Check if the user is already logged in, if yes then redirect him to welcome page
        if(isset($_SESSION["status"]) && $_SESSION["status"] === true){
            header("location: index.php");
            exit;
        }
        
         $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
                'general_err' => '',
            ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
                'general_err' => '',
            ];
            
            // validate the email and the name inputs
            if(empty($data['email'])){
                $data['email_err'] = 'Enter an Email';

            }
            // validate the passwords 
            if(empty($data['password'])){
                $data['password_err'] = 'Enter a new password';
            }
     
            # Create the new user after checking all errors
            if(empty($data['email_err']) && empty($data['password_err'])){       
              
                $user = [
                    'email' => $data['email'],
                    'password' => $data['password'],
                ];
                $verify_new_user = loginUser($user, $pdo);
                if($verify_new_user === 'true'){

                    session_start();

                    $_SESSION["status"] = true;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['id'] = $id;
                    $_SESSION['name'] = $data['name'];
                    $_SESSION['email'] = $data['email'];
                    header('location: index.php');

                }else{
                    $data['general_err'] = $verify_new_user;
                    // $data['password_err'] = $verify_new_user;
                }
            }

        }

        include_once 'inc/header.php';
?>   
   
    <div class="container">
        <div class="form-page">
        <div class="form-body">
            <div class="midi-img display-flex">
                <img src="img/img-2-crop.png" alt="">
            </div>
              <h5 class="error-text var-margin"><?php echo (!empty($data['general_err'])) ? $data['general_err'] : '' ?></h5>
            <form action="login.php" method="POST">
                <div>
                    <label class="form-label" for="email"></label>
                    <h5 class="error-text var-margin"><?php echo (!empty($data['email_err'])) ? $data['email_err'] : '' ?></h5>
                    <input class="form-input" type="email" value="<?php echo $data['email'] ?>" name="email" placeholder="Email">
                </div>
                <div>
                   <label class="form-label" for="password"></label>
                    <h5 class="error-text var-margin"><?php echo (!empty($data['password_err'])) ? $data['password_err'] : '' ?></h5>
                    <input value="<?php echo $data['password'] ?>" class="form-input" type="password" name="password" placeholder="password">
                </div>
                <div>
                    <button class="form-btn" type="submit">Log-In</button>
                </div>
            </form>
            <div class="form-actions">
                <div>
                    <h4>No account? <a href="register.php" class=""> Register</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
