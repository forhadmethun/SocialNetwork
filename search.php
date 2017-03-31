<?php
include("inc/header.inc.php");

echo '<div class="center">';
if($user)
{

}
else{
	die("");
}



if(isset($_GET['q']))
{
	$username = mysql_real_escape_string($_GET['q']);
	//echo "$username"."...do not try at home";
	if(ctype_alnum($username))
	{
		$check = mysql_query("SELECT username, first_name FROM user where username like '%" . $username . "%'");
		// OR LastName LIKE '%" . $name  ."%'");
		// WHERE username like '".$username."'");
		/*WHERE  FirstName LIKE '%" . $name . "%' OR LastName LIKE '%" . $name  ."%'"*/


		//$row = mysql_fetch_assoc($check);
		echo "<br/><br/>";
		while($row = mysql_fetch_assoc($check))
		{
			$name = $row['username'];


			echo "<a href='profile.php?u=$name'>" .$name."</a>";
			echo "<br/><br/><hr/>";


		}
		if(mysql_num_rows($check) == 0)
		{
			echo "no entry found" ;
		}


		
		/*
		if(mysql_num_rows($check) == 1){
			
			$get = mysql_fetch_assoc($check);//return associative arry 

			$username = $get['username'];

		//echo "$username";
			$firstname = $get['first_name'];

			echo "$username";
		}
		else{
			echo "<h2>User does not Exists!</h2>";
			//echo "<meta http-equiv=\"refresh\" content=\"0;url=http://localhost/SocialNetwork/index.php\">";
			//exit();
		}
		*/

	}
}



?>

</div>