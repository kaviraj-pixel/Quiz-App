<?php
session_start();
$c=0;
$answer=$_SESSION['total'];
  for($i=0;$i<30;$i++){
    $num="ans".$i;
    if(isset($_POST[$num])){
      if($answer[$i]==$_POST[$num]){
        $c++;	
      }
    }
  }
$ques=$_SESSION['ques'];
$_SESSION['sno']=$ques;

$table=$_SESSION['tablename'];
$_SESSION['table']=$table;
?>
<!DOCTYPE html>
<html>
<head>
	<title>result</title>
	<style type="text/css">
	#results {
    font: 44px Georgia, Serif;
    margin-left: 7%;
	}
	.center-box{
		margin-left: 35%;
		margin-top: 10%;
	}
	.res-box{
		margin-left: 35%;
	}
	h2{
		text-decoration-color: blue;
		 font: 29px Georgia, Serif;
		 text-align: center;
		 margin-left: -61%;
	}
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
    margin-left: 43.5%;
}
	</style>
	<script type="text/javascript">
		function backfun()
		{
			if(window.event){window.location.href="info.php";}
				else{ window.location.href="info.php";}
		}	</script>
</head>
<body onbeforeunload="backfun()">
	<div class="center-box">
	<img src="trophy.png" height="100px" width="150px" style="margin-left: 125px;">
    <h1><div id="results">  <?php echo "$c"; ?>/10 correct</h1></div>
  	<div class="res-box">
  	<u><h2>Comments:</h2></u>

    <h2 >
    <?php
    if($c==10)
    	{echo "Awesome";}
    if($c==9)
    	{echo "Awesome";}
    if($c==8)
    	{echo "Good";}
    if($c==7)
    	{echo "Good";}
    if($c==6)
    	{echo "Good";}
    if($c==5)
    	{echo "Nice but Need Improvement";}
    if($c==4)
    	{echo "Need Improvement";}
    if($c==3)
    	{echo "You can do it Learn well";}
    if($c==2)
    	{echo "You can do it Learn well";}
    if($c==1)
		{echo "It's ok Learn well";}
	if($c==0)
		{echo "It's ok Learn well";}
    
    ?>
	</h2>
	</div>
	<a href="homepage_consensus.html" style="margin-left: 45%;">Home</a>

	</div>
	<br>
	<br>
	<div class="submit">
	<form method="post" action="view.php">
		<input type="submit" name="submit" value="View Answer"/>
	</form></div>
</body>
</html>
