 <?php
 require_once('recaptchalib.php');
 $privatekey = "6Lfhm_cSAAAAAKS6GKN6NY6os0AU7LDtZTVpytAn";
 $resp = recaptcha_check_answer ($privatekey,
                                 $_SERVER["REMOTE_ADDR"],
                                 $_POST["recaptcha_challenge_field"],
                                 $_POST["recaptcha_response_field"]);
 if (!$resp->is_valid) {
   // What happens when the CAPTCHA was entered incorrectly
   die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
        "(reCAPTCHA said: " . $resp->error . ")");
 } else {
   header_remove();
   $url='/pages/home.php';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
 }
 ?>