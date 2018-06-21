<?php
    				
					
					
					$db="socialuser";
					$link = mysql_connect('localhost', 'roottalent', 'beehive@root', 'socialuser');
					
					if (! $link) die(mysql_error());
					mysql_select_db($db , $link) or die("Couldn't open $db: ".mysql_error());
					
?>
