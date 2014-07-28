<?php
require_once("config.php");
if (!isset($_POST['payment'])){exit;}

if ($_POST['payment'] != 'VALID'){
    error_log ('BTCIPN : Invalid payment type EXPECTED VALID. please contact btcipn.com');
    exit;
}


$requeired_minimum_confirmation = 1;
$seller_wallet_address = $addresswallet;


if ($_POST['seller_address'] != $seller_wallet_address){
    error_log ('BTCIPN : Wrong seller_address');
    exit;
}


if ($_POST['confirmations'] >= '0'){

}



if ($_POST['confirmations'] == $requeired_minimum_confirmation){

    if (!is_payment_processed($_POST['packet_id'])){

            $encoded_data = urlencode(base64_encode(json_encode($_POST)));
            $options = array(
                                'http' => array(
                                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                    'method'  => 'POST',
                                    'content' => http_build_query(array('data'=>$encoded_data)),
                                    //'content' => http_build_query(array('data'=>$encoded_data, 'testnet'=>'true')),   // for testnet
                                ),
                            );
                            $context  = stream_context_create($options);
            $IPN_VERIFICATION = file_get_contents('https://btcipn.com/api/verifyipn/', false, $context);

            if ($IPN_VERIFICATION == "OK"){
                set_payment_processed($_POST['packet_id']);
				//$_POST['custom_data']
				$ex = explode("|",$_POST['custom_data']);
				
				$cred = $pdo->prepare("SELECT * FROM users WHERE username = :username");
				$cred->bindValue(":username",$ex[1],PDO::PARAM_STR);
				$cred->execute();
				$cred = $cred->fetchAll();
				
				$crediti = $cred[0]['credits'];
				$crediti = $crediti + $ex[0];
				
				$upd = $pdo->prepare("UPDATE users SET credits = :credits WHERE username = :username");
				$upd->bindValue(":credits",$crediti,PDO::PARAM_STR);
				$upd->bindValue(":username",$ex[1],PDO::PARAM_STR);
				$upd->execute();
				
				
				
				
				
            }else{
                error_log ('BTCIPN : INVALID IPN REQUEST');
                exit;
            }
    }else{
        exit;
    }
}

function is_payment_processed($packet_id){
    if (file_exists('packets/'.$packet_id.'.dat')){
        return true;
    }
    return false;
}

function set_payment_processed($packet_id){
    file_put_contents('packets/'.$packet_id.'.dat',time());
}








?>

