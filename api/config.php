<?php
    /* 
    * Set up all the date variables
    */

    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','demo');

    # PDO TRY AND CATCH ERROR MODE
    try {
        $pdo = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

        # SET PSO ERROR TO EXP
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die("Error: Could not connect. " . $e->getMessage());
    }


?>