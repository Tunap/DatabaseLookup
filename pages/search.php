<div id="space-bar">
	<h2>Search</h2>
</div>
<br>
<?php
	if(!isset($index)){ Header("Location: ../index.php"); exit; }

?>
<form action="index.php?site=result" method="POST">
	Alias: <input type="text" name="alias">
	<br><br>
	<input type="submit" class="button" name="search" value="Search">
</form>