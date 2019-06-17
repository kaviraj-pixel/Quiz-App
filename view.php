<!DOCTYPE html>
<html>
<head>
	<title>View Answers</title>
	 <style>
      
.top{
  background: #00ECB9;text-align: center;
  padding: 3px;
  font-family: sans-serif;
  font-weight: 100;
  margin-left: -150px;
  font-style: italic;  

}
.ques-box{
  margin-left: 5%;
  border: 10px solid transparent;
  border-image-slice: : 30%;
  padding: 5px;
  border-image: url(border-image1.jpg) 20% round;
  margin-top: 3px;
  margin-bottom: 3px;
  width: 50%;
}
.ans-box{
  margin-left: 11%;
  width: 100%;
}
.submit input[type="submit"]:hover{
  cursor:pointer;
  background:#ffc107;

}
.submit input[type="submit"]{
    
    align:center;
    border: none;
    outline: none;
    height: 40px;
    background: #fb2525;
    color: #fff;
    font-size: 18px;
    border-radius: 10px;
    margin-left: 40%;
}
#ans{
  font: 16px Georgia, Serif;
  margin-top: 0px;
  width: 65%;
}
.ques{margin-top: 3px;margin-bottom: 3px;}
body{
  margin-left: 150px;
}
.ans2{
	font: 20px Georgia, Serif;
	margin-bottom: 0;margin-top: 3px;
	margin-top: 3px;}
a{
	    align:center;
	    
	    height: 40px;
	    background: #fb2525;
	    color: #fff;
	    font-size: 24px;
	    border-radius: 5px;
	    margin-left: 50%;
	    padding:5px;
	    text-decoration: none;
	}
	a:hover{
		cursor:pointer;
  		background:#ffc107;

	}
</style>
     
</head>
<body>
	<?php 
session_start();
$serial=$_SESSION['sno'];
$tablename=$_SESSION['table'];
	?>
	 <h1 class="top"><strong>Answer for <?= $tablename ?></strong></h1>
<?php
$q=1;

$connect = mysqli_connect('localhost', 'root', '', 'consensus') or die('Error connecting to MySQL server.');
for($k=0;$k<10;$k++){
	
$result=mysqli_query($connect,"SELECT * FROM $tablename where sno=$serial[$k]") or die(mysqli_error());
while ($row = mysqli_fetch_array($result) )
   {
    $question = $row['question'];
    $option_a = $row['option a'];
    $option_b =$row['option b'];
    $option_c = $row['option c'];
    $option_d = $row['option d'];
    $answer = $row['answer'];
    $flag = $row['flag'];
    $ques=array($row['1'],$row['2'],$row['3'],$row['4'],$row['5'],$row['6'],$row['7'],$row['8'],$row['9'],$row['10'],$row['11'],$row['12'],$row['13'],$row['14'],$row['15'],$row['16'],$row['17'],$row['18'],$row['19'],$row['20'],$row['21'],$row['22'],$row['23']);
    ?>

<h2 class="ques"><b>Question <?php echo $q?>:</b> <?php echo $question;?></h2>
<?php
 $q++;
 if($flag==1){
 ?>
 <div class="ques-box">
 <h3>
 <?php

  for($i=0;$i<15;$i++)
    {
      
      if(is_numeric($ques[$i])){break;}
      
      else{
        
        echo "<li>".$ques[$i]."</li>";
      }
       
    }
    ?>
    </h3>
</div><?php

}

  ?>
  <ol type="a" id="ans">
  	<li><?php echo $option_a; ?></li>
  	<li><?php echo $option_b; ?></li>
  	<li><?php echo $option_c; ?></li>
  	<li><?php echo $option_d; ?></li>
  </ol>
 <h2>Answer is: <?php echo $answer; ?></h2>
 <?php
 
  }
 }
?>
<a href="homepage_consensus.html" style="margin-left: 45%;">Home</a>
</body>
</html>
