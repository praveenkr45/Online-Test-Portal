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

<style>
input[type=submit]
{
	width:140px;
	height:35px;
	font-size: 13px;
	border-radius: 20px;
	background-image:url(B.gif);
	background-size:100%;
	padding-left:5px;
}

input[type=submit]
{
	color: white;
}

input[type=textbox]
{
	width:190px;
	height:35px;
	
	font-size: 13px;
	border-radius:5px;
	background-size:100%;
	padding-left:5px;
}
table.table
{
	font-size:25px;
	
}
</style>
<body bgcolor="lightblue">
<div id =image>
<img src="exam.jpg" height=150 width=100%></div>
<?php include("adminmenu.html"); ?>

 <br>
 <h2 style="background-color: silver; text-align: center; font-size:30px;"> Result-List </h2> <br>
<form action="#" method="POST">
<font color="blue" size=+2>	Enter username:</font>
		<input type="textbox" name="t1" required><br><br>
		<input type="submit" name="sbt" value="Get Result">
		<br>
	</form>
</body>
</html>
<?php
if(isset($_POST['sbt']))
{
	extract($_POST);
	require("connection.php");
	$stm="select CAnswer,myanswer,user_id from addques Q,answer A where Quesno=question_id And user_id='$t1'";
	$stmt=$con->query($stm);
	$x = 3;
$score = 0;
if(mysqli_num_rows($stmt)>0)
{
while($row=mysqli_fetch_array($stmt))
{
	if ($row[0] == $row[1])
		{
        $score++;
        //$acolor = 'green' ;
		}
    else
		{
       //echo "<b><center><font size=+4 color=green>$t1 have not given any exam";
		}

    //$x = $x + 1;
}
//echo 'You answered ' . $score . ' out of ' . $x . ' questions correctly!';
echo '<center><table  border="5" cellspacing=3  cellpadding=4 >';
echo"

<tr>
<th><b><font color=brown>Total Question</th>
<th><b><font color=brown>Score</th>
</tr>

<tr>
	<td><b><font color=blue>  $x </td>
	<td><b><font color=blue> $score </td>
</tr>";
}
else
{
	//echo "<b><center><font size=+4 color=red>$t1 have not given any exam";
	echo '<script>alert("'.$t1.' not found OR maybe '.$t1.' had not given any exam..... ");</script>';
}
}	
?>
