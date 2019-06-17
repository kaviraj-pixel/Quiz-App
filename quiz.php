<?php
$connect = mysqli_connect('localhost', 'root', '', 'consensus') or die('Error connecting to MySQL server.');
if(isset($_POST['fname'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$qualification=$_POST['qualify'];
$phone=$_POST['phone'];
$organization=$_POST['org'];
$sql="INSERT INTO `users`(`fname`, `lname`, `qualification`, `phone`, `organization`) VALUES ('$fname', '$lname', '$qualification', '$phone', '$organization')";
$result=mysqli_query($connect,$sql);
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="quiz-style.css"/>
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


</style>
     

  
</head>
<body>
  <?php
$tablename=$_SERVER['QUERY_STRING'];
if($tablename=="data"){$name="DATASTRUCTURES IN C ";}
if($tablename=="python"){$name="PYTHON";}
if($tablename=="c"){$name=" C ";}
if($tablename=="java"){$name="JAVA ";}
  ?>
  <h1 class="top"><strong><?= $name ?></strong></h1>
<form  action="result.php" method='post'   style="clear:left;">
<?php

session_start();
$connect = mysqli_connect('localhost', 'root', '', 'consensus') or die('Error connecting to MySQL server.');
 $F=0;
 $c=0;
 $q=1;
 $k=1;
 $answer=array();
 $_SESSION['tablename']=$tablename;
$result=mysqli_query($connect,"SELECT * FROM $tablename order by RAND() LIMIT 10 ") or die(mysqli_error());
  while ($row = mysqli_fetch_array($result) )
   {
    $sno[$F] = $row['sno'];
    $question = $row['question'];
    $option_a = $row['option a'];
    $option_b =$row['option b'];
    $option_c = $row['option c'];
    $option_d = $row['option d'];
    $answer[$F] = $row['answer'];
    $flag = $row['flag'];
    $ques=array($row['1'],$row['2'],$row['3'],$row['4'],$row['5'],$row['6'],$row['7'],$row['8'],$row['9'],$row['10'],$row['11'],$row['12'],$row['13'],$row['14'],$row['15'],$row['16'],$row['17'],$row['18'],$row['19'],$row['20'],$row['21'],$row['22'],$row['23']);
    ?>

<p ><h2 class="ques"><b>Question <?php echo $q?>:</b> <?php echo $question;?></h2>
<?php
 $q++;
 if($flag==1){
 ?>
 <div class="ques-box">
 <h3>
 <?php

  for($i=0;$i<23;$i++)
    {
      
      if(is_numeric($ques[$i])){break;}
      
      else{
        
        echo "<li>".$ques[$i]."</li>";
      }
       
    }
 
 ?>
</h3>
</div>
 <?php
 
  }
  
 
 ?>

 </p>


<div class="ans-box">
<p style="font: 20px Georgia, Serif;margin-bottom: 0;margin-top: 3px;margin-top: 3px"><h4 style="font: 20px Georgia, Serif;margin-bottom: 0;margin-top: 3px;"><u>Answers:</u></h4></p> 
<p id="ans"><input type = "radio" name = "ans<?php echo $F?>" value = 'a' id="<?php echo $k?>" />a.<label for="<?php echo $k?>"><?php echo $option_a; ?></label></p><?php $k++; ?>
<p id="ans"> <input type = "radio" name = "ans<?php echo $F?>" value = 'b' id="<?php echo $k?>"/>b.<label for="<?php echo $k?>"><?php echo $option_b; ?></label></p><?php $k++; ?>
<p id="ans"> <input type = "radio" name = "ans<?php echo $F?>" value = 'c' id="<?php echo $k?>"/>c.<label for="<?php echo $k?>"><?php echo $option_c; ?></label></p><?php $k++; ?>
<p id="ans"> <input type = "radio" name = "ans<?php echo $F?>" value = 'd' id="<?php echo $k?>"/>d.<label for="<?php echo $k?>"><?php echo $option_d; ?></label></p><?php $k++; ?>
</div>
<?php
$F++;
}
?>
<div class="submit">
<input type="submit" name="submit" value="Done Quiz">
</div>
<?php

  $_SESSION['total']=$answer;
  $_SESSION['ques']=$sno;
?>
</form>
</body>
</html>
