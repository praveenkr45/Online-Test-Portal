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
<body>
	<div id="top_style">
	<div id="image">
	<img src="exam.jpg" height=150 width=100%></div>
	



 
<?php include("menu.html"); ?>

<br>       
<br>

<h2 style="background-color: silver; text-align: center; font-size:30px;"> Result Online Exam</h2>


</body>
</html>

</div>
</body>
</html>
<?php
extract($_POST);
 $con =  mysqli_connect('localhost','root','','exam'); 
 $stmt = mysqli_query ($con, "select CAnswer,myanswer,user_id from addques Q,answer A where Quesno=question_id And user_id='$u'");
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
       // $acolor = 'red' ;
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
	echo "<b><center><font size=+4 color=red>You have not given any exam";
}	
?>