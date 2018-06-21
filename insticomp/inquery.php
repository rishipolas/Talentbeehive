 <?php
                   if(isset($_POST['submit']))
                    {
                       $name=$_POST['name'];
						$from=$_POST['email'];
						$subject="Mail From '$name'";
						 $contact=$_POST['contact'];
						$message=$_POST['message'];
						$to='info@talentbeehive.com';
						$header .= "MIME-Version: 1.0"."\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $header="From: $from <$from> \r\n";
        $header.='Cc: abhijeets@talentbeehive.com'." \r\n";
        $header .= 'Bcc:sushantk6158@gmail.com'." \r\n";
        $header .= 'Bcc:mullachandbibi@gmail.com'." \r\n";
            
                       if(mail ($to,$subject,$message,$header))
                       {
                      
                      echo "success";
                         /*  echo ("<SCRIPT LANGUAGE='JavaScript'>
                             window.alert('Success! Your Message was Sent Successfully.')
	                   window.location.href='index.php';
	                      </SCRIPT>");*/
                      
                        }
                        else
                        {
                       
                          echo ("<SCRIPT LANGUAGE='JavaScript'>
                             window.alert(' Sorry there was an error sending your form.')
	                   window.location.href='index.php';
	                      </SCRIPT>");
                       
                 
                    }
                   }
                    ?>