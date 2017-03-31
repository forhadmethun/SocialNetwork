<?php include("inc/header.inc.php"); ?>
<?php 
//global $username,$firstname;
if(isset($_GET['u']))
{
	$username = mysql_real_escape_string($_GET['u']);
	//echo "$username"."...do not try at home";
	if(ctype_alnum($username))
	{
		$check = mysql_query("SELECT username, first_name FROM user WHERE username = '$username'");
		if(mysql_num_rows($check) == 1){
			$get = mysql_fetch_assoc($check);//return associative arry 
			$username = $get['username'];
		//echo "$username";
			$firstname = $get['first_name'];
		}
		else{
			echo "<h2>User does not Exists!</h2>";
			echo "<meta http-equiv=\"refresh\" content=\"0;url=http://localhost/SocialNetwork/index.php\">";
			exit();
		}
	}
}

	$post = @$_POST['post'];
	if($post !="")
	{	
		$date_added = date("Y-m_d");
		$added_by  = $user;
		$user_posted_to = $username;
		$sqlCommand = "INSERT INTO post VALUES('','$post','$date_added','$added_by','$user_posted_to')";
		$query = mysql_query($sqlCommand) or die(mysql_errno());


	}


//section of profile pic


	$check_pic = mysql_query("select profile_pic from user where username ='$username' ");
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
if(isset($username)){

}


?>


<?php
/*
-----------------------------------------------------------------------------------------------------------
..........Profile Post Section ............
-----------------------------------------------------------------------------------------------------------*/


?>
<div class="profileWrap">
	<h2>Porfile name: <?php echo "$username"; ?></h2>
	
	<div class="postForm">
		<form action="<?php echo "$username"; ?>" method="post">
			<textarea id="post" name="post" rows="4" cols="58"></textarea>
			<input type="submit" name="send" value="Post" style="float:right;position:absolute;">
		</form>
	</div>
	<div class="profilePosts">
		<?php
		//echo "it shows";
		$getPosts = mysql_query("SELECT* from post WHERE user_posted_to='$username' ORDER BY post_id DESC LIMIT 10") or die(mysql_errno());
		if($getPosts)echo""; //"<h1>yahoo there is posts </h1>";
		else echo "<h1>The is no posts :(</h1>";
			while($row= mysql_fetch_assoc($getPosts))
			{
				$id = $row['post_id'];
				$body = $row['ptext'];
				$date_added = $row['ptime'];
				$added_by = $row['added_by'];
				$user_post_to = $row['user_posted_to'];
				echo '<img src="'.$profile_pic.'"  height="40" width="40" />';
				echo " $added_by : $date_added POST: $body <br/><br/><hr/> ";
			}
			?>
		</div>
	<?php 
/*

-----------------------------------------------------------------------------------------------------------
..........Shows Profile Picture....
-----------------------------------------------------------------------------------------------------------
*/


?>
		<img src="<?php echo $profile_pic; ?>"  height="250" width="250" alt="<?php echo $username;?>'s Profile" title ="<?php echo '$username'; ?>'s Profile" />
		<br/>


		<?php 
/*
-----------------------------------------------------------------------------------------------------------
.............Add Friend Option ... ..
-----------------------------------------------------------------------------------------------------------
*/


		if(isset($_POST['addfriend']))
		{
			$friend_request = $_POST['addfriend'];
			$user_to = $user ;
			$user_from = $username; 
			if($user_to == $username)
			{
				echo "You can't send a friend request.";
			}
			else
			{
				$create_request = mysql_query("insert into friend_requests values('','$user_to','$user_from')");
				echo "Friend Request has been Sent ";

			}

			//$user_from = $
		}
		else
		{
				//do nothing
				//echo "-----------test work --------------";
				//echo "";
		}
		?>

		
		<?php 
 // *************************************message*********************************************
		//$userid = 13;
		//echo '<form action="msges.php?name='.$username.'&sendedto='.$userid.'" method="post">';
		?>


		<?php 
		$friend = mysql_query("select friend_array from user where username = '$user'");
		$friend_result = mysql_fetch_assoc($friend);
		$friend_list = $friend_result['friend_array'];

		$friendArray_explode_friend = explode(",",$friend_list);



		//echo "$friend_list<br/>";




		echo '<form action="'.$username.'" method="post">';
		if(($user == $username))// || (strpos($friend_list, '$username')!==false))
		{


		}
		elseif (strpos($friend_list, $username)!==false) {

			echo "$username is your Friend<br/>";
			# code...
		}
		

		else echo '<input type="submit" name="addfriend" value="Add as a Friend">';

		echo '</form> ';


			echo '<form action="msges.php?name='.$username.'&sendedto='.$userid.'" method="post">';
		?>

			
		<input type="submit" name="sendmessage" value="Send Message">
		</form>
		<div class="textHeader"><?php echo "$username"; ?>'s profile</div>
		<div class="profileLeftSideContent">
			<?php 
			//echo "it not working ... ";
			$about_query = mysql_query("SELECT bio FROM user WHERE username = '$username'");
			$get_result = mysql_fetch_assoc($about_query);
			$about_the_user = $get_result['bio'];
			echo "<b><i> $about_the_user </i></b>";
			?>



		<?php
/*
-------------------------------------------------------------------------------
............Messaging Section .....
-------------------------------------------------------------------------------
*/
		if(isset($_POST['sendmessage']))
		{
			header("Location: send_msg.php?u=$username");
		}
		?>
		<!--
		<form action="<?php echo $username; ?>" method="post">
		<input type="submit" name="addfriend" value="Add as a Friend">
		<input type="submit" name="sendmessage" value="Send Message">
		</form>
		<div class="textHeader"><?php echo "$username"; ?>'s profile</div>
		<div class="profileLeftSideContent">
			<?php 
			//echo "it not working ... ";
			$about_query = mysql_query("SELECT bio FROM user WHERE username = '$username'");
			$get_result = mysql_fetch_assoc($about_query);
			$about_the_user = $get_result['bio'];
			echo "<b><i> $about_the_user </i></b>";
			?>
	-->

		</div>
<?php 

/*
-----------------------------------------------------------------------------------------------------------
.........Friend List Sect-ion.......
-----------------------------------------------------------------------------------------------------------
*/
?>
		<div class="textHeader"><?php echo "$user"; ?>'s Friends</div>
		<div class="profileLeftSideContent">

		
			<?php
				//echo "friend's photos...<br/>";
			//print_r($friendArray_explode_friend);

			foreach ($friendArray_explode_friend as $key ) {
				# code...
				//echo "$key<br/>";


			$check_pic = mysql_query("select profile_pic from user where username ='$key' ");
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

			echo '<a href = "'.$key.'" title="'.$key.'" style="text-decoration:none"><img src="'.$profile_pic.'" height = "50" width ="40" alt=""> </a>&nbsp;&nbsp;';
			/*
			alt="<?php echo $username;?>'s Profile" title ="<?php echo '$username'; ?>'s Profile" />
			*/
			}



			?>
			<!--
			<img src="#" height = "50" width ="40" alt="">&nbsp;&nbsp;
			<img src="#" height = "50" width ="40" alt="">&nbsp;&nbsp;
			<img src="#" height = "50" width ="40" alt="">&nbsp;&nbsp;
			<img src="#" height = "50" width ="40" alt="">&nbsp;&nbsp;
			<img src="#" height = "50" width ="40" alt="">&nbsp;&nbsp;
			<img src="#" height = "50" width ="40" alt="">&nbsp;&nbsp;
			<img src="#" height = "50" width ="40" alt="">&nbsp;&nbsp;
			<img src="#" height = "50" width ="40" alt="">&nbsp;&nbsp;
			-->
		</div>

	</div>