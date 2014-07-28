<div id="space-bar">
	<h2>Home</h2>
</div>
<br>
<?php
	if(!isset($index)){ Header("Location: ../index.php"); exit; }
	
	if(isset($_SESSION['username'])){
		echo '
		<center>
		<img border="0" src="https://cdn3.iconfinder.com/data/icons/linecons-free-vector-icons-pack/32/news-128.png" alt="Pulpit rock" width="300" height="250">
		<h1><u>News Feed & Updates</u></h1>
		<br>
		<h2>
<a href="https://crackstation.net/" target="_blank">Recommended for cracking hashes!</a><br><br>
		
		Entries Added:451k
		</h2>
		<br>
		<h2><b>Fri Jul 25 2014 - By Gaia<b></h2>
		<h3>
		<b><u>Main news</u></b>
		<br><br>
		Hello guys and welcome to IntelHosting, we at IntelHosting strive to give the customer 100% satisfaction.<br>
		This website will be constantly updated with new database entries, We are currently sitting at 250k entries.<br>
		Soon we will be cracking a lot more hashes then the large amount we already have to improve quality of lookups.<br>
		We are now offering a reward for any databases submitted to us that are HQ and unseen, credits will be awarded.<br>
		<br><br>
		<b><u>Extra news</u></b>
		<br><br>
		We are going to be adding a PayPal autobuy system for credits very soon.<br>
		If you only have paypal and would like to buy credits add me on skype: d.i.c.t.a.t.e to discuss deals.<br>
		More security patches have been applied to keep the website secure with your data.<br>
		There will be a rather strict terms of service being added to the site in the next few days or so.<br>
		But other than that guys enjoy the site and try not to run too many skiddies.<br>
		<br>
		<b>- Gaia</b>
		</h3>
		';
	}else{
		echo 'In order to use this website you need to <a href="index.php?site=login">login</a> or <a href="index.php?site=register">register</a>';
	}


?>