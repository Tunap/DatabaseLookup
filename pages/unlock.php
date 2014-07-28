<?php
	if(!isset($index)){ Header("Location: ../index.php"); exit; }
	if(!isset($_SESSION['username'])){
		Header("Location: index.php?site=login");
	}
	
	if(isset($_GET['alias'])){
		
		$get = $pdo->prepare("SELECT * FROM users WHERE username = :username");
		$get->bindValue(":username",$_SESSION['username'],PDO::PARAM_STR);
		$get->execute();
		$get = $get->fetchAll();
		$credits = $get[0]['credits'];
		if($credits >= 1){
			$credits--;
			
			$upd = $pdo->prepare("UPDATE users SET credits = :credits WHERE username = :username");
			$upd->bindValue(":username",$_SESSION['username'],PDO::PARAM_STR);
			$upd->bindValue(":credits",$credits,PDO::PARAM_STR);
			$upd->execute();
			
			
			$ins = $pdo->prepare("INSERT INTO unlocked (username,alias) VALUES (:username,:alias)");
			$ins->bindValue(":username",$_SESSION['username'],PDO::PARAM_STR);
			$ins->bindValue(":alias",$_GET['alias'],PDO::PARAM_STR);
			$ins->execute();
			
			Header("Location: index.php?site=result&alias=".$_GET['alias']."");
		}else{
			echo 'You do not have enough credits';
		}
		
	}
	
?>