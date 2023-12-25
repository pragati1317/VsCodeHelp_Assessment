<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"rel="nofollow" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="App.css">
</head>
<body>
<div class="d-flex p-2 vh-100 vw-100 h-100 w-100 part ">
       
       <!-- left side -->
         <div class="m-auto part clr">
          <h1 class="text-white" >Vscodehelp</h1>
          <h2 class="text-white" >Login to Your Account</h2>
          <p class="text-white" >Don't have an account?<a href="#">Create an Account</a></p>
          <h5 class="text-white" >Our Top Authors</h5>
         </div>
         <!-- {/* right side */} -->
           
         <div class="m-auto part">

            <form class="d-flex flex-column"  id="form1" action="" method="post">
              <div class="d-block">
              <label class="text-white" >Username</label> <h6 class="text-danger">*</h6>
              </div>
             <input class="text-white"  type="text" placeholder="Enter Username" name="username" required/>
             <label class="text-white" >Password</label> <h6 class="text-danger">*</h6>
             <input type="password"  placeholder="Enter Password"  name="password" required/>
             <div class="d-flex">
              <input type="checkbox" placeholder="Remember Me" class="m-auto "/>
              <a class="m-auto text-white">Forget password?</a>
             </div>
             <br/>
             <button type="submit" class="btn bg-primary"  value="Submit">Submit</button>
            </form>
         </div>
      </div> 
    </div> 
</body>
</html>
<?php


// header("Access-Control-ALLOW-Origin: *");
// header("Acess-Control-Allow-Methods: GET,POST");
// header("Acess-Control-Allow-Headers:Content-Type");

// if(mysqli_connect_error()){
//     echo mysqli_connect_error(); 
//     exit();
// }
// else{
//     $eData=file_get_contents("php://input"); 
//     $dData=json_decode($eData, true); 

//     $user=$dData['user']; 
//     $pass=$dData['pass']; 
//     $result=""; 

//     if($user!="" and $pass!="")
//     {
//         $sql="SELECT * FROM user where user='$user' and pass='$pass'; "; 
//         $res=mysqli_query($conn, $sql);

//         if(mysqli_num_rows($res)!=0){
//           $result="Loggedin successfully! Redirecting...."; 
//         }
//         else{
//             $result="";
//         }

//         $conn->close(); 
//         $response[]=array("result"=>$result); 
//         echo json_encode($response); 
//     }
// }
 require_once "connection.php"; 
 session_start(); 
if ($_SERVER['REQUEST_METHOD'] === "POST"){
 if(isset($_SESSION['username']))
 {
    header("location: index.php"); 
    exit; 
 } 

 // if request method is post

    $username=$_POST['username']; 
    $password=$_POST['password']; 
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $qy="SELECT * FROM users where username='$username' and password='$pass' ";
    $res=mysqli_query($conn, $qy); 

    if(mysqli_num_rows($res)>0){
      $_SESSION['username']= $username; 
      $_SESSION['login']= 'Yes';
        echo "Successfully Login";
      header("location: index.php");
    }
    else{
        echo "username and password is invalid";
    }
}

?>