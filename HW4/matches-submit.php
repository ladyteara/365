<!--
Programmer: Tara Walton
Folder: tara1984
Notes:  HW4- NerdLuv, due 10/28/15
		Practice with php and forms
URL: 
-->

<?php include("top.html"); ?>

<?php
$txtfile = file_get_contents("singles.txt");
$singles = explode("\n", $txtfile); //break into arrays on line break

$userName = $_GET["name"]; 			//from matches.php
$user = array();					//empty array

//get user information from file
foreach ($singles as $person) 
{
	$user = explode(",", $person);
	if ($user[0]==$userName)
	{
		break;
	}
}
/*Reference: name=user[0], gender=1, age=2, type=3, OS=4, min=5, max=6*/

//get matches
$matches = $singles;			//create a new array to remove non-matches from
$size = count($matches);
//var_dump($matches); 
for ($i=0; $i<$size; $i++)
{
	$possible = explode(",", $matches[$i]);
	//var_dump($possible);
	if ($possible[1] == $user[1])								//remove same gender. Bias.
		unset($matches[$i]);
	if ($possible[4] != $user[4])								//remove different OS
		unset($matches[$i]);
	if ($possible[2] < $user[5] || $possible[2] > $user[6]) 	//if possible match is outside of user age range
	{
		unset($matches[$i]);
		if ($user[2] < $possible[5] || $user[2] > $possible[6]) //or if user is outside of possible match age range
		{
			unset($matches[$i]);								//remove non-age matches
		}
	}
	$pType = str_split($possible[3]);
	$uType = str_split($user[3]);
	//var_dump($pType);
	$matchCount = 0;
	for ($j=0; $j <count($pType); $j++)							//find at least one personality type letter in common 
	{
		if ($pType[$j] == $uType[$j])
		{$matchCount = $matchCount + 1;}
	}
	if ($matchCount == 0)										//if one is not found, remove from matches
		unset($matches[$i]);	
} ?>

<h1>Matches for <?= $userName ?></h1>
<?php 
$matches = array_values($matches);
//var_dump($matches);
$matchInfo = array();										//display each match
for ($c=0; $c<count($matches); $c++)
{	
	$matchInfo = explode(",", $matches[$c]); 
	//var_dump($matchInfo);
	?>
	<div class="match">
	<p>
	<img src="user.jpg" alt="user icon" />
	<?= $matchInfo[0] ?>
	</p>
	<ul>
		<li><strong>gender:</strong> 	<?= $matchInfo[1] ?></li>
		<li><strong>age:</strong> 		<?= $matchInfo[2] ?></li>
		<li><strong>type:</strong> 		<?= $matchInfo[3] ?></li>
		<li><strong>OS:</strong> 		<?= $matchInfo[4] ?></li>
	</ul>
	</div>
	<?php
}	?>

<?php include("bottom.html"); ?>
