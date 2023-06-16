<?php
$login=false;
$showerror=false;
    include ("connection.php");
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["uname"];
    $password=$_POST["psw"];
    $sql="select * from signup where Email='$username' AND Password='$password'";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        $login=true;
        session_start();
        $session['loggedin']=true;
        $session['username']=$username;
        header("location:homepage.php");
    }
    else{
        $showerror="Invalid credentials";
    }
}




?>




<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
<link rel="icon" href="/Make_My_Career-logo.png"> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<style>
  body{
    background-image: url(login-security.png);
    background-size: 1550px;
    background-repeat: no-repeat;
    
  font-family: 'Quicksand', sans-serif;}


  form {
border: none;
border-radius: 32px;
    width: 40%;
    background-color: rgb(241 239 239 / 85%);
}
body{
  background-color: #f0f0f0;
}
h2{
  color: white;
    text-align: center;
}
input[type=email], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #00a653;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 10PX;
}

button[type=submit]:hover {
  background-color: #028141;

}

.signupbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #b92d23;
}
.signupbtn:hover{
background-color: #f44336;}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;

  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

.container2{
    display: flex;
    justify-content: center;
    position: relative;
    top: 10px;
}
.newuser{
    font-size: 16px;
    color:white;
}
.psw>a{
    text-decoration: underline;
    color: black;
}
.psw>a:hover{
    color: blue;
}

.continue{
    display:flex ;
    justify-content: center;
}
.continue>span{
    margin: 2px;
    padding-right: 5px;
}
</style>
</head>
<body>
  <?php
  if($login){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>LOGIN SUCCESSFUL</strong>Welcome
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  if($showerror){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>INVALID CREDENTIALS!</strong> Enter correct Email or Password
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
    <h2>Login</h2>
    <div class="container2">
        

<form action="" method="post">
  <div class="imgcontainer">
    <img src="Login.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="email" placeholder="Enter Email" name="uname" id="loginEmail" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" onclick="getInfo()">Login</button>
   
  </div>
 
  <div class="container" style="background-color:#3232329f">
    <span class="newuser"> new user?</span>
    <a href="signup.php"><button type="button" class="signupbtn">SignUp</button></a>
    <span class="psw"> <a href="#">Forgot password?</a></span>
  </div>
</form>
    </div>
    <script>
      function getInfo(){
          var value = document.getElementById("loginEmail").value;
          var regex = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$|(\d{10})');

          if(value){
                  if(!regex.test(value)){
                  alert("Please enter valid email address or phone number.");
              }
          }else{
             alert('This field is required.');
          }
              

          }
  </script>
</body>
</html>