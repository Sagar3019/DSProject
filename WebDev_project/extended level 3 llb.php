<!DOCTYPE html>
<html>
<head>
	<title>Extended LLB</title>
	<link href="https://fonts.googleapis.com/css?family=Cinzel|Germania+One|Bungee Shade|Ewert|Faster One|Monofett" rel="stylesheet">
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
			padding: 10px;
		}
		div#inner
		{
			display: inline-block;
		}
		div#inner img
		{
			height: 110px;
			float: left;
			margin-top: 30px;
			text-align: left;
			position: relative;
		}
		div#inner h1
		{
			color: white;
			margin-top: 20px;
			font-family: 'Bungee Shade';
			letter-spacing: 2px;
			padding: 15px;
			font-size: 70px;
			display: inline;
		}
		ul#menu
		{
			margin: 0;
			padding: 0;
			list-style: none;
			position: sticky;
			top: 0;
			z-index: 99;
		}
		ul#menu li , ul#ot li
		{
			float: left;
			width: 303.8px;
			height: 50px;
			background-color: white;
			opacity: 1;
			line-height: 50px;
			text-align: center;
			font-size: 20px;
			font-weight: 900;

		}
		ul#ot li
		{
			float: left;
			width: 307px;
			height: 50px;
			background-color: white;
			opacity: 1;
			line-height: 50px;
			text-align: center;
			font-size: 20px;
			font-weight: 900;
			position: relative;
			left: -16%;
		}
		ul#menu li a
		{
			text-decoration: none;
			color: black;
			display: block;
		}
		ul#menu li a:hover
		{
			background-color: #00aa00;
		}
		ul#menu li ul li
		{
			display: none;
		}
		ul#menu li:hover ul li
		{
			display: block;
		}
		div#content
		{
			margin: 100px 60px 50px 360px; 
			border: 10px double black;
			padding: 30px;
			border-radius: 50px;
		}
		.book
		{
			margin: 30px 50px;
			width: 250px;
			border: 2px solid black;
		}
		p
		{	padding: 30px;
			font-size: 25px;
			font-variant: small-caps;
			color: #fcdf77;
			line-height: 45px;
			background-color: #212f3d;
			background-image: url('Backgrounds/b31.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			font-weight: 400;
			border: 2px solid black;
			border-radius: 25px;
		}
		div#content img
		{
			border: 5px solid white;
			outline: 10px solid #273746;
		}
		b
		{
			color: #ffcf;
		}
		input
		{
			width: auto;
			height: 50px;
			font-weight: bolder;
			font-variant: small-caps;
			font-size: 20px;
			color: #fcdf77;
			background-image: url('Backgrounds/b31.jpg');
			border: 4px solid black;
			border-radius: 17px;

		}
		p#inp
		{
			width: 20%;
			padding: 0;
			height: 43px;
			margin: 2px 10px;
			font-weight: bolder;
			font-variant: small-caps;
			font-size: 25px;
			color: #fcdf77;
			background-image: url('Backgrounds/b31.jpg');
			border: 4px solid black;
			border-radius: 17px;	
			display: inline-block;
		}
		strong#pve
		{
			text-align: center;
			font-variant: small-caps;
			font-size: 25px;
			color: #d32f2f;
			padding: 50px;
		}
		strong#nve
		{
			font-variant: small-caps;
			font-size: 25px;
			color: #cc0000;
			padding: 330px; 
		}
	</style>
	<link rel="stylesheet" type="text/css" href="sidenav.css">
</head>
<body>
	<div id="outer">
	<div id="inner">
		<img src="amity_logo.png" alt="Amity Logo">
		<h1>Amity Central Library</h1>
	</div>
	</div>
	<ul id="menu">
		<li><a href="index.php">Home</a></li>
		<li><a href="">Programme</a>
			<ul id="ot">
					<li><a href="extended.php">Btech</a></li>
      				<li><a href="extended.php">BCA</a></li>
      				<li><a href="extended LLB.php">LLB</a></li>
			</ul>
		</li>
		<li><a href="About Us.html">About Us</a></li>
<?php 
		if(count($_COOKIE)==0 || $_COOKIE["login"]=="Null") 
			{ 
				echo('<li><a href="login.php">Login</a></li>'); 
			} 
		else 
		{ 
			$con=new mysqli("localhost","root","");
			$sql="use users";
			if(($con->query($sql))==TRUE)
			{	
			 $sql="select fname from detail where fnum='".$_COOKIE["login"]."'";
			 $qr=$con->query($sql);
			 $res=$qr->fetch_array();
			 echo('<li><a href="profile.php">User : ').$res["fname"].('</a></li>');
			}
		}
		 ?>
		 <?php 
		if(count($_COOKIE)==0 || $_COOKIE["login"]=="Null") 
			{ 
				echo('<li><a href="register.php">Register</a></li>'); 
			} 
		else 
		{ 
			 echo('<li><a href="logout.php">Logout</a></li>');
		
		}
		?>
	</ul>	
	<div id="side">
	<ul>
		<li style="font-weight: bolder;"><a href="">Courses</a></li>
		<li><a href="extended.php">Computer Science Engineering</a></li>
		<li><a href="extended ECE.php">Electrical and Communication Engineering</a></li>
		<li><a href="extended CE.php">Civil Engineering</a></li>
		<li><a href="extended ECE.php">Electrical Engineering</a></li>
		<li><a href="extended ME.php">Mechanical Engineering</a></li>
		<li><a href="extended BME.php">Biomedical Engineering</a></li>
		<li><a href="extended LLB.php">Bachelors of Legislative Law</a></li>
	</ul>
	</div>
	<div id="content">
		<?php
			if(count($_COOKIE)==0 || $_COOKIE["login"]=="Null")
			{
			$title=$_POST["title"];
			$con=new mysqli("localhost","root","");
			$sql="use books";
			$con->query($sql);
			$sql="select Title,Author,Quantity,Img_Path,Description from llb where Title='$title'";
			$qr=$con->query($sql);
			if($qr->num_rows > 0) 
			{
  			  while($res = $qr->fetch_array()) 
  			  {
		    echo('<center><img src="').$res["Img_Path"].('" alt="').$res["Title"].(' by ').$res["Author"].('" width="250px" height="300px"></center><br>
		    <p>
			<b>Book Title :</b> ').$res["Title"].('<br>
			<b>Book Author :</b> ').$res["Author"].('<br>
			<b>Available :</b> ').$res["Quantity"].('<br>
			<b>Book Description :</b> ') .$res["Description"].('</p>');
			}
		   {
				echo('<form action="extended level 3 llb.php" method="POST">
			<center><p id="inp">Issue : </p> <input type="submit" name="title" value="').$_POST["title"].('"></center>
		</form><br><strong id="nve"> Please Login To Issue Books!!</strong>');
			}
			}
		}
			else
			{	
			$title=$_POST["title"];
			$con=new mysqli("localhost","root","");
			$sql="use books";
			$con->query($sql);
			$sql="select Title,Author,Quantity,Img_Path,Description from llb where Title='$title'";
			$qr=$con->query($sql);
			if($qr->num_rows > 0) 
			{
  			  while($res = $qr->fetch_array()) 
  			  {$quant=$res["Quantity"]-1;
  			$sql="update cse set Quantity='$quant' where Title='$title'";
			$con->query($sql);
		    echo('<center><img src="').$res["Img_Path"].('" alt="').$res["Title"].(' by ').$res["Author"].('" width="250px" height="300px"></center><br>
		    <p>
			<b>Book Title :</b> ').$res["Title"].('<br>
			<b>Book Author :</b> ').$res["Author"].('<br>
			<b>Available :</b> ').$quant.('<br>
			<b>Book Description :</b> ') .$res["Description"].('</p>');
			}
			}
				$date=date('Y-m-d');
				$ddt=date('Y-m-d',strtotime($date.' +15 days'));
				$sql="use issue";
				$con->query($sql);
				$sql="insert into issueinfo(issuedto,course,bookname,issuedtill) values('".$_COOKIE["login"]."','cse','".$title."','".$ddt."')";
				$con->query($sql);
				echo "<strong id='pve'>This Book Has Been Issued to ".$_COOKIE["login"]." for 15 day. Please collect from Library</strong>";
		}
	?>
	</div>
</body>
</html>