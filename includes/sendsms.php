<?php
require('textlocal.class.php');
$error_array = array();

if(isset($_POST['sendopt'])) {
    /*Enter your API_KEY*/
    define("API_KEY", 'ezKctOMO/PQ-AW7jX514Yt21ERT5HbFGgmHzOLbopd');

    $textlocal = new Textlocal(false, false, API_KEY);

    // Access enter mobile number in input box
    $numbers = array($_POST['reg_mobile']);

    $sender = 'TXTLCL';
    $otp = mt_rand(10000, 99999);

    $message = "Hello, " . "<br>" . " OTP for your mobile number verification  is : " . $otp;

    try {
        $result = $textlocal->sendSms($numbers, $message, $sender);
        setcookie('otp', $otp);
        array_push($error_array, "OTP successfully sent to your mobile number!!<br>");
    } 
    catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

if(isset($_POST['verifyotp'])) { 
    $otp = $_POST['otp'];
    if($_COOKIE['otp'] == $otp) {
        array_push($error_array, "Mobile Number verified successfully!!<br>");
    } else {
        array_push($error_array, "Please enter correct otp.");
    }
}
?>