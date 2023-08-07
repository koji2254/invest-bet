<?php
   

    function getName($name, $age){
        $data =
         array(
                'name' => $name,
                'age' => $age
            );

      return $data;
    }

    function getRand(){

        $user_id = rand(1000000, 9000000);

        return $user_id;
    }