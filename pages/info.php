<div id="space-bar">
	<h2>Account Info</h2>
</div>
<br>
<?php
	if(!isset($index)){ Header("Location: ../index.php"); exit; }
	if(!isset($_SESSION['username'])){
		Header("Location: index.php?site=login");
	}
	
	$get = $pdo->prepare("SELECT * FROM users WHERE username = :username");
	$get->bindValue(":username",$_SESSION['username'],PDO::PARAM_STR);
	$get->execute();
	$get = $get->fetchAll();
	
	
	echo '
	<img border="0" src="http://openclipart.org/image/800px/svg_to_png/181856/1376606916.png" alt="Avatar" width=150" height="200">
	<br>
	<b><h2>Username:</b> '.$_SESSION['username'].'</h2>
	<br>
	<b><h2>Email:</b> '.$get[0]['email'].'</h2>
	<br>
	<b><h2>Credits:</b> '.$get[0]['credits'].'</h2>
	<br>
	<b><h2>Skype:</b> '.$get[0]['skype'].'</h2>
	<br>
	
	';
	

?>