<?php
require "sendsms.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Send SMS from PHP using textlocal</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Verify your mobile number</h1>
        <hr>
    	<div class="row">
            <div class="col-md-9 col-md-offset-2">
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-9 form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="" maxlength="10" placeholder="Enter valid mobile number" required="">
                            <!--  Display errors -->
                            <?php if(in_array("Invalid mobile number!!<br>", $error_array)) 
                                    echo "Invalid mobile number!!<br>";
                                else if(in_array("Mobile numbers contain only 0-9 digits!!<br>", $error_array)) 
                                    echo "Mobile numbers contain only 0-9 digits!!<br>";
                                else if(in_array("OTP successfully sent to your mobile number!!<br>", $error_array)) 
                                    echo "OTP successfully sent to your mobile number!!<br>";
                                else if(in_array("Mobile Number verified successfully!!<br>", $error_array)) 
                                    echo "Mobile Number verified successfully!!<br>";               
                                else if(in_array("Please enter correct otp. <br>", $error_array)) 
                                    echo "Please enter correct otp. <br>";
                            ?>  
            <!--********************************************************************* -->
            <!--********************************************************************* -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 form-group">
                            <button type="submit" name="sendopt" class="btn btn-lg btn-success btn-block">Send OTP</button>
                        </div>
                        <!-- Display errors -->
                        <?php if (in_array("Mobile Number verified successfully!!<br>", $error_array)) {
                                echo "Mobile Number verified successfully!!<br>";}
                                else if (in_array("Please enter correct otp.", $error_array)) {
                                    echo "Please enter correct otp.";
                                }
                        ?>
                    </div>
                </form>
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-sm-9 form-group">
                            <label for="otp">OTP</label>
                            <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" maxlength="5" required="">
                            <?php if (in_array("OTP successfully sent to your mobile number!!<br>", $error_array)) {
                                echo "OTP successfully sent to your mobile number!!<br>";
                            }?>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-9 form-group">
                            <button type="submit" name="verifyotp" class="btn btn-lg btn-info btn-block">Verify</button>
                        </div>
                    </div>
                </form>
    	</div>
    </div>
</body>
</html>