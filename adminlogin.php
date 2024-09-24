<?php
session_start();
?>

<?php
if(isset($_POST['sbt']))
{
extract($_POST);
require("connection.php");

$stm="select * from admin where username='$myusername'";
$usrdata=$con->query($stm);

if(mysqli_num_rows($usrdata)>0)
{

$usrdata=mysqli_fetch_array($usrdata);
if($usrdata[2]==$mypassword)
{
	session_start();
	$_SESSION['admin']=$myusername;
	echo '<script> window.location.href="adminmenu.php";   </script>';
}
else
{
	echo '<script> alert("Wrong Username or Password");</script>';
}
}
else
{
	echo '<script> alert("Wrong Username or Password");</script>';
}

}
?>




<html>

<head>
  <style type="text/css">
      body{background:url(bb.jpg);
	   background-size:200% 200%;
	      background-repeat:no-repeat;
	   word-wrap:break-word;}
     
      

     table.black{background:url(02.jpg);
                 padding-left:4cm;
                 padding-right:4cm;
								margin-top:40px;
								margin-left:550px;
								border-radius:15px;
				 }
				 
	 input[type=submit]   
{
	
	background-color:green;
	color:white;
	padding:14px 20px;
	margin:10px 0;
	margin-left:0px;
	border:none;
	cursor:pointer;
	width:80px;

}
  </style>         
    
     
  
 
</head>

<body>
<font color="black" />
	
<div class=bg>
<img src="exam.jpg" height=150 width=100%></div> 
	<form name="form1" method="POST" action="#">
<table align='left' class="black" width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td colspan="3"><strong><font  size=6 color="white">Admin Login</font></strong></td>
</tr>
<tr>
<td width="78"><font color="white" size=5 >Login ID</font></td>
<td width="6"><font color="white">:</font></td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td><font size=5 color="white">Password</font></td>
<td><font color="white">:</font></td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</font>
</tr>
<td align='right'><input align='right' type="submit" name="sbt" value="Login"></td>
</tr>
</table>
</form>


</body>
</html>
