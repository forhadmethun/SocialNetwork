<?php
/*
.............................
Including Header ............
.............................
*/

?>


<?php include ("inc/header.inc.php"); ?>
<div class="center">
<?php
//Find Friend Requests
$friendRequests = mysql_query("SELECT * FROM friend_requests WHERE user_to='$user'");
$numrows = mysql_num_rows($friendRequests);
if ($numrows == 0) {
 echo "You have no friend Requests at this time.";
 $user_from = "";
}
else
{
 while ($get_row = mysql_fetch_assoc($friendRequests)) {
  $id = $get_row['id']; 
  $user_to = $get_row['user_to'];
  $user_from = $get_row['user_from'];

        $check_pic = mysql_query("select profile_pic from user where username ='$user_from' ");
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








  
  

  echo '<img src="'.$profile_pic.'"  height="40" width="40" />';
  echo '' . $user_from . ' wants to be friends'.'<br />';



  echo '

  <form action="friend_requests.php" method="POST">';
  echo '<input type="submit" name="acceptrequest'.$user_from.'" value="Accept Request">';
  echo 
  '<input type="submit" name="ignorerequest'.$user_from.'" value="Ignore Request">
  </form>

';

  ?>


<?php
//for showing photos...........................
/*
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
*/



?>










  <?php

  if (isset($_POST['acceptrequest'.$user_from])) {
    echo "Pressed";
  //Get friend array for logged in user
    $get_friend_check = mysql_query("SELECT * FROM user WHERE username='$user'");
    $get_friend_row = mysql_fetch_assoc($get_friend_check);
    $friend_array = $get_friend_row['friend_array'];

    
    $user1 = $get_friend_row['user_id'];


    $friendArray_explode = explode(",",$friend_array);
    $friendArray_count = count($friendArray_explode);

  //Get friend array for person who sent request
    $get_friend_check_friend = mysql_query("SELECT * FROM user WHERE username='$user_from'");
    $get_friend_row_friend = mysql_fetch_assoc($get_friend_check_friend);
    $friend_array_friend = $get_friend_row_friend['friend_array'];
    

    $user2 = $get_friend_row_friend['user_id'];


    $friendArray_explode_friend = explode(",",$friend_array_friend);
    $friendArray_count_friend = count($friendArray_explode_friend);


    //$user1 = mysql_query("select user_id from user ");
    //$user2 = 

    if ($friend_array == "") {
     $friendArray_count = count(NULL);
   }
   if ($friend_array_friend == "") {
     $friendArray_count_friend = count(NULL);
   }
   if ($friendArray_count == NULL) {
     $add_friend_query = mysql_query("UPDATE user SET friend_array=CONCAT(friend_array,'$user_from') WHERE username='$user'");





     //$add_friend_list  = mysql_query("INSERT into friendlist values('','$user1','$user2')");


   }
   if ($friendArray_count_friend == NULL) {
     $add_friend_query = mysql_query("UPDATE user SET friend_array=CONCAT(friend_array,'$user_to') WHERE username='$user_from'");

     //$add_friend_list  = mysql_query("INSERT into friendlist values('','$user1','$user2')");




   }
   if ($friendArray_count >= 1) {
     $add_friend_query = mysql_query("UPDATE user SET friend_array=CONCAT(friend_array,',$user_from') WHERE username='$user'");
   
//$add_friend_list  = mysql_query("INSERT into friendlist values('','$user1','$user2')");

   }
   if ($friendArray_count_friend >= 1) {
     $add_friend_query = mysql_query("UPDATE user SET friend_array=CONCAT(friend_array,',$user_to') WHERE username='$user_from'");
   
//$add_friend_list  = mysql_query("INSERT into friendlist values('','$user1','$user2')");


   }
   $add_friend_list  = mysql_query("INSERT into friendlist values('','$user1','$user2')");
   $delete_request = mysql_query("DELETE FROM friend_requests WHERE user_to='$user_to'&&user_from='$user_from'");
   echo "You are now friends!";
   header("Location: friend_requests.php");

 }



 if (isset($_POST['ignorerequest'.$user_from])) {
  $ignore_request = mysql_query("DELETE FROM friend_requests WHERE user_to='$user_to'&&user_from='$user_from'");
  echo "Request Ignored!";
  header("Location: friend_requests.php");
}
}
}
/*
<form action="friend_requests.php" method="POST">
  <input type="submit" name="acceptrequest<?php echo $user_from; ?>" value="Accept Request">
  <input type="submit" name="ignorerequest<?php echo $user_from; ?>" value="Ignore Request">
</form>
*/
?>

</div>