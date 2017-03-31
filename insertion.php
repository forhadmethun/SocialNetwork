<?php include("inc/header.inc.php"); ?>
<?php
if(isset($_POST['msg'])){
  $newmsg= $_POST['msg'];
  $sendedto=$_GET['sendedto'] ;
  //if conversation exist
  $cidt=mysql_query("select * from conversation
  where ( user1= $sendedto AND user2= $userid)
   OR ( user2= $sendedto AND user1= $userid)") or die(mysql_errno());

   $cidarray=mysql_fetch_array($cidt);
    //if conversation doesnt exist
   if(!$cidarray){
   $sqlCommand = "INSERT INTO conversation VALUES('',$userid,'$sendedto')";
   $query = mysql_query($sqlCommand) ;
    $cidt=mysql_query("select c_id from conversation
  where ( user1= $sendedto AND user2= $userid)
   OR ( user2= $sendedto AND user1= $userid)");
   $cidarray=mysql_fetch_array($cidt);
  }

   $cid=$cidarray['c_id'];

   $date_added = date("Y-m_d");

	$sqlCommand = "INSERT INTO message VALUES('',$cid,'$date_added',$userid, '$newmsg',1)";
	$query = mysql_query($sqlCommand) or die(mysql_errno());
	header("location: msges.php?sendedto=$sendedto");
	exit;

}

?>
