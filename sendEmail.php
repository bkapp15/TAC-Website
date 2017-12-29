<?php
  /*
  File name: sendEmail.php
  Date created: 29 Dec 2017
  Date modified: 29 Dec 2017
  Author: Blake Kappel
  */
  
  // Composes and sends email to blake.tacweb@gmail.com
	function sendEmail($msg, $from, $firstN, $lastN){
		$msg = $msg . '\n\n' . '- $firstN $lastN ($from)';
		$msg = wordwrap($msg, 70);
		$headers = 'From: $from';
		
		if (@mail('blake.tacweb@gmail.com', 'New Inquiry', $msg, $headers)){
			return TRUE;
		}
		else {
			return FALSE;
		}
		
	}

?>