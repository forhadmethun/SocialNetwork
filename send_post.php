<?php 
include('./inc/header.inc.php');
include ('./inc/connect.inc.php');
$post = $_POST['post'];
if($post !="")
{	
	$date_added = date("Y-m_d");
	$added_by  = $username;
	$user_posted_to = $username;

	$sqlCommand = "INSERT INTO post VALUES('','$post','$date_added','$added_by','$user_posted_to')";
	$query = mysql_query($sqlCommand) or die(mysql_errno());


}else{
	echo "You must enter something to post ... ";
}

?>