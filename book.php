<?php
session_start();
if($_SESSION)
{
  $id=$_SESSION["id"];
}

$sn="localhost";
$un="root";
$pass="";
$dn="carrental";

$conn=new mysqli($sn,$un,$pass,$dn);
if($conn->connect_error)
{
  die("Connection failed:".$conn->connect_error);
}

if($_POST)
{
  $d=$_POST['fromdate'];
  $h=$_POST['hours'];
}

$vhid=$_GET['vhid'];

$sql="SELECT * FROM tblusers WHERE id LIKE '$id'";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    $name=$row['FullName'];
    $email=$row['Email'];
  }
}

$sql="SELECT * FROM tblvehicles WHERE id LIKE '$vhid'";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    $vname=$row['VehiclesTitle'];
    $price=$row['PricePerDay'];
  }
}


$tot=$h*$price;
$pd=date("Y-m-d h:i:sa");

$vhid=$_GET['vhid'];
$sql="INSERT INTO  tblbooking(user_id,userEmail,VehicleId,FromDate,hours,PostingDate,totprice) VALUES('$id','$email','$vhid','$d','$h','$pd','$tot')";

if($conn->query($sql)===TRUE)
{

        echo "<script>alert('Booking successfull.');</script>";
}
else 
{
//echo "<script>alert('Something went wrong. Please try again');</script>";
echo "ERROR :" .$sql."<br>".$conn->error;

}



?>



<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <title>car rental</title>
    <div class="topnav">
  <a class="active" href="index.html">LOGOUT</a></div>
    <style>
.one{
  font-size:  20px;
  color: white;
  font: 30px;
  display:table; margin:0 auto;
  
  
}

.hi{

     
    background-color: brown; 

}
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        float:center;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    .i{
        text-align: center;
    }
    .left
    {
        float: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box" >
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                     <table>
                        <tr>
                            <td class="title">
                                <img src="logo.jpg" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>

                                Invoice #: 123<br>
                                Created: <?php  echo $pd;  ?>
                                
    <!---                                <p id="result5"></p>
    <script> 
        document.getElementById("result5").innerHTML=localStorage.getItem("textvalue5");
    </script>
  --->  
                                <br>
                        

                            </td>
                        </tr>
                        <tr>
                            <td>
                              name:  <?php echo $name;  ?>
                              <!---  <p id="result3"></p>
    <script> 
        document.getElementById("result3").innerHTML=localStorage.getItem("textvalue3");
    </script>--->
                                <br>

                                
                                                                
                              Email: <?php echo $email;   ?>
                            </td></tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                CAR RENTALS, Inc.<br>
                                #2123 Jayanagar<br>
                                Bangalore, 560011
                            </td>

                            
                        </tr>
                    </table>
                </td>
            </tr>
            
            
            
            
            
            <tr class="heading">
                
                <td>
                    Name of the car
                </td>
                <td>
                    Start date
                </td>
                <td>
                    No of Hours
                </td>
                <td>
                   Total  Price in INR
                </td>
            </tr>
            
            <tr class="">
                <td>
                <?php echo $vname; ?>
                </td>
                
                <td>
                    <?php echo $d; ?>
                </td>
                <td>
                    <?php echo $h; ?>
                </td>
               <td>
                    <?php echo $tot; ?>
                </td>

</tr>                    

        </table>


    </div><br>
    <div class="i">
    <button onclick="myFunction()" >PRINT</button>

    <script >
        function myFunction(){
            window.print();
        }
    </script>
</div>
</body>
</html>