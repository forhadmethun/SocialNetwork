<?php include("inc/header.inc.php"); 


echo '<div class="center">';
if($user){
echo "Hello, ".$user;
echo "<br/>Would you like to logout? <a href=\"logout.php\">logout</a> ";
}
else{
	header("location: index.php");
}
?>
</div>