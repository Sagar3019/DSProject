<?php
  setcookie("login","Null",time()+3600,'/');
  $GLOBALS['fnumerr']=0;
  function stck($cookie_value)
  {	
  	setcookie("login",$cookie_value,time()+3600,'/');
  }
?>
<html>
<head>
	<title>Login</title>
	<style>
		body
		{
			margin: 0px;
			background-color: #f1c40f;
		}
		div#outer
		{
			text-align: center;
			background-color: #154360;
			padding: 20px;
		}
		div#inner
		{
			display: inline-block;
		}
		div#inner img
		{
			height: 100px;
			float: left;
			text-align: left;
		}
		div#inner h1
		{
			color: white;
			letter-spacing: 2px;
			padding: 15px;
			font-size: 65px;
			display: inline;
		}
		div#regout
		{	
			background-color: white;
			padding-top: 10px;
			padding-bottom: 30px;
			margin: 40px 300px;
			opacity: .8;
			border-radius: 30px;
			font-variant: small-caps;
		}
		div#regin
		{ 	
			border: 3px solid black;
			margin: 10px 180px;
			padding: 35px 55px;
			border-radius: 40px;
		}
		div#field
		{
			text-align: left;
			font-size: 22px;
			font-weight: bolder;
		}
		div#field input
		{
			background-color: #ac12;
			border: 2px groove yellow;
			color: black; 
			font-weight: bolder;
			font-size: 18px;
			opacity: 1;
			border-radius: 7px;
		}
		ul
		{
			margin: 0;
			padding: 0;
			list-style: none;
			font-variant: small-caps;
			position: sticky;
			top: 0;
			z-index: 99;
		}
		ul li
		{
			float: left;
			width: 512px;
			height: 50px;
			background-color: white;
			opacity: 1;
			line-height: 50px;
			text-align: center;
			font-size: 23px;
			font-weight: 900;

		}
		ul li a
		{
			text-decoration: none;
			color: black;
			display: block;
		}
		ul li a:hover
		{
			background-color: #00aa00;
		}
		ul li ul li
		{
			display: none;
		}
		ul li:hover ul li
		{
			display: block;
		}
		div#inp
		{	
			text-align: center;
			color: red;
			margin: auto;
			padding: 15px 25px;
			font-size: 20px;
		}
	</style>
</head>
<body alink="red" vlink="red" link="red">	
	<div id="outer">
	<div id="inner">
		<img src="amity_logo.png" alt="Amity Logo">
		<h1>Amity Central Library</h1>
	</div>
	</div>
		<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="">Programme</a>
			<ul id="ot">
					<li><a href="extended.php">Btech</a></li>
      				<li><a href="extended.php">BCA</a></li>
      				<li><a href="extended LLB.php">LLB</a></li>
			</ul>
		</li>
		<li><a href="About Us.php">About Us</a></li>
	</ul>
	<form method="POST">
		<br><br>
	<div id="regout">
		<center><h1 style="font-size: 40px;">Login</h1></center>
		<div id="regin">
		 <div id="field">
	 		Form No &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="fnum" required="required" value="<?php  if($_POST){ echo ($_POST['fnum']); } else{ echo (""); } ?>"> <br> <br> <?php if($_POST){$GLOBALS['fnameerr']=chkvld("fnum");} ?>
	 		Password : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass" required="required"><br> <br>
	 		<center><input type="submit" name="submit" value="Submit"></center>
	 		<br>
	 		<center><a href="register.php" style="font-size: 24px;">Register Now!</a></center>
	 	 </div>
		</div>
	<div id="inp">
	<?php
	  function dataFt(&$data)
      {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
      }
	function chkvld($str)
	{	
		$fnum=$_POST["fnum"];
		dataFt($fnum);
		if(!preg_match("/^[0-9]{7}$/", $fnum) && $str=="fnum")
		{
			echo "Error : Enter A valid form number!","<br>";
			return 1;
		}
		return 0;
	}	
		if(($_POST) && ($fnameerr==0))
 		{
 			dataMatch();
 		}
 		function dataMatch()
 		{
			$fnum=$_POST["fnum"];
			$pass=$_POST["pass"];
			$con=new mysqli("localhost","root","");
			$sql="use users";
			if(($con->query($sql))==TRUE)
			{	
			 $sql="select fnum,pass,logstats from detail where fnum='".$fnum."' and pass='".$pass."'" ;
			 $qr=$con->query($sql);
			 $res=$qr->fetch_array();
			 if($res['fnum']==$fnum && $res['pass']==$pass)
			 {	
			 	if(count($_COOKIE)>0)
			 	{
			 	stck($res['fnum']);
			 	}

			 	$sql="update detail set logstats=TRUE where fnum='".$res['fnum']."'";
			 	$con->query($sql);
			 	redr("index.php");
			 }
			 else
			 {
			 	echo "Error : Wrong Form number or password ! ";
			 }
			}
			else
			{
				echo "Error selecting database : ".$con->error;
			}
		 }
		function redr($url)
	 	{
    		header('Location: '.$url);
		}
	?>
	</div>
	</form>
</div>
</body>
</html>