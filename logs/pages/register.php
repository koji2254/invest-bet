<?php 
        include '../inc/database.php';
        include '../helpers/helpers.php';
         $data = [
                'user_id' => getRand(),
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => ['',''],
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ['',''],
                'general_err' => '',
                'general' => '',
            ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'user_id' => getRand(),
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => ['',''],
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ['',''],
                'general_err' => '',
            ];
            
            // validate the email and the name inputs
            if(empty($data['email'])){
                $data['email_err'] = 'Enter an Email';
                if(empty($data['name'])){
                    $data['name_err'][0] = 'Enter your name';
                    $data['name_err'][1] = 'error';
                }
            }else{
              $email_verify =  cheackEmail($data['email'], $pdo);
              
              $data['email_err'] = $email_verify;
            }

            // validate the passwords 
            if(empty($data['password'])){
                $data['password_err'] = 'Enter a new password';
            }elseif(strlen($data['password']) < 5){
                $data['password_err'] = 'The password must be more than 5 chars';
            }

            // validate the confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'][0] = 'Pls Confirm Your Passoword';
            }else{
                if(empty($data['password_err']) && ($data['password'] != $data['confirm_password'])){
                    $data['confirm_password_err'][0] = 'Password do not match';
                    $data['confirm_password_err'][1] = 'error';
                }
            }
            # Create the new user after checking all errors
            if(empty($data['name_err'][0]) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'][0])){
                $user = [
                    'user_id' => $data['user_id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                ];
                $verify_new_user = createNewUser($user, $pdo);
              
                if($verify_new_user === 'true'){
                    makeDir($data['user_id'], $user);
                    header('location: login.php');
                }else{
                    $data['general_err'] = 'Oops Somthing went wrong';
                }
            }

        }

        include_once '../inc/header.php';
?>
            <div class="form-body">
            <div class="midi-img display-flex">
                <img src="../../client/img/img-2-crop.png" alt="">
            </div>
                <h5 class="error-text var-margin"><?php echo (!empty($data['general_err'])) ? $data['general_err'][0] : '' ?></h5>
                <form action="register.php" method="POST">
                    <div>
                        <label class="form-label" for="name"></label>
                       <h5 class="error-text var-margin"><?php echo (!empty($data['name_err'])) ? $data['name_err'][0] : '' ?></h5>
                        <input class="form-input <?php echo $data['name_err'][1] ?>" value="<?php echo $data['name'] ?>" type="text" name="name" autocomplete="off" placeholder="Name">
                    </div>
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
                        <label class="form-label" for="name"></label>
                        <h5 class="error-text var-margin"><?php echo (!empty($data['confirm_password_err'])) ? $data['confirm_password_err'][0] : '' ?></h5>
                        <input class="form-input <?php echo $data['confirm_password_err'][1] ?>" value="<?php echo $data['confirm_password'] ?>" type="password" name="confirm_password" placeholder="Confirm Password">
                    </div>
                    <div>
                        <button class="form-btn" type="submit">Create</button>
                    </div>
                </form>
                <div class="form-actions">
                    <div>
                        <h4>I have an account ? <a href="login.php"> Login</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>