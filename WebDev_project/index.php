<html>
<head>
	<title>Home Page</title>
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
			width: 303.8px;
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
		h1
		{
			font-family:'Germania One',cinzel, Ewert,'Bungee Shade';
			font-size: 50px;
			margin-top: 15px;
		}
		#bottom
		{
			background-color: black;
			padding: 5px;
			color: white;
			font-weight: bold;
			text-align: center;
			bottom: 0;
		}
		#sitecontent1 , #sitecontent2
		{
			margin: 20px 120px;
			padding: 1px;
			background-image: url('Backgrounds/b22.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			font-size: 20px;
			text-align: left;
			border-radius: 20px;
			border-left: 10px solid #154360;
		}
		#sitecontent1 h1 , #sitecontent2 h1
		{
			font-family: Monofett,'Faster One';	
		}
		.circle
		{
			width: 2%;
			margin-left: 40px;
			padding: 5px;
			height: 3%;
			font-weight: bold;
			background-color: #fdfefe;
			border-radius: 50%;
			display: inline-block;
			text-align: center;
		}
		p
		{
			font-size: 25px;
			font-weight: bold;
		}
		b
		{
			font-size: 30px;
			font-variant: small-caps;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="slider.css">
</head>
<body>
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
	<br><br><br><br>
	
	<div><center>
	<div id="outerbox" style="border: 5px solid black; border-radius: 30px;">
		<div id="sliderbox">
			<img src="slider images/1.jpg" width="700px" height="395px">
			<img src="slider images/2.jpg" width="700px" height="395px">
			<img src="slider images/5.jpg" width="700px" height="395px">
		</div>
	</div>
	<center><h1><b style="font-size: 60px;">"Welcome To The World Of Books"</b></h1></center>
	<div id="sitecontent1">
		<center><h1>Now Issue Any Book More Convieniently</h1></center>
		<p>
			<div><span class="circle">1 </span> <b>&nbsp;&nbsp;&nbsp;&nbsp;Choose your course.</b></div><br>
			<div><span class="circle">2</span> <b>&nbsp;&nbsp;&nbsp;&nbsp;Select your book.</b></div><br>
			<div><span class="circle">3</span> <b>&nbsp;&nbsp;&nbsp;&nbsp;Get it Issued!!</b></div><br>
		</p>
	</div>
	<div id="sitecontent2">
		<center><h1><q>Benefits of Online Book Store</q></h1></center>
		<p>
			<div><span class="circle">1 </span> <b>&nbsp;&nbsp;&nbsp;&nbsp;Get any issued at any time at any place.</b></div><br>
			<div><span class="circle">2</span> <b>&nbsp;&nbsp;&nbsp;&nbsp;Time Saviour!!.</b></div><br>
			<div><span class="circle">3</span> <b>&nbsp;&nbsp;&nbsp;&nbsp;User Friendly Design!!</b></div></p><br>
		</p>
	</div>
	<div id="bottom">
		<div id="follow">
			<p>
				<center><span style="font-size: 18px">&copy; All Rights Reserved</span></center>
			</p>
		</div>
	</div>

</body>
</html>