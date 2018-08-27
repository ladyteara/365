<!DOCTYPE html>
<!--
Programmer: Tara Walton
Folder: tara1984
Notes:  HW3- Movie, due 10/21/15
		Base HTML and CSS files provided from HW2 solution
URL: 
-->
<html>
	<head>
		<title>Rancid Tomatoes</title>
		<meta charset="utf-8" />
		<link href="movie.css" type="text/css" rel="stylesheet" />
        <link rel ="shortcut icon" type="image/gif" href="rotten.gif" />
	</head>

	<body>
	<?php $movie = $_GET["film"]; 	//pull film name from query in address bar	?> 
		<div id = "banner">
			<img src="banner.png" alt="Rancid Tomatoes" />
		</div>
		<?php
		$info = file("$movie/info.txt", FILE_IGNORE_NEW_LINES); 	//returns the file info as an array
		//var_dump($info);
		$title = rtrim($info[0]);
		$year = rtrim($info[1]);
		$rating = rtrim($info[2]);
		//var_dump($title, $year, $rating)
		?>
		<h1>
		<?php echo "$title ($year)" ?>
		</h1>
	
    <div id ="overallContent">	
	 <div id = "generalOverviewArea"> <!-- introduced div for formatting the general overview area on the right-->
		<div>
			<img src="<?= $movie ?>/overview.png" alt="<? = $film ?>" />
		</div>
		<?php 		//get overview info
		$sidebar = file("$movie/overview.txt", FILE_IGNORE_NEW_LINES); //array where each line is array[i]
		//var_dump($sidebar);
		?> <dl>
		<?php  		//create loop for each term and definition 
		foreach($sidebar as $def){
			$def = explode(":", $def);
			echo "<dt>{$def[0]}</dt><dd>{$def[1]}</dd>";
			}	?> </dl>
	 </div> <!-- end generalOverviewArea -->
      
	 <div id = "leftSection"> <!-- inserted div for formatting-->
		<div id = "rottinBig">
		<?php 		//decide which big icon to use based on $rating
		if (intval($rating) >= 60){
			$fresh = "freshbig.png";
			$freshAlt = "Fresh";
			}
		else{
			$fresh = "rottenbig.png";
			$freshAlt = "Rotten";
		}		?>
			<img src="<?= $fresh ?>"  alt="<?= $freshAlt ?>" />
			<span><?= $rating ?>%</span>
		</div>
		
	  <div class="column"> <!-- inserted div for formatting left column of reviews-->
	<?php			//Display first //2 of reviews
	$review_list = glob("$movie/review*.txt");		
	$count = count($review_list);
	$half =(intval($count/2)+($count%2));
	//var_dump($half);
	
	$i = 0;
	while($i < $half){
		$review = file_get_contents("$review_list[$i]", FILE_IGNORE_NEW_LINES);
		//var_dump($review);
		list($opinion, $icon, $critic, $publication) = explode("\n", $review);
		//var_dump ($opinion, $icon, $critic, $publication);
		?>
		<p>
			<img src="<?= $icon ?>.gif" alt="<?= $icon ?>" />
			<q><?= $opinion ?></q>
		</p>
		<p>
			<img src="critic.gif" alt="Critic" />
			<?= $critic ?><br />
			<?= $publication ?>
		</p> 
	<?php  $i++;	}  ?>
		
	  </div> <!-- end column for leftColumn-->

	  <div class="column"><!-- inserted div for formatting right column of reviews-->
	<?php
	$i = $half;
	while($i < $count){
		$review = file_get_contents("$review_list[$i]", FILE_IGNORE_NEW_LINES);
		list($opinion, $icon, $critic, $publication) = explode("\n", $review);
		?>
		<p>
			<img src="<?= $icon ?>.gif" alt="<?= $icon ?>" />
			<q><?= $opinion ?></q>
		</p>
		<p>
			<img src="critic.gif" alt="Critic" />
			<?= $critic ?><br />
			<?= $publication ?>
		</p> 
	<?php  $i++;	}  ?>
		
	  </div> <!-- end column for rightColumn-->
		 
	</div> <!-- end of leftSection-->

	 <p id = "footer">(1-<?=$count ?>) of <?=$count ?></p>
		
	</div> <!-- end overallContent-->
	
	<div id = "validators">  <!-- You could keep inside the overallContent div -->
		<a href="https://html5.validator.nu/"><img src="w3c-xhtml.png" alt="Valid XHTML" /></a> <br />
		<a href="http://jigsaw.w3.org/css-validator/"><img src="w3c-css.png" alt="Valid CSS" /></a>
	</div>

	</body>
</html>
