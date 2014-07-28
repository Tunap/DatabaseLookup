<?php
	session_unset();
	session_destroy();
	Header("Location: ../index.php?site=loggedout");
?>
                            
                            