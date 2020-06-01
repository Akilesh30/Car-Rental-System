<?php

    $con=mysqli_connect('127.0.0.1','root','');

    if(!$con)
    {
        echo 'Not Connected to server';
    }

    if(!mysqli_select_db($con,'carrental'))
    {
        echo 'Database not Selected';
    }
  

    $First=$_POST['fname'];

    $pass=$_POST['password'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $sql="INSERT INTO tblusers (FullName,Email,Password,ContactNo) VALUES ('$First','$email','$pass','$phone')";
    if(!mysqli_query($con,$sql))
    {
       
   echo 'Not Inserted';
    }
    else{
          $last_id = mysqli_insert_id($con);
        echo 'INSERTED';
    }

    header("refresh:1; url=login.php?id=$last_id");

?>