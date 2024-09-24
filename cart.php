<!DOCTYPE html>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<style>

div#input
{
	width:240px;
	margin-left:300px;
	margin-top:250px;
	
}

div#input1
{
	width:240px;
	margin-left:300px;
	
	
}
button
{
	margin-left:350px;
	margin-top:30px;
	width:90px;
	height:40px;
}

</style>
<body class="p-3 mb-2 bg-primary">




 <img src="exam.jpg" width=100% height=150%>  
 


<form method="POST" action="#">
<div id="form">


  <div id="input" class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="username" type="text"  class="form-control" name="myusername" placeholder="Username">
  </div><br>
  <div id="input1"  class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="mypassword" placeholder="Password">
  </div>


<button class='btn btn-success ' name="sbt" action="submit" > Login </button>
</div>

  </form>

</body>
</html>

<?php  
 extract($_POST);
if(isset($_POST['sbt']))
{
extract($_POST);
//equire("connection.php");
$con =  mysqli_connect('localhost','root','','exam');
$stm="select * from admin where username='$myusername'";
$usrdata=$con->query($stm);

if(mysqli_num_rows($usrdata)>0)
{

$usrdata=mysqli_fetch_array($usrdata);
if($usrdata[2]==$mypassword)
{
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

<script>

$(document).ready(function(){
  $("img").click(function(){
    $("input").toggle(100);
	var x=1;
	if(x==1)
	$("div")
  .slideUp(2000)
  .slideDown(2000);
 
  });
});
</script>




<?php

$result = mysql_query("SELECT * FROM 1b")
              or die ('Connection to table failed');

$x = 0;
$score = 0;
while ($row = mysql_fetch_assoc($result)){

    echo "Question Number: " . $row['Questionid'] . '<br />';
    echo "Question: " . $row['Questiontext'] . '<br />';
    echo "Correct Answer: " . $row['Correctanswer'] . '<br />';
    foreach ($_GET['select'] as $value)
    echo "Your Answer: " . $value."\n" . '<br />';

    $answered = $row['select'.$_GET['a'.$x]] ;
    $correct = $row['Correctanswer'] ;

    if ($answered == $correct ) {
        $score++;
        $acolor = 'green' ;
    }
    else {
        $acolor = 'red' ;
    }

    $x = $x + 1;
}
echo 'You answered ' . $score . ' out of ' . $x . ' questions correctly!';
?>
