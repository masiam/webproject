<?php
function check_login($con)
{
    if(isset($_SESSION['uname']))
    {
        $id=$_SESSION['uname'];
        $query="select * from uname where user_id = '$id' limit 1";
        $result= mysqli_query($con,$query);
        if($result && mysqli_num_rows($result)> 0)
        {
            $user_data= mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("location:Login.php");
    die;
}