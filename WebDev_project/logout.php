			<?php
			setcookie("login","Null",time()-3600,'/');
			$con=new mysqli("localhost","root","");
			$sql="use users";
			if(($con->query($sql))==TRUE)
			{	
			  $sql="update detail set logstats=FALSE where fnum='".$_COOKIE["login"]."'";
			  if($con->query($sql)==TRUE)
			  {
			  	redr("index.php");
			  }
			  else
			  {
			  	echo "Error updating table : ".$con->error;
			  }
			}
			else
			{
				echo "Error selecting database : ".$con->error;
			}
			function redr($url)
	 		{
    		header('Location: '.$url);
			}
			 ?>