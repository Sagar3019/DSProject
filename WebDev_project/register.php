<?php
  $GLOBALS['fnameerr']=0;
  $GLOBALS['lnameerr']=0;
  $GLOBALS['emailerr']=0;
  $GLOBALS['enrnerr']=0;
  $GLOBALS['fnumerr']=0;
?>
<html>
<head>
	<title>Register</title>
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
			width: 506.4px;
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
			padding: 25px 45px;
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
	</style>
	<link rel="stylesheet" type="text/css" href="slider.css">
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
	<form action="" method="POST">
		<br><br>
	<div id="regout">
		<center><h1 style="font-size: 35px;">Register Now !</h1></center>
		<div id="regin">
		 <div id="field">
	 		First Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fname" required="required" value="<?php  if($_POST){ echo ($_POST['fname']); } else{ echo (""); } ?>"> <br> <br> <?php if($_POST){$GLOBALS['fnameerr']=chkvld("fname");} ?>
	 		Last Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lname" required="required" value="<?php  if($_POST){ echo ($_POST['lname']); } else{ echo (""); } ?>"><br> <br><?php if($_POST){$GLOBALS['lnameerr']=chkvld("lname");} ?>
	 		Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email" required="required" value="<?php  if($_POST){ echo ($_POST['email']); } else{ echo (""); } ?>"><br> <br><?php if($_POST){$GLOBALS['emailerr']=chkvld("email");} ?>
	 		Enrollment No : &nbsp;&nbsp;&nbsp;<input type="text" name="enrn" required="required" value="<?php  if($_POST){ echo ($_POST['enrn']); } else{ echo (""); } ?>"><br> <br><?php if($_POST){$GLOBALS['enrnerr']=chkvld("enrn");}?>
	 		Form No : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="fnum" required="required" value="<?php  if($_POST){ echo ($_POST['fnum']); } else{ echo (""); } ?>"><br> <br><?php if($_POST){$GLOBALS['fnumerr']=chkvld("fnum");} ?>
	 		Password : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass" required="required" value="<?php  if($_POST){ echo ('*****'); } else{ echo (""); } ?>" ><br> <br>
	 		<center><input type="submit" name="submit" value="Submit"></center>
	 		<br>
	 		<center><a href="login.php" style="font-size: 23px;">Already Registered ? Sign in</a></center>
	 	 </div>
		</div>
	</div>
	<?php
	  function dataFt(&$data)
      {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
      }
	function chkvld($str)
	{	
		$fname=$_POST["fname"];
				dataFt($fname);
		$lname=$_POST["lname"];
				dataFt($lname);
		$email=$_POST["email"];
				dataFt($email);
		$enrn=$_POST["enrn"];
				dataFt($enrn);
		$fnum=$_POST["fnum"];
				dataFt($fnum);
		if(!preg_match("/^[a-zA-Z]{1,20}$/", $fname) && $str=="fname")
		{
			echo "Error : First Name can only have letters!","<br>";
			return 1;

		}
			if(!preg_match("/^[a-zA-Z]{1,20}$/", $lname) && $str=="lname")
		{
			echo "Error : Last Name can only have letters!","<br>";
			return 1;
		}
			if(!preg_match("/^[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/", $email) && $str=="email")
		{
			echo "Error : Enter enter valid email address!","<br>";
			return 1;
		}
		if(!preg_match("/^[a-zA-Z]{1}[0-9]{11}$/", $enrn) && $str=="enrn")
		{
			echo "Error : Enter a valid Enrollment number!","<br>";
			return 1;
		}
		if(!preg_match("/^[0-9]{7}$/", $fnum) && $str=="fnum")
		{
			echo "Error : Enter A valid form number!","<br>";
			return 1;
		}
		return 0;
	}	
		if(($fnameerr==0) && ($lnameerr==0) &&($emailerr==0) && ($enrnerr==0) && ($fnumerr==0) && ($_POST)) 
 		{
 			dataEntry();
 		}
 		function dataEntry()
 		{
			$fname=$_POST["fname"];
			$lname=$_POST["lname"];
			$email=$_POST["email"];
			$enrn=$_POST["enrn"];
			$fnum=$_POST["fnum"];
			$pass=$_POST["pass"];
			$con=new mysqli("localhost","root","");
			$sql="create database if not exists users";
			if(($con->query($sql))==TRUE)
			{
			$sql="use users";
			if(($con->query($sql))==TRUE)
			{	
			 $sql="create table if not exists detail(fname varchar(30),lname varchar(30),email varchar(30),enrn varchar(15),fnum int(8),pass varchar(30),logstat BOOLEAN default FALSE)";
			 if(($con->query($sql))==TRUE)
			 {
			   $sql="insert into detail(fname,lname,email,enrn,fnum,pass) values('$fname','$lname','$email','$enrn','$fnum','$pass')";
				if(($con->query($sql))==TRUE)
				{
					redr("regdone.html");
				}
				else
				{
					echo "Error Inserting Values : ".$con->error;
				}
			 }
			 else
			 {
			 	echo "Error creating table : ".$con->error;
			 }
			}
			else
			{
				echo "Error selecting database : ".$con->error;
			}
		 }
		else
			{
		 	  echo "Error Creating database : ".$con->error;
		 	}
		}
		function redr($url)
	 	{
    		header('Location: '.$url);
		}
	?>
	</form>
</body>
</html>