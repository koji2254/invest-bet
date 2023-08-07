<?php
    function getRand(){
        $user_id = rand(1000000, 9000000);

        return $user_id;
    }

    function cheackEmail($email, $pdo){
        $remark = '';
        // Preapare stmt
        $sql = 'SELECT id FROM users WHERE email = :email';
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    $remark = 'This Email has already being taken';
                }
            }
        }else{
            $remark = 'Network error pls try again';
        }

        return $remark;
        unset($pdo);
        unset($stmt);
    }

    function createNewUser($user, $pdo){
        $remark = '';

        $sql = 'INSERT INTO users (user_id, name, email, password) VALUES (:user_id, :name, :email, :password)';

        // prepare the stmt
        if($stmt = $pdo->prepare($sql)){

            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

            // bind the parameters
            $stmt->bindParam(':user_id', $user['user_id'],PDO::PARAM_STR);
            $stmt->bindParam(':name', $user['name'],PDO::PARAM_STR);
            $stmt->bindParam(':email', $user['email'],PDO::PARAM_STR);
            $stmt->bindParam(':password', $user['password'],PDO::PARAM_STR);

            if($stmt->execute()){
                // set remark to true
                $remark = 'true';
            }else{
                $remark = 'false';
            }           
        } 
        return $remark;
        unset($stmt);
        unset($pdo);
    }


    function loginUser($user, $pdo){
        $remark = '';
        // sql query 
        $sql = 'SELECT id, user_id, name, email, password FROM users WHERE email = :email';
        
        if($stmt = $pdo->prepare($sql)){
            // Bind the parameters 
            $stmt->bindParam(':email', $user['email'], PDO::PARAM_STR);

            //execute the $stmt 
            if($stmt->execute()){
              // check if the email exist :: password
              if($row = $stmt->rowCount() == 1){

               if($row = $stmt->fetch()){
                $id = $row['id'];
                $user_id = $row['user_id'];
                $name= $row['name'];
                $email = $row['email'];
                $password = $row['password'];

                //verify the password
                if(password_verify($user['password'], $password)){
                    // password id corrcet
                    $remark = array(
                        'id' => $id,
                        'user_id' => $user_id,
                        'name' => $name,
                        'email' => $email,
                        'status' => 'true'
                    );

                    // return $remark;
                }else {
                    $remark = array(
                        'note' => 'Incorrect User Details',
                        'status' => 'false'
                    );
                   }
               }  
              }else{
                    $remark = array(
                        'note' => 'Incorrect User Details',
                        'status' => 'false'
                    );
              }
              unset($stmt);
            }
        }
       return  $remark;
        
    }


    function makeDir($user_id, $user){
        // ini_set('memory_limit', '9024M'); 
        // or you could use 1G
        $info_data = json_encode([
            'user_id' => $user['user_id'],
            'email' => $user['email'],
            'id' => $user['id'],
            'name' => $user['name'],
        ]);

        $user_profile = json_encode([
            'bank_info' => [
                'bank_name' => '',
                'account_name' => '',
                'account_number' => '',
                'acct_status' => '',
                'user_id' => '',
            ],
            'personal_info' => [
                'full_name' => $user['name'],               
                'email' => $user['email'],               
                'phone_1' => '',               
                'phone_2' => '',               
                'address' => '',               
                'img' => '',               
                'acct_status' => '',               
                'user_id' => '',               
            ]

        ]);
        
        $settings = json_encode([
            'user_id' => $user_id,
            'pin_pin' => '2254',
            'background' => 'yellow',
            
        ]);
        
        $account = json_encode(
            ['data' => [
                'user_id' => $user_id,
                'acct_balance' => '0',
                'total_invested' => '0',
                'status' => 'gold', 
            ]
           
            ]
        );

        $empty = [[]];

        # Make a users personal folder
        mkDir('../../folds/'. $user_id .'_id');

        # make a docs folder
        mkDir('../../folds/'. $user_id .'_id/docs');

        # make a file inside the docs 
        file_put_contents('../../folds/'. $user_id .'_id/docs/credit.json', $empty);
        file_put_contents('../../folds/'. $user_id .'_id/docs/debit.json', $empty);

        # Personal User Settings
        file_put_contents('../../folds/'. $user_id .'_id/settings.json', $settings);

        #User Profile
        file_put_contents('../../folds/'. $user_id .'_id/user_profile.json', $user_profile);

        #Accounts Profile
        file_put_contents('../../folds/'. $user_id .'_id/account.json', $account);
        
        #Info Data
        file_put_contents('../../folds/'. $user_id .'_id/info_data.json', $info_data);
        // mkDir('folds');
    }