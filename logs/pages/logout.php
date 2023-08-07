<?php 
    #intialize the seesion
    session_start();

    # UNSET ALL OF SESSION VARIABLES
    $_SESSION = array();

    # Destroy the session
    session_destroy();

    # Redirect to login page
    header('location: login.php');
    exit

?>