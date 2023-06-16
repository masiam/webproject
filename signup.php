<?php
    session_start();
        include("connection.php");
        include("function.php");


        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $username=$_POST['uname'];
           $password=$_POST['psw'];
            $mobile=$_POST['pno'];
            $stream=$_POST['stream'];
            $city=$_POST['city'];
            if(!empty($username)&& !empty($password) && !is_numeric($username))
            {
                $user_email=$_POST['email'];
                $query="insert into signup (Name,Email,Password,Mobile,Stream,City) values ('$username','$user_email','$password','$mobile','$stream','$city')";
                mysqli_query($con, $query);
                header("location:Login.php");
                die;
            }else{
                echo"please enter some valid informmation!";
            }
        }
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
<link rel="icon" href="/Make_My_Career-logo.png"> 

<style>
  body{
    
  font-family: 'Quicksand', sans-serif;}
  form {
    border-radius: 32px;
    width: 40%;
    height: 900px;
    background-color: #a1a0a0e6;
}
body{
  
  background-image: url(back.jpg);
  background-repeat: no-repeat;
}
h2{
    text-align: center;
    color: black;
}
input,select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


.imgcontainer {
  text-align: center;
  margin: 10px 0 4px 0;
}

img.avatar {
  width: 50%;
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
    font-size: 14px;
    float: right;
}
.psw>a{
    text-decoration: underline;
    color: black;
}
.psw>a:hover{
    color: blue;
}


</style>
  </head>
<body>
    <h2 >Sign up</h2>
    <div class="container2">
        

<form action="#" method="POST">
  <div class="imgcontainer">
    <img src="signup.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Name" name="uname" required>

    <label for="email"><b>E-Mail</b></label>
    <input type="email" placeholder="example@gmail.com" name="email" required id="loginEmail">

    <label for="password"><b>Password</b></label>
    <input type="password" name="psw" required id="psw">

    <label for="pno"><b>Mobile</b></label>
    <input type="number" name="pno" required id="mobile">

    <label for="stream"><b>Stream</b></label>
    <select name="stream" id="str">
      <option value="Stream" selected disabled>
        Select      </option>
      <option value="MBBS">
        MBBS
      </option>
      <option value="BTECH">
        Btech
      </option>
    </select>
    <label for="city"><b>City</b></label>
    <input type="text" name="city" required>

    <button type="submit" onclick=getInfo()>Signup</button>
    <span class="newuser">already an user? <a href="Login.html"> <b class="lgn">Login</b> </a> </span>
   
  </div>
 
</form>
    </div>
    <script>
      function chkEmail(){
          var value = document.getElementById("loginEmail").value;
          
          var regex = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$');

          
              if(!regex.test(value)){
                  alert("Please enter valid email address.");
              }
              

          }
          function chkMob(){
              var phNo = document.getElementById("mobile").value;
              if(!/(6|7|8|9)\d{9}/.test(phNo)){
                  alert("Please enter valid phNo.");
              }
              
          }
          function getInfo(){
              var value = document.getElementById("loginEmail").value;
              var phNo = document.getElementById("mobile").value;

              if(value && phNo){
                  chkEmail();
                  chkMob();
              }
              else if(value){
                  chkEmail();
              }
              else if(phNo)
                  chkMob();
              else
                  alert("Enter mobile No or Email.");
          }
  </script>

</body>
</html>