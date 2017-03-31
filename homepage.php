
<?php include("inc/header.inc.php"); ?>
<div class="center">

 <?php echo '<h1>'.$user .'\'s Hompage: </h1> '?>
 <br/>
 <br/>


	<?php 
//section of profile pic
	//$profile_pic = "";
	//$username = $user;
//end of section of profile pic .. .

	?>

	<?php

		///echo "it shows";
		$getPosts = mysql_query("SELECT* from post  ORDER BY post_id DESC LIMIT 10") or die(mysql_errno());
		//if($getPosts)echo "<h1>yahoo there is posts </h1>";
		//else echo "<h1>The is no posts :(</h1>";
			while($row= mysql_fetch_assoc($getPosts))
			{
				$id = $row['post_id'];
				$body = $row['ptext'];
				$date_added = $row['ptime'];
				$added_by = $row['added_by'];

					$check_pic = mysql_query("select profile_pic from user where username ='$added_by' ");
					$get_pic_row = mysql_fetch_assoc($check_pic);
					$profile_pic_db = $get_pic_row['profile_pic'];
					if($profile_pic_db == "")
					{
						$profile_pic = "img/default_pic.jpg";
						//echo "*************** $profile_pic $$$$$$$$$$$$$$$$$$$$$";
					}
					else
					{
						$profile_pic = "userdata/profile_pics/".$profile_pic_db;
						//divecho "*************** $profile_pic $$$$$$$$$$$$$$$$$$$$$";

					}

				$user_post_to = $row['user_posted_to'];
				//echo "<div class='posted_by'><a href='$added_by</a> - $date_added - </div>&nbsp;&nbsp</div>";


				echo "<div class ='feed'> ";
				echo '<img src="'.$profile_pic.'"  height="40" width="40" />';
				echo " <i>$added_by</i> : $date_added : <br/>           <h1>$body </h1><br/><br/>";
				//echo "<a href='#'>add comment</a>";
				//echo "<a href='#' style='float: right'>Add Comment </a><hr/> ";
				echo "</div>";


			}


	?>




</div>