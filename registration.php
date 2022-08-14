<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $phoneno    = stripslashes($_REQUEST['phoneno']);
        $phoneno    = mysqli_real_escape_string($con, $phoneno);
        $nod    = stripslashes($_REQUEST['nod']);
        $nod    = mysqli_real_escape_string($con, $nod);
        $proof    = stripslashes($_REQUEST['proof']);
        $proof    = mysqli_real_escape_string($con, $proof);
        $addres    = stripslashes($_REQUEST['addres']);
        $addres    = mysqli_real_escape_string($con, $addres);
        
       // $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `motorbike` (username, email, phoneno,nod,proof,addres)
                     VALUES ('$username', '$email', '$phoneno', '$nod','$proof','$addres')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='payment.html'>Payment</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="text" class="login-input" name="phoneno" placeholder="Phoneno">
        <input type="text" class="login-input" name="nod" placeholder="No of Days">
        <input type="text" class="login-input" name="proof" placeholder="Proofs">
        <input type="text" class="login-input" name="addres" placeholder="address">
       
        <input type="submit" name="submit" value="Register" class="login-button">
        
    </form>
<?php
    }
?>
</body>
</html>
