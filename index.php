<?php //stay
        error_reporting(0);
	ob_start();
        session_start();
	session_regenerate_id();
	require_once("config.php");
	require_once("functions.php");
	$index = "0x01";	
?>
<html>
	<head>
		<title>IntelHosting - Database Lookup</title>
		<link href="style.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<div id="header">
			<div class="hwap">
				<div id="header-logo">
					<img src="images/header.png" width="250" height="70">
				</div>
				<div id="header-menu">
					<div id="navigation">
						<ul id="menu">
							<li><a href="index.php?site=home">Home</a></li>
							<li><a href="index.php?site=buycredits">Buy Credits</a></li>
							<li><a href="index.php?site=search">Search</a></li>
							<?php
							if(isset($_SESSION['username'])){
								echo '<li><a href="index.php?site=info">Account Info</a></li>';
								echo '<li><a href="index.php?site=logout">Logout</a></li>';
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrap">		
			<div id="main">
				<?php
					//--Load Pagina------
					if(isset($_GET['site'])){
						$phpfile = $_GET['site'];
						$phpfile = htmlentities($phpfile);
						$phpfile = $phpfile.'.php';
						if(file_exists('pages/'.$phpfile) && in_array($phpfile,scandir('pages')) && is_file("pages/$phpfile")){
							include('pages/'.$phpfile);
						}else{
							include('pages/home.php');
						}
					}else{
						include('pages/home.php');
					}
				?>
			</div>

		</div>
	</body>
</html>
<?php ob_flush(); ?>
                            
                            
                            
                            
                            