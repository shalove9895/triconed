<?php
@session_start();
if(isset($_POST['sendSubmit']))
{
	if (isset($_POST['url']) && $_POST['url'] == '')
		{
		// if ($_SESSION['gfm_captcha'] == strtoupper($_POST['captcha']))
		// 	{
			$tname = strip_tags(trim($_POST["tname"]));
			$lname = $_POST["lname"];
			$salary = $_POST["salary"];
			$job = $_POST["job"];
 
			     $recipient = "info@virtualhrpartner.com";
			   
                $subject = "Contacted By $tname";
                $email_content = "\n\nTitle: $tname\n\n";
                $email_content .= "Location: $lname\n\n";
                $email_content .= "Salary in INR: $salary\n\n";
                $email_content .= "Job Describtion: $job\n\n";
                $email_headers = "From: $name <$lname>";
			if (@mail($recipient, $subject, $email_content, $email_headers))
				{
					http_response_code(200);
					echo "Thank You! Your message has been sent.";
					 
				}
				
			  else
				{
					http_response_code(500);
					echo "Oops! Something went wrong and we couldn't send your message.";
					exit;
				}
			// }
		 //  else
			// {
			// // Not a POST request, set a 403 (forbidden) response code.
			// http_response_code(403);
			// echo "invalid Captcha Code";
			// }
		}
	  else
		{
		echo "We'll get back to you as soon as possible";
		exit;
		}
	}
	else
	{
	http_response_code(403);
	echo "There was a problem with your submission, please try again.";
	}

?>
