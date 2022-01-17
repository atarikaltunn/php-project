<?php
// remove all session variables
session_start();

// destroy the session
session_destroy();
echo 'You have cleaned session';
header('location: ./car/offers.php');

?>
