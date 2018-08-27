<!--
Programmer: Tara Walton
Folder: tara1984
Notes:  HW4- NerdLuv, due 10/28/15
		Practice with php and forms
URL: 
-->

<?php include("top.html"); ?>

<form action="matches-submit.php" method="get" id="matches">

<fieldset>
<legend> Returning User: </legend>
<strong>Name: </strong>
		<input type="text" name="name" size="16" />
<br/>
<input type="submit" value="View My Matches" />
</fieldset>
</form>
<br/>
<br/>

<?php include("bottom.html"); ?>
