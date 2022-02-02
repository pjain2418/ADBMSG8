<?php
session_start();
if(empty($_SESSION['user_info'])){
    echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
}
$conn = mysqli_connect("localhost","root","root","payment");
if(!$conn){  
echo "<script type='text/javascript'>alert('Database failed');</script>";
  die('Could not connect: '.mysqli_connect_error()); 
}
if(isset($_POST['paynow'])){
$cardno= $_POST['card_no'];
$cvv =$_POST['cvv'];
$exp = $_POST['exp_yr'];

$stmt = "SELECT * FROM pay_details WHERE card_no='$cardno' AND cvv='$cvv' AND exp_yr='$exp'";
$result = mysqli_query($conn, $stmt);
//$row = mysqli_fetch_assoc($result);

if($result)
{  
	
    echo "<script type='text/javascript'>alert('Ticket booked successfully')</script>";
    header('Location:index.php');
}
	else {
        echo "<script type='text/javascript'>alert('Transaction failed')</script>";

		
	}
	//echo "<script type='text/javascript'>alert('$message')</script>";
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper">
        <h2>Payment Form</h2>
        <form action="pay.php" method="post">
            <!--Account Information Start-->
            <h4>Account</h4>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" placeholder="Full Name" name="name"  class="name">
                    <i class="fa fa-user icon"></i>
                </div>
                <div class="input_box">
                    <input type="text" placeholder="Name on Card"  class="name">
                    <i class="fa fa-user icon"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="email" placeholder="Email Address"  class="name">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" placeholder="Address"  class="name">
                    <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="text" placeholder="City"  class="name">
                    <i class="fa fa-institution icon"></i>
                </div>
            </div>
            <!--Account Information End-->


            <!--DOB & Gender Start-->
            <div class="input_group">
                <div class="input_box">
                    <h4>Date Of Birth</h4>
                    <input type="text" placeholder="DD"  class="dob">
                    <input type="text" placeholder="MM"  class="dob">
                    <input type="text" placeholder="YYYY"  class="dob">
                </div>
                <div class="input_box">
                    <h4>Gender</h4>
                    <input type="radio" name="gender" value ="male"class="radio" id="b1" checked>
                    <label for="b1">Male</label>
                    <input type="radio" name="gender" value="female" class="radio" id="b2">
                    <label for="b2">Female</label>
                </div>
            </div>
            <!--DOB & Gender End-->


            <!--Payment Details Start-->
            <div class="input_group">
                <div class="input_box">
                    <h4>Payment Details</h4>
                    <input type="radio" name="pay" class="radio" id="bc1" checked>
                    <label for="bc1"><span>
                            <i class="fa fa-cc-visa"></i>Credit Card</span></label>
                    <input type="radio" name="pay" class="radio" id="bc2">
                    <label for="bc2"><span>
                            <i class="fa fa-cc-paypal"></i>Paypal</span></label>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="tel" name="card_no" class="name" placeholder="Card Number 1111-2222-3333-4444" required>
                    <i class="fa fa-credit-card icon"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <input type="tel" name="cvv" class="name" placeholder="Card CVV" required>
                    <i class="fa fa-user icon"></i>
                </div>
            </div>
            <div class="input_group">
                <div class="input_box">
                    <div class="input_box">
                        <input type="number" placeholder="Exp Month" required class="name">
                        <i class="fa fa-calendar icon" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="input_box">
                    <input type="number" name="exp_yr" placeholder="Exp Year" required class="name">
                    <i class="fa fa-calendar-o icon" aria-hidden="true"></i>
                </div>
            </div>
            <div class="input_box">
                <input type="number" placeholder="Enter Amount" required class="name">
                <i class="fa fa-money icon" aria-hidden="true"></i>
            </div>
            <!--Payment Details End-->

            <div class="input_group">
                <div class="input_box">
                  <button name="paynow" value="pay now">
                      PAY NOW </button>
                </div>
            </div>

        </form>
    </div>

</body>

</html>
        