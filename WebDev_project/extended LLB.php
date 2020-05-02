<!DOCTYPE html>
<html>
<head>
	<title>llb</title>
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
			font-variant: small-caps;
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
			font-size: 23px;
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
			padding: 20px;
			border-radius: 50px;
			text-align: center;
		}
		.book
		{
			margin: 30px 50px;
			width: 230px;
			border: 2px solid black;
			display: inline-block;
		}
		input
		{
			width: 100%;
			overflow-wrap: break-word;  
			text-align: center;
			font-size: 15px;
			font-variant: small-caps;
			color: white;
			background-color: #212f3d;
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
		<li><a href="About Us.php">About Us</a></li>
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
		<li style="font-weight: bolder;"><a href="#">Courses</a></li>
		<li><a href="extended.php">Computer Science Engineering</a></li>
		<li><a href="extended ECE.php">Electrical and Communication Engineering</a></li>
		<li><a href="extended CE.php">Civil Engineering</a></li>
		<li><a href="extended ECE.php">Electrical Engineering</a></li>
		<li><a href="extended ME.php">Mechanical Engineering</a></li>
		<li><a href="extended BME.php">Biomedical Engineering</a></li>
		<li><a href="extended LLB.php">Bachelors of Legislative law</a></li>
	</ul>
	</div>
	<div id="content">
	  	<?php
			$con=new mysqli("localhost","root","");
			$sql="use books";
			$con->query($sql);
			$sql="select Title,Author,Quantity,Img_Path,Description from llb";
			$qr=$con->query($sql);
			if($qr->num_rows > 0) 
			{
  			  while($res = $qr->fetch_array()) 
  			  {
				echo ('<div class="book"> <img src="').$res["Img_Path"].('" alt="').$res["Title"].(' by ').$res["Author"].('" width="230px" height="250px"> <form action="extended Level 2 llb.php" method="POST">  <input type="submit" name="title" value="').$res["Title"].('">  </form> </div>');
			}
		  }	
		?>
	</div>
</body>
</html>
