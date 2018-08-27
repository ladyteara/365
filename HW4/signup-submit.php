<!--
Programmer: Tara Walton
Folder: tara1984
Notes:  HW4- NerdLuv, due 10/28/15
		Practice with php and forms
URL: 
-->

<?php include("top.html"); ?>

<?php
$name = $_POST["name"]; 
$user = $name;
foreach($_POST as $key => $value)
{	
	if ($key != "name")
	{
		$user = $user.",".$value;
	}
}
//var_dump($user);
file_put_contents("singles.txt", "\n".$user, FILE_APPEND);
?>

<h1>Thank you!</h1>

Welcome to NerdLuv, <?= $name ?>!
<br/><br/>
Now <a href="matches.php">log in to see your matches</a>!
<br/><br/>

<?php include("bottom.html"); ?>
