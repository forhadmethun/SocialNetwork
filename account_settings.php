

<?php 
include('inc/header.inc.php');
echo '<div class="center">';

if($user)
{

}
else{
	die("You Must Log in");
}

$senddata = @$_POST['senddata'];



///Creating Some Veriables..... 




$old_password = @$_POST['oldpassword'];
$new_password = @$_POST['newpassword'];
$repeat_password = @$_POST['newpassword2'];


if($senddata){
//echo "$oldpassword , $newpassword, $repeat_password";
	$password_query = mysql_query("SELECT * FROM user WHERE username = '$user'");
//echo "$password_query";
//var_dump($password_query);

	while ($row = mysql_fetch_assoc($password_query)) {
	# code...
		$db_password = $row['password'];

		echo "$db_password";

	//check whether old password equas the $db_password
		if(md5($old_password) == ($db_password))
		{
			echo "<br/>Great! your password match!";
		}

		if($repeat_password == $new_password)
		{
		//echo "<br/> New password matches </br>";
			$new_password_md5 = md5($new_password);
			$password_update_query = mysql_query("UPDATE user SET password='$new_password_md5' WHERE username='$user'");
			echo "Success! Your password has been updated!";


		}
		else{
			echo "The old password is incorrect ... ";
		}

	}	

}
$updateinfo = @$_POST['updateinfo'];
$get_info = mysql_query("SELECT first_name, last_name, bio FROM user WHERE username = '$user' ");
$get_row = mysql_fetch_assoc($get_info);
$db_firstname = $get_row['first_name'];
$db_lastname = $get_row['last_name'];
$db_bio = $get_row['bio'];


//echo "********* $db_firstname **************";


if ($updateinfo) 
{
	$firstname = strip_tags(@$_POST['fname']);
	$lastname = strip_tags(@$_POST['lname']);
	$bio = @$_POST['bio'];


	if (strlen($firstname) < 3) {
		echo "Your first name must be 3 more more characters long.";
	}
	else if (strlen($lastname) < 5) {
		echo "Your last name must be 5 more more characters long.";
	}
	else
	{
//Submit the form to the database

		echo "----------->Profile is under ... update<----------";
		$info_submit_query = mysql_query("UPDATE user SET first_name='$firstname', last_name='$lastname', bio='$bio' WHERE username='$user'");
		echo "Your profile info has been updated!";
		header("Location: $user");
	}
}
else{

		//	echo "it is not working$$$$$$$$$$$$$$$$$$$$4";
			//do nothing 
}


$check_pic = mysql_query("select profile_pic from user where username ='$user' ");
$get_pic_row = mysql_fetch_assoc($check_pic);
$profile_pic_db = $get_pic_row['profile_pic'];
if($profile_pic_db == "")
{
$profile_pic = "img/default_pic.jpg";

}
else
{
	$profile_pic = "userdata/profile_pics/".$profile_pic_db;

}
		//profile image upload





if(isset($_FILES['profilepic']))
{
	if(((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&(@$_FILES["profilepic"]["size"] < 1048576))
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXUZ0123456789";
		$rand_dir_name =substr( str_shuffle($chars),0,15 );
		mkdir("userdata/profile_pics/$rand_dir_name");
		if (file_exists("userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
		{
			echo @$_FILES["profilepic"]["name"]." Already exists";
		}
		else
		{
			move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/profile_pics/$rand_dir_name/".$_FILES["profilepic"]["name"]);
            echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
			$profile_pic_name = @$_FILES["profilepic"]["name"];
			$profile_pic_query = mysql_query("UPDATE user SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");
			header("Location: account_settings.php");
		}
	}
	else{
		echo "Invalid file! required: .jpg,.jpeg,.png,gif";
	}
}
else{
	//echo "--- > no profile pic choosen <----";

}
//}

?>













<h1>Fill the Following Instructions...</h1>

<hr/>

<h2>Edit your Account Settings below</h2>
<hr />
<p>UPLOAD YOUR PROFILE PHOTO:</p>



<form action="" method="POST" enctype="multipart/form-data">
	<?php //echo "ttttttttttttttttttttttttttttttttttt $profile_pic   ttttttttttttttttttttttttttttttt";  ?>

	<img src="<?php echo "$profile_pic"; ?>" width="70"  alt="no photo here"/> 
	<!--<img src="img/default_pic.jpg" width="70" alt="no photo uploaded"> -->
	<input type="file" name="profilepic" /><br />
	<input type="submit" name="uploadpic" value="Upload Image">
</form>



<hr />
<form action="account_settings.php" method="post">
	<p>CHANGE YOUR PASSWORD:</p> <br />
	Your Old Password: <input type="text" name="oldpassword" id="oldpassword" size="40"><br />
	Your New Password: <input type="text" name="newpassword" id="newpassword" size="40"><br />
	Repeat Password  : <input type="text" name="newpassword2" id="newpassword2" size="40"><br />
	<input type="submit" name="senddata" id="senddata" value="Update Information">
</form>
<hr />
<form action="account_settings.php" method="post">
	<p>UPDATE YOUR PROFILE INFO:</p> <br />
	First Name: <input type="text" name="fname" id="fname" size="40" value="<?php echo $db_firstname; ?>"><br />
	Last Name: <input type="text" name="lname" id="lname" size="40" value="<?php echo $db_lastname; ?>"><br />
	About You: <textarea name="bio" id="bio" rows="7" cols="40"><?php echo $db_bio; ?></textarea>

	<hr />
	<input type="submit" name="updateinfo" id="updateinfo" value="Update Information">
</form>
<form action="close_account.php" method="post">
	<p>CLOSE ACCOUNT:</p> <br />
	<input type="submit" name="closeaccount" id="closeaccount" value="Close My Account">
</form>
<hr />
<br />
<br />
</div>