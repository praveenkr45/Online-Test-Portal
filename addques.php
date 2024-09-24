<?php
session_start();
if(!isset($_SESSION['admin']))
{
echo '<script> alert("Please Login First");   </script>';
echo '<script>window.location.href="index.php"; </script>';
}

?>


<?php
include("connection.php");
$stmt1="select * from quesno";
$stm=$con->query($stmt1);
$row=mysqli_fetch_array($stm);
$n="$row[0]";

if(isset($_POST['sbt']))
{
extract($_POST);
include("connection.php");


$stmt="insert into addques(Quesno,Question,Option1,Option2,Option3,Option4,CAnswer)values('$num','$q','$op1','$op2','$op3','$op4','$ans')";
$temp=$con->query($stmt);

if($temp)
{
    echo '<script>alert(" Ques added successfully");</script>';
		$stm="update quesno set QuestionNo=$n+1";
	$abc=$con->query($stm);
	
}
else
{
    echo '<script>alert(" Insertion failed.");</script>';
    echo mysqli_error($con);
}
}

?>
<html>
<head>

<title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="adduser.css"/>
  <link rel="stylesheet" type="text/css" href="menu.css"/>
	<style>
	input[type=text]
	{
		border-radius:10px;
		border:2px solid #dadada;
	}
	input[type=text]:focus
	{
		outline:none;
		border-color:darkblue;
		box-shadow:0 0 10px darkblue;
	}
	
	 	button:hover
	{
			background-color:red;

	}


button
{

	background-color:lightskyblue;
    display: inline-block;
   padding: 0px 200px 0px 60px;
    border: 2px solid;
    	text-align: center;
    margin-top: 3px;
    margin-left: 270px;
	font-size: 26px;
	width: 16%;
	height: 50px;
	cursor: pointer;
}

	</style>
</head>

	<div id="top_style">
	<div id="image">
	<img src="exam.jpg" height=150 width=100%></div>
	

<body style="background-image: url(bb.jpg);">

 
<?php include("adminmenu.html"); ?>

<br>       
<br>

<h2 style="background-color: silver; text-align: center; font-size:30px;"> Add Question </h2>



<div id="style_informations">
	<form method="POST" action="#">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
							
							<tr>
            	<td><p>Question No:</p> </td>
            	<td>
                	<input type="number"  style=" width:40px; height:30px;" name="num" value="<?php echo $n; ?>" id="textbox" required />
                </td>
            </tr>
            
							
            <tr>
            	<td><p>Question:</p> </td>
            	<td>
                	<input type="text"  style="width:600px; height:100px;" name="q" id="textbox" required />
                </td>
            </tr>
             <tr>
			 
            	<td><p1>Option-1:<p1> </td>
            	<td>
                	<input type="text" name="op1" style="width:600px; height:80px;" id="textbox" required />
                </td>
            </tr>
           
			
            <tr>
            	<td><p2>Option-2:<p2></td>
            	<td>
                	<input type="text" name="op2" style="width:600px; height:80px;" id="textbox" required/>
                </td>
            </tr>
            
            <tr>
            	<td><p3>Option-3:<p3></td>
            	<td>
                	<input type="text" name="op3" style="width:600px; height:80px;" id="textbox"  required/>
                </td>
            </tr>
            
							<td><p4>Option-4:</p4></td>
            	<td>
                	<input type="text" name="op4" style="width:600px; height:80px;" id="textbox"  required/>
                </td>
            </tr>
            
							<td><p4>Answer:</p4></td>
            	<td>
                	<input type="text" name="ans" style="width:600px; height:80px;" id="textbox"  required/>
                </td>
            </tr>
            
			
            <tr>
                <td colspan="2">
				<input type="submit" name="sbt" style="margin-left:110px;" value="Add" id="button-in"  /><br>
                	
               <a href="addques.php"><button type="button">AddMoreQues</a></button>
                </td>
            </tr>
        </table>

   </div>
    </form>




</body>
</html>