<?php $con =  mysqli_connect('localhost','root','','exam'); 
 extract($_POST);
// print_r($_POST);

$res = mysqli_query ($con, "insert into answer(question_id,user_id, myanswer) values('$qno','$user','$myanswer')");
echo "Answer Submitted";
echo mysqli_error($con);

?>