<?php include("inc/header.inc.php"); ?>
<?php if(isset($_GET['sendedto']))
{
  $sendto=mysql_real_escape_string($_GET['sendedto']);
}  else{
  $sendto=NULL;
}

?>


<div class="profileWrap">
<h2>Send message to: 
    <?php if(isset($sendto))
    {
     $check = mysql_query("SELECT first_name FROM user WHERE user_id= $sendto");
     if(mysql_num_rows($check) == 1){
      $get = mysql_fetch_array($check);
      $firstname = $get['first_name'];
    }
    echo '<b><i>'.$firstname.'</i></b>';
  } ?> 
</h2>

<div class="newmsglist">

<!--
************************* New Message Section **********************************************
-->


<h2> New  Messages </h2>
	<?php

	$friendstable = mysql_query("SELECT * from friendlist WHERE user1=$userid or user2=$userid ");
 // $count = mysql_num_rows($friendstable);
  //echo "$count";

 if($friendstable)
 {
  $count = 0;
  while( $row= mysql_fetch_array($friendstable))
   {       if($row['user1']==$userid){
                $friend=$row['user2'];
            }
            else {
              $friend=$row['user1'];
            }
            $friendnametable= mysql_query("SELECT user_id,first_name
              from user WHERE user_id=$friend LIMIT 1");
            $friendname= mysql_fetch_array($friendnametable);

            $cidt=mysql_query("select * from conversation
             where ( user1= $friend AND user2= $userid)
             OR ( user2= $friend AND user1= $userid)") or die(mysql_errno());
            $cidarray=mysql_fetch_array($cidt);
            $cid=$cidarray['c_id'];

            $newmsgestable=mysql_query("SELECT * from message WHERE c_id=$cid AND sender=$friend ");

            //$count = mysql_num_rows($newmsgestable);
            //echo "$count";
            
            if( $newmsgestable)
            {
              while( $nmsg= mysql_fetch_array( $newmsgestable))
              {
                if($nmsg['status']==1){
                  echo " From:: <a href='msges.php?sendedto=$friendname[user_id]'> $friendname[first_name]</a>";
                  echo "<br/><hr/> ";
                  $count++;
                }

              }

  
            }
    //echo "$count";

}
echo "$count";
}

?>
</div>


<div class="msgForm">
  <?php $output="insertion.php?sendedto=";$output.= $sendto ; ?>
  <form action= <?php echo $output ; ?>  method="post">
   <textarea id="msg" name="msg" rows="4" cols="50"></textarea>
   <input type="submit" name="send" value="Send" onclick="myFunction()">

 </form>

</div>

<div class="friendlist">
	<?php

	$friendstable = mysql_query("SELECT * from friendlist WHERE user1=$userid or user2=$userid LIMIT 10");

 if($friendstable)
 {
  while( $row= mysql_fetch_array($friendstable))
   {       if($row['user1']==$userid){
    $friend=$row['user2'];
    $friendname= mysql_fetch_array(mysql_query("SELECT user_id,first_name from user WHERE user_id=$friend LIMIT 1"));
  }
  else {
    $friend=$row['user1'];
    $friendname= mysql_fetch_array(mysql_query("SELECT user_id,first_name,username  from user WHERE user_id=$friend LIMIT 1"));
  }
  echo "<a href=\"msges.php?sendedto=$friendname[user_id]\">$friendname[first_name]</a>";
  echo "<br/><hr/> ";



}
}

?>
</div>
<div class="conversationhistory">
	<?php
	$i=0;
	//determine which conversation am i a part of with a particular person
 $cidt=mysql_query("select * from conversation
   where ( user1= $sendto AND user2= $userid)
   OR ( user2= $sendto AND user1= $userid)") or die(mysql_errno());
 $cidarray=mysql_fetch_array($cidt);
 $cid=$cidarray['c_id'];

        //select the messages that belong to the conversation
 $cidt=mysql_query("select * from message
   where c_id= $cid order by pkey DESC ") or die(mysql_errno());

 while($row=mysql_fetch_array($cidt))
 {                             
  $i++;
  $body = $row['mtext'];
  $date_added = $row['mtime'];
  $added_by = $row['sender'];
  $status= $row['status'];
  $pk= $row['pkey'];
  $namear=mysql_query("select first_name from user
   where user_id = $added_by ") or die(mysql_errno());
  $nam= mysql_fetch_array($namear);
  $name = $nam['first_name'];
  if($status & $added_by!=$userid & $i<=8){ 
   echo "New::::: $name :$body   ................
   $date_added <br/> <br/> <hr/> ";

   $sqlCommand = "UPDATE message SET status=0 where
   pkey=$pk";
   $query = mysql_query($sqlCommand) or die(mysql_errno());
 }
 else { if( $i<=8){
  echo "$name :$body   ................        $date_added <br/> <br/> <hr/> ";
}
}
}

?>

</div>


</div>
