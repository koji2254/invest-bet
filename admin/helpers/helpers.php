<?php
    function getRand(){
        $user_id = rand(1000000, 9000000);

        return $user_id;
    }

    function cheackEmail($email, $pdo){
        $remark = '';
        // Preapare stmt
        $sql = 'SELECT id FROM admin WHERE email = :email';
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

        $sql = 'INSERT INTO admin (user_id, name, email, password) VALUES (:user_id, :name, :email, :password)';

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
        $sql = 'SELECT id, user_id, name, email, password FROM admin WHERE email = :email';
        
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
                    $remark = 'true';
                    return $remark;
                }else {
                   $remark = 'password is not valid';
               }
               }  
              }else{
                $remark = 'user-does not exits';
              }
              unset($stmt);
            }
        }
       return  $remark;
        
    }