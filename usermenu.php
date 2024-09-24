<?php
session_start();
	
$u=$_SESSION['user'];

if(!isset($_SESSION['user']))
{
echo '<script> alert("Please Login First");   </script>';
echo '<script>window.location.href="index.php"; </script>';
}

?>

<html>
<head>

<title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="menu.css"/>
<link rel="stylesheet" type="text/css" href="adduser.css"/>

	<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</head>
<body style="background-image: url(bb.jpg);">
	<div id="top_style">
	<div id="image">
	<img src="exam.jpg" height=150 width=100%></div>
	



 
<?php include("menu.html"); ?>

<br>       
<br>

<h2 style="background-color: silver; text-align: center; font-size:30px;"> Welcome to Online Exam</h2>

<div class="main">

	<div class="starttest">
	<p>Name:-<?php echo $u; ?>
	
		<p>This is multiple choice exam</p>

		
	<font size=+2 >	<li><b>Number of Questions:</b>20</li>
			<li><b>Question Type:</b> Multiple Choice</li></font><br>
			
			
			<form method="POST" action="result.php">
<button class='btn btn-success' name="sbt" value="submit"  > Get result</button></form>
		

	<center>	<a href="test.php"><font size=+4 color="black">Start Test</font></a>

	</div>


</body>
</html>

</div>
</body>
</html>

<?php
 if(isset($_POST['sbt']))
{
echo '<script>window.location.href="result.php"; </script>';
}
?>