<div id="space-bar">
	<h2>Results</h2>
</div>
<br>
<?php
	if(!isset($index)){ Header("Location: ../index.php"); exit; }
	if(!isset($_SESSION['username'])){
		Header("Location: index.php?site=login");
	}
	
	
	if(isset($_POST['search']) OR isset($_GET['alias'])){
		if(isset($_POST['search'])){
			$search = $_POST['alias'];
		}else{
			$search = $_GET['alias'];
		}
		$lines = file($filename); //edit in config.php
		$found = false;
		foreach($lines as $line)
		{
		  $var = explode(" ",$line);
                  if(strpos($var[1] . $var[2], $search) !== false) //search in alias
		 {
			$found = true;
			echo '<br>
			Alias: '.$var[1].'<br>
			Email: '.$var[2].'<br>';
			$get = $pdo->prepare("SELECT * FROM unlocked WHERE username = :username AND alias = :alias");
			$get->bindValue(":username",$_SESSION['username'],PDO::PARAM_STR);
			$get->bindValue(":alias",$var[1],PDO::PARAM_STR);
			$get->execute();
			
			if(count($get->fetchAll()) == 0){
				echo'Hash: '.DotPerLen(strlen($var[3])).'<br>
				Cracked: '.DotPerLen(strlen($var[4])).'<br>
				<a class="button" href="index.php?site=unlock&alias='.$var[1].'">UNLOCK</a>';
			}else{
				echo'Hash: '.$var[3].'<br>
				Cracked: '.$var[4].'<br>
				';
			}
			
		  }
		}
		if(!$found)
		{
		  echo 'No match found';
		}
		
		
	}

?>
                            
                            