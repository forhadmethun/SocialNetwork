<?php 
include("inc/connect.inc.php");
global $userid;
session_start();
if(!isset($_SESSION["user_login"])){
    //echo "Log In first";
    $user = "";

}else{

    $user = $_SESSION["user_login"];
    $userid = $_SESSION["user_id"];
    //header("location: home.php");
}

/*
if(!isset($user)){
    echo '<a href="index.php"><img src="img/jogajog.png" alt="" /></a>';
}
else{
    echo '<a href="homepage.php"><img src="img/jogajog.png" alt="" /></a>';
}

*/
?>



<?php 
/* ............... Message Count..............................................*/

    $friendstable = mysql_query("SELECT * from friendlist WHERE user1=$userid or user2=$userid ");
 // $count = mysql_num_rows($friendstable);
  //echo "$count";

 if($friendstable)
 {
  $countt = 0;
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
                  //echo " From:: <a href='msges.php?sendedto=$friendname[user_id]'> $friendname[first_name]</a>";
                  //echo "<br/><hr/> ";
                  $countt++;
                }

              }

  
            }
    //echo "$count";

}
//echo "$count";

}



/*...........................................End of Message Count....................................................*/
?>













<!Doctype html>
<head>
    <title>
        jogajogbd
    </title>
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/main.js"></script>
    



    <meta charset="utf-8">
</head>
<body>
    <div class="headerMenu">
        <div id="wrapper">
            <div class="logo">
    
    <?php
        if($user =="")
        {
            $test = "index.php";
        }
        else{
            $test = "homepage.php";
        }

    ?>
    <?php echo ' <a href="'.$test.'"><img src="img/jogajog.png" alt="" /></a> '?>
            </div>
            <div class="search_box">
                <form action="search.php" method="GET" id="search">
                    <input type="text" name="q" size="70" placeholder="Search ...">
                </form>                
            </div>            
            <div id="menu"> 
                <?php
                  ?>     
                <?php 
                if(!$user){


                echo '<a href="#">SIgn Up</a>';
                 }
                else{
                    $count = mysql_query("SELECT * from friend_requests where user_to ='$user' ")    ;
    
    //echo '<form action="msges.php?name='.$username.'&sendedto='.$userid.'" method="post">';
        

                echo '<a href="msges.php?name='.$user.'&sendedto='.$userid.'"><img src="img/msg.png" style="background-color:rgb(34,177,76);   alt="" width ="20px" height="20px"/>'.$countt.'</img></a> ';
                echo '<a href="profile.php?u='.$user.'"><img src="img/group.png" style="background-color:rgb(34,177,76);   alt="" width ="20px" height="20px"/>'.'0'.'</img></a> ';
    

                    echo '<a href="friend_requests.php"><img src="img/friend.png" style="background-color:rgb(34,177,76);   alt="" width ="20px" height="20px"/>'.mysql_num_rows($count).'</img></a> ';
                    //echo '<div class="imageContainer">SSS</div>';
                    echo '<a href="'.$user.'">' .$user . '</a>' ;
                    echo '<a href="account_settings.php">Settings</a>';
                    echo '<a href="homepage.php">HOme</a>';
                    echo '<a href="home.php">SIgn Out</a>';
                }
                ?>
                 
                
            </div>
            
        </div>
    </div>
