<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Php Login System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3>Please Register Here:</h3>
<hr>
<form action="" method="post">
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputUsername">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Enter Username" pattern="(?=.*\d)(?=.*[a-z]).{8,}"required>

    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail">Username</label>
      <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Enter Email Address"  pattern="/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i" required>
    </div>

    <div class="form-group col-md-4">
      <label for="inputCountry">Country</label>
      <select id="inputCountry" name="country" class="form-control">
        <option selected>Choose...</option>
        <option>India </option>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="inputPhone">Mobile Number</label>
      <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Mobile Number" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
    </div>
  </div>
  <div class="form-group">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password" required>
    </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
  <p style="float: center" >Copyright @ 2023. All Right Reserved</p>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
require_once "connection.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $username=$_POST["username"];
       
        $sql = "SELECT * FROM users WHERE username ='$username' ";
       $res=mysqli_query($conn, $sql); 

       if(mysqli_num_rows($res)>0){
             $username_err="Already Taken that Username"; 
       }
       else{

        require "./PHPMailer-master/src/PHPMailer.php"; 
        require "./PHPMailer-master/src/SMTP.php"; 
        require "./PHPMailer-master/src/Exception.php"; 
       
        require PHPMailer-master\PHPMailer; 
        require PHPMailer-master\SMTP; 
       
        $verification_otp=random_int(100000, 999999);

        $password=$_POST["password"]; 
        $email=$_POST['email']; 
        $phone=$_POST['phone']; 
        $country=$_POST['country'];
        $confirm_password=$_POST['confirm_password']; 

        
        if($password!==$confirm_password){
            // <script>alter("password is Not matching"); <script/>
             $ErrMsg="Phone Number is invalid"; 
             echo $ErrMsg; 
        }
        else{
          $password = password_hash($confirm_password, PASSWORD_DEFAULT);
            // if(preg_match("/^[0-9]{9,11}$/", $phone))
            // {

              function sendMail($email , $otp, $username)
              {
                $mail=new PHPMailer(true); 
                $mail->isSMTP();
                $mail->SMTPAuth=true;
                $mail->SMTPSecure="tls";
                $mail->Host ="smtp.gmail.com"; 
                $mail->SMTPSecure =PHPMailer :: ENCRYPTION_STARTILS; 
                $mail->Port =587;

                $mail->Username="fshopee15@gmail.com";
                $mail->Password = "dxymqriflofwglbj";

                $mail->setFrom("fshopee15@gmail.com", "CodePragatiGupta"); 
                $mail->Subject="Account Activation"; 
                $mail->Body="Hello , {$username}\n Your account registration is successfully done! No Activate Your Account ,Your OTP is {$otp}";
              }
                $_SESSION['username']=$username;
                $qy="insert into users(username, email,phone, country, password) values ('$username', '$email', '$phone','$country', '$password'); ";
                 mysqli_query($conn, $qy); 
           
                 $_SESSION['login']='Yes'; 
                 echo "Successfully";
                 header('location: index.php'); 
            //}
        }
       }

    }

}
 // Kamal@1879
?>
