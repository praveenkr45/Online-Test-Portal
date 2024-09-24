<?php
session_start();
$u=$_SESSION['user'];

if(!isset($_SESSION['user']))
{
echo '<script> alert("Please Login First");   </script>';
echo '<script>window.location.href="index.php"; </script>';
}

?>
<?php $con =  mysqli_connect('localhost','root','','exam'); 
 $res = mysqli_query ($con, "select * from addques");

?>


	<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<style>
.qlist{
	display:none;
	}
	div#timer
	{
		margin-top:0px;
		
		margin-left:940px;
	}
	div#date
	{
		margin-top:0px;
		
	}
</style>

<body onload="countdown();">
<div class='alert alert-success' id='msg'></div>
<div class='container'>
<div id="timer"> 
       <b> Time Left ::</b> 
		 
        <input id="minutes" type="text" style="width: 26px; 
             border: none; font-size: 16px;  
            font-weight: bold; color: green;" readonly><font size="5"> : 
                        </font> 
        <input id="seconds" type="text" style="width: 30px; 
                        border: none; font-size: 16px; 
                        font-weight: bold; color: green;" readonly> 
						
    </div> 
	<form name="clock">
	<div id="date">
	<b><font size=+2> Date : </font></b>
	<input type="text"  name="d" style="width: 23px; border: none; font-size: 16px;  
            font-weight: bold; color: black;" readonly>/
<input type="text"  name="m1" style="width: 25px; border: none; font-size: 16px;  
            font-weight: bold; color: black;" readonly>/
<input type="text"  name="y" style="width: 46px; border: none; font-size: 16px;  
            font-weight: bold; color: black;" readonly>
</div>
</form>

<?php while($row = mysqli_fetch_assoc($res))  { ?>

	
	<ul class="qlist list-group mt-2" id ='<?php echo $row['Quesno'] ?>' >
		  <li class="list-group-item bg-light">Q<?php echo $row['Quesno']; ?>. <?php echo	$row['Question']; ?></li>
		  <li class="qno list-group-item"><input  type='hidden' class='qno' value='<?php echo $row['Quesno']; ?>'></li>
		  <li class="qno list-group-item"><input  type='hidden' class='username'  value='<?php echo $u; ?>'></li>
		  <li class="list-group-item"><input  type='radio' name='option' class='option' value='1'> <?php echo $row['Option1']; ?></li>
		  <li class="list-group-item"><input type='radio' name='option' class='option' value='2'><?php echo $row['Option2']; ?></li>
		  <li class="list-group-item"><input type='radio' name='option' class='option' value='3'><?php echo $row['Option3']; ?> </li>
		  <li class="list-group-item"><input type='radio' name='option' class='option' value='4'><?php echo $row['Option4']; ?></li>
		  
		  
	</ul>	
 
<?php  
}
?>

<button class='btn btn-success ' id='prev' data-id='0' > << Previous </button>
<button class='btn btn-danger float-right' id='next' data-id='1' > Next >></button>
</div>
<div id='row'>
	
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</div>

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
	
		
	$(".option").on('click',function(){
		var x  = $(this).val();
		var qno  = $('#next').attr('data-id');
		var user =$('.username').val();
	   		
		$.ajax({
			url:'process.php',
			method:'post',
			data:{'myanswer':x,'qno':qno,'user':user},
			beforeSend:function(){
				console.log(x+qno);
			},
			success:function(data)
			{
				$("#msg").html(data);
				$("#msg").hide(2000);
			}
		});
		});
		
</script>



    <script> 
        //set minutes
			
        var mins = 60; 
  
        //calculate the seconds
			
        var secs = mins * 60; 
  
        //countdown function is evoked when page is loaded 
        function countdown() { 
            setTimeout('Decrement()', 60); 
			dt = new Date();
document.clock.d.value=dt.getDate();
document.clock.m1.value=dt.getMonth();
document.clock.y.value=dt.getFullYear();
        } 
  
        //Decrement function decrement the value. 
        function Decrement() { 
            if (document.getElementById) { 
				 minutes = document.getElementById("minutes"); 
                seconds = document.getElementById("seconds"); 
  
                //if less than a minute remaining 
                //Display only seconds value. 
				
                if (seconds < 59) { 
                    seconds.value = secs; 
                } 
  
                //Display both minutes and seconds 
                //getminutes and getseconds is used to 
                //get minutes and seconds 
                else { 
					minutes.value = getminutes(); 
                    seconds.value = getseconds(); 
                } 
                //when less than a minute remaining 
                //colour of the minutes and seconds 
                //changes to red 
                if (mins < 1) { 
                    minutes.style.color = "red"; 
                    seconds.style.color = "red"; 
                } 
                //if seconds becomes zero, 
                //then page alert time up 
                if (mins < 0) { 
                    alert('time up');
				window.location.href="usermenu.php";
				
                    minutes.value = 0; 
                    seconds.value = 0; 
                } 
                //if seconds > 0 then seconds is decremented 
                else { 
                    secs--; 
                    setTimeout('Decrement()', 1000); 
                } 
            } 
        } 
  
        function getminutes() { 
            //minutes is seconds divided by 60, rounded down
				
            mins = Math.floor(secs / 60); 
            return mins; 
        } 
  
        function getseconds() { 
            //take minutes remaining (as seconds) away  
            //from total seconds remaining
				
            return secs - Math.round(mins * 60); 
        } 
    </script> 
