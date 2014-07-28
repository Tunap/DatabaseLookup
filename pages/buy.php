<div id="space-bar">
	<h2>Buy Now</h2>
</div>
<br>
<?php
	if(!isset($index)){ Header("Location: ../index.php"); exit; }
	if(!isset($_SESSION['username'])){
		Header("Location: index.php?site=login");
	}

	if(isset($_GET['credits'])){

		$request_data  = array(
			'receiver_wallet_address'=> $addresswallet,
			'ipn_url'=> $website.'/btcipn_ipn.php',
			'request_for'=> 'order_id_'.htmlentities($_GET['credits']).'',
			'usd_price'=> $_GET['credits'],


			'seller_url' => ' ',
			'seller_email' => ' ',
			'seller_name' => ' ',
			'seller_product_name' => ' ',
			'seller_product_description' => ' ',
			'seller_product_image' => ' ',

			'custom_data' => $_GET['credits'].'|'.$_SESSION['username'],
		);

		$encoded_data = urlencode(base64_encode(json_encode($request_data)));

		$options = array(
			'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query(array('data'=>$encoded_data)),
			),
		);

		$context  = stream_context_create($options);
		$packet_encoded = file_get_contents('https://btcipn.com/api/createpacket/', false, $context);

		$request = json_decode($packet_encoded,true);


		echo'
		<img border="0" src="http://i.imgur.com/gWfNe9F.png" alt="btcicon" width="150" height="150"><br>
		<h2>Please pay '.$request['return']['BTC_PRICE'].' BTC <br> to the following address <br> '.$request['return']['PAYMENT_ADDRESS'].' <br>to buy the credits requested.</h2>
		<br>
		
		<img src="">';

	}


?>