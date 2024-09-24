<?php
session_start();
$u=$_SESSION['user'];

/*if(!isset($_SESSION['user']))
{
echo '<script> alert("Please Login First");   </script>';
echo '<script>window.location.href="index.php"; </script>';
}*/

?>
<?php $con =  mysqli_connect('localhost','root','','exam'); 
 $res = mysqli_query ($con, "select * from addques");

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<style>
.qlist{
	display:none;
}
</style>
<body>
<div class='alert alert-success' id='msg'></div>
<div class='container'>
<?php while($row = mysqli_fetch_assoc($res))  { ?>
	<ul class="qlist list-group mt-2" id ='<?php echo $row['Quesno'] ?>' >
		  <li class="list-group-item bg-light"><?php echo	$row['Question']; ?></li>
		  <li class="qno list-group-item"><input  type='hidden' name="qno"class='qno' value='<?php echo $row['Quesno'] ?>'></li>
		  <li class="list-group-item"><input  type='radio' name='option' class='option' value='1'> <?php echo $row['Option1']; ?></li>
		  <li class="list-group-item"><input type='radio' name='option' class='option' value='2'><?php echo $row['Option2']; ?></li>
		  <li class="list-group-item"><input type='radio' name='option' class='option' value='3'><?php echo $row['Option3']; ?> </li>
		  <li class="list-group-item"><input type='radio' name='option' class='option' value='4'><?php echo $row['Option4']; ?></li>
	</ul>	
 
<?php } ?> 
	<button class='btn btn-success ' id='prev' data-id='0' > << Previous </button>
	<button class='btn btn-danger float-right' name="sbt" id='next' data-id='1'> Next >> </button>
</div>
</body>

<div id='row'>
	
	

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<script>
$("#1").css("display","block");
	$(".btn").on('click',function(){
		var x  = $(this).attr('data-id');
		$(".qlist").css('display','none');
		$("#"+x).css('display','block');
		var next  =parseInt(x)+1;
		var prev  =parseInt(x)-1;
		$("#next").attr('data-id',next);
		$("#prev").attr('data-id',prev);
		//alert (x);
	});
	

</script>

 <?php

 if(isset($_POST['sbt']))
{
extract($_POST);
require("connection.php");
$a=$_POST['option'];
//$u=$_SESSION['user'];
$stm="insert into answer(question_id,answer) values('$qno','$a')";
$stmt=$con->query($stm);
if($stmt)
{
	echo '<script>alert("Inserted successfully");</script>';
}
}
?>