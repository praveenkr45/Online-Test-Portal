<?php
session_start();
	
$u=$_SESSION['user'];
?>
<html>
<head>
<title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="menu.css"/>
<link rel="stylesheet" type="text/css" href="adduser.css"/>
<style>
div#top
{
	margin-left:20px;
	font-size:25px;
}

div#radio
{
	font-size:23px;
	margin-left:20px;
}
.table
{
	margin-left:40px;
}

</style>
</head>
<body style="background-image: url(bb.jpg);">
	<div id="top_style">
	<div id="image">
	<img src="exam.jpg" height=150 width=100%></div>
	



 
<?php include("menu.html"); ?>

<br>       
<br>

<h2 style="background-color: silver; text-align: center; font-size:30px;"><marquee behavior="alternate">UserName=<?php echo $u; ?></marquee></h2>

<?php
require("connection.php");

extract($_GET);

$stm="select * from addques where Quesno='$Quesno'";
$usrdata=$con->query($stm);
if(mysqli_num_rows($usrdata)>0)
{
	$row=mysqli_fetch_array($usrdata);
	
echo '

<form method="post" action="">

		<table border=0 class="table"> 
			<tr>
				<td colspan="2">	
				<div id="top">
				 <h3>Que '.$row[0].':  '.$row[1].'</h3></div>
				</td>
			</tr>

			<tr>
				<td>
				<div id="radio">
				 <input type="radio" name="op" value="1" />'.$row[2].'<br><br>
				 <input type="radio" name="op" value="2 "/>'.$row[3].'<br><br>
				 <input type="radio" name="op" value="3" />'.$row[4].'<br><br>
				 <input type="radio" name="op" value="4" />'.$row[5].'<br><br></div>
				</td>
			</tr>
					
			
		</table>
	</form>
';
}

else
{
	echo '<script> alert("User does not exist.");</script>';
}

?>
<table class="table" style="margin-left:50px;">

	<?php
	
	extract($_POST);
	require("connection.php");
	$stm="select * from addques";
	$abc=$con->query($stm);
	while($row=mysqli_fetch_array($abc))
	{
		echo '
		
	
	<td><a href="Invoice.php?Quesno='.$row[0].'"> '.$row[0].'</a> </td>';
	//<button type="submit" name="sbt"> save & next </button>
	}
		
	?>

	<?php
 if(isset($_POST['sbt']))
{
extract($_POST);
require("connection.php");
$a=$_POST['op'];
$stm="insert into answer(ans) values('$a')";
$stmt=$con->query($stm);
if($stmt)
{
	echo '<script>alert("Inserted successfully");</script>';
	
}
else
{
	echo '<script>alert(" Can not be Inserted ");</script>';
	echo mysqli_error($con);
}
}
?>