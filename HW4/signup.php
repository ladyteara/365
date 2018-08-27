<!--
Programmer: Tara Walton
Folder: tara1984
Notes:  HW4- NerdLuv, due 10/28/15
		Practice with php and forms
URL: 
-->

<?php include("top.html"); ?>

<form action="signup-submit.php" method="post" id="signup">
<br/>
<fieldset>
<legend> New User Signup: </legend>

<strong>Name: </strong>
		<input type="text" name="name" size="16" />
<br/>
<strong>Gender: </strong>
		<input type="radio" name="gender" value="M" />Male
		<input type="radio" name="gender" value="F" checked="checked" />Female
<br/>
<strong>Age: </strong>
		<input type="text" name="age" size="6" maxlength="2"/>
<br/>
<strong>Personality type: </strong>
		<input type="text" name="type" size="6" maxlength="4"/> 
		(<a href="http://www.humanmetrics.com/cgi-win/jtypes2.asp" target="blank">Don't know your type?</a>)
<br/>
<strong>Favorite OS: </strong>
	<select name="OS">
		<option value ="Linux"> Linux </option>
		<option value ="Mac"> Mac OS X </option>
		<option value ="Windows" selected> Windows </option>
	</select>
<br/>
<strong>Seeking Age: </strong>
		<input type="text" name="min" size="6" maxlength="2" placeholder="min" /> to
		<input type="text" name="max" size="6" maxlength="2" placeholder="max"/>
<br/>

<input type="submit" value="Sign Up" />
</fieldset>
</form>
<br/>
<br/>

<?php include("bottom.html"); ?>
