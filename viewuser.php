<?php
session_start();
if(!isset($_SESSION['admin']))
{
echo '<script> alert("Please Login First");   </script>';
echo '<script>window.location.href="index.php"; </script>';
}

?>

<html>
<head>
 <link rel="stylesheet" type="text/css" href="admin.css"/>
 <link rel="stylesheet" type="text/css" href="menu.css"/>
</head>
<body style="background-image: url(bb.jpg);">
<div id =image>
<img src="exam.jpg" height=150 width=100%></div>
<?php include("adminmenu.html"); ?>

 <br>
 <h2 style="background-color: silver; text-align: center; font-size:30px;"> View User </h2> <br>

 <center>
<table  border="5" cellspacing=3  cellpadding=4>
<tr>
<th>Name</th>
<th>Email</th>
<th>Username</th>
<th>Password</th>
</tr>
<?php
require("connection.php");
$stm="select * from user";
$data=$con->query($stm);

while($row=mysqli_fetch_array($data))
{
	echo '
	<tr>
	<td> '.$row[0].' </td>
	<td> '.$row[1].' </td>
	<td> '.$row[2].' </td>
	<td> '.$row[3].' </td>

	';
}

?>
</table></center>
</body>
</html>