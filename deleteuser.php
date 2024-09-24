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
require("connection.php");
$usr=@$_POST['usn'];

$stm="select * from user where Username='$usr'";
$usrdata=$con->query($stm);

if(mysqli_num_rows($usrdata)>0)
{
$stm="delete from user where Username='$usr'";
$temp=$con->query($stm);

if(mysqli_affected_rows($con)>0)
{
	echo '<script> alert("User Deleted successfully.");</script>';
}
else
{
	echo '<script> alert("Operation failed.");</script>';
}

}
else
{
	echo '<script> alert("User does not exist.");</script>';
}


}


?>




<html>

<head>
  <style type="text/css">
      body{background:url(bb.jpg);
	   background-size:200% 200%;
	      background-repeat:no-repeat;
	   word-wrap:break-word;
	  }
        
     table.black{background:url(02.jpg);
                 padding-left:4cm;
                 padding-right:4cm;
								
								margin-left:500px;
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
   <link rel="stylesheet" type="text/css" href="deleteuser.css"/>
   <link rel="stylesheet" type="text/css" href="menu.css"/>
</head>

<body style="background-image: url(bb.jpg);">
<font color="black" />
	
<font size="6" color="white" />
    <div class=bg>
<img src="exam.jpg" height=140 width=100%></div> 
	
 
<?php include("adminmenu.html"); ?>

<br>
<h2 style="background-color: silver; text-align: center; font-size:30px;"> Delete User </h2>
<br>
<form name="form1" method="POST" action="#">
<table align='right' class="black" width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td colspan="3"><strong><font  size=6 color="white">Delete User</font></strong></td>
</tr>
<tr>
<td width="78"><font color="white" size=5 >Username</font></td>
<td width="6"><font color="white">:</font></td>
<td width="294"><input name="usn" type="text" id="usn" required></td>
</tr>
<tr>
<td align='right'><input align='right' type="submit" name="sbt" value="Delete"></td>
</tr>
</table>
</form>
</form>


</body>
</html>
