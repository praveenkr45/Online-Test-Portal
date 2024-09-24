<?php
session_start();
if(!isset($_SESSION['admin']))
{
echo '<script> alert("Please Login First");   </script>';
echo '<script>window.location.href="index.php"; </script>';
}

?>


<?php

if(isset($_POST['sbt']))
{
extract($_POST);
include("connection.php");

if($pwd==$pwd1)
{
$stmt="insert into user(Name,Email,Username,Password)values('$n','$e','$usr','$pwd')";
$temp=$con->query($stmt);

if($temp)
{
    echo '<script>alert(" user added successfully");</script>';
}
else
{
    echo '<script>alert(" user insertion failed.");</script>';
    echo mysqli_error($con);
}
}
else
{
   echo '<script>alert("Password did not match.");</script>'; 
}
}
?>
<html>
<head>

<title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="adduser.css"/>
  <link rel="stylesheet" type="text/css" href="menu.css"/>
	
</head>

	<div id="top_style">
	<div id="image">
	<img src="exam.jpg" height=150 width=100%></div>
	

<body style="background-image: url(bb.jpg);">

 
<?php include("adminmenu.html"); ?>

<br>       
<br>

<h2 style="background-color: silver; text-align: center; font-size:30px;"> Add user </h2>



<div id="style_informations">
	<form method="POST" action="#">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td><p>Name:</p> </td>
            	<td>
                	<input type="text" name="n" id="textbox" required />
                </td>
            </tr>
             <tr>
			 
            	<td><p1>Email:<p1> </td>
            	<td>
                	<input type="email" name="e" id="textbox" required />
                </td>
            </tr>
           
			
            <tr>
            	<td><p2>Username:<p2></td>
            	<td>
                	<input type="text" name="usr" id="textbox" required/>
                </td>
            </tr>
            
            <tr>
            	<td><p3>Password:<p3></td>
            	<td>
                	<input type="password" name="pwd" id="textbox"  required/>
                </td>
            </tr>
            
            <td><p4>Confirm Password:</p4></td>
            	<td>
                	<input type="password" name="pwd1" id="textbox"  required/>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	
                	<input type="submit" name="sbt" value="Add" id="button-in"  />
                </td>
            </tr>
        </table>

   </div>
    </form>




</body>
</html>