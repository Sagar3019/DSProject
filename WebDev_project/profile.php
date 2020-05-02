<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<link href="https://fonts.googleapis.com/css?family=Cinzel|Germania+One|Bungee Shade|Ewert|Faster One|Monofett|Josefin+Sans|Kaushan+Script" rel="stylesheet">
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
			width: 302px;
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
		div#content_outer
		{
			margin: 100px 120px ;
			padding: 10px 40px;
			border: 4px solid black;
			border-radius: 40px;
			background-color: white;
			opacity: .7;
		}
		div#content_outer h1
		{
			text-underline-position: under;
			font-variant: small-caps;
			font-size: 50px; 
		}
		div#content_inner
		{
			margin: 0;
			padding: 1px 0px;
			font-size: 20px;
			font-family: monospace;
		}
		b
		{
			font-variant: small-caps;
			font-size: 25px;
			font-weight: bolder;
			font-family: 'Times New Roman';
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
		if(count($_COOKIE)==0) 
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
		if(count($_COOKIE)==0) 
			{ 
				echo('<li><a href="register.php">Register</a></li>'); 
			} 
		else 
		{ 
			 echo('<li><a href="logout.php">Logout</a></li>');
		
		}
		?>
	</ul>
	<div id="content_outer">
		<h1><u>User Profile</u></h1>
		<div  id="content_inner">
			<?php
			$con=new mysqli("localhost","root","");
			$sql="use users";
			$con->query($sql);
			$sql="select fname,lname,email,enrn,fnum from detail where fnum='".$_COOKIE["login"]."'";
			$qr=$con->query($sql);
			$res=$qr->fetch_array();
			echo ('<p>
				<b>Username : </b> ').$res["fname"].' '.$res["lname"]
				.('<br><br>
				<b>Enrollment No : </b> ').$res["enrn"]
				.('<br><br>
				<b>Form No : </b> ').$res["fnum"]
				.('<br><br>
				<b>Email id :</b> ').$res["email"]
			.('</p>');
		?>
		</div>
	</div>