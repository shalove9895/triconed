<?php
@session_start();
if(isset($_POST['Submit']))
{
	if (isset($_POST['url']) && $_POST['url'] == '')
		{
		
			$name = strip_tags(trim($_POST["name"]));
			$name = str_replace(array(
				"\r", 
				"\n"
			) , array(
				" ",
				" "
			) , $name);
			$email = filter_var(trim($_POST["email"]) , FILTER_SANITIZE_EMAIL);
			
			$feedback = trim($_POST["message"]);
			if(isset($_POST["phone"]))
			{
				$phone = trim($_POST["phone"]);
			}
			if (empty($name)   OR !filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					http_response_code(400);
					echo "Oops! There was a problem with your submission. Please complete the form and try again.";
					exit;
				}
			     // $recipient = "info@activeoffers.com.au";
			     $recipient = "edumirchi@gmail.com, edumirchi@gmail.com, almaz@dotlinedesigns.com";
				
                $subject = "Contacted By $name";
                $email_content = "\n\n\n\nName: $name\n\n";
                $email_content.= "Email: $email\n\n";
            	if(isset($_POST["phone"]))
			{
                $email_content.= "Phone: $phone\n\n";
			}   
                $email_content.= "feedback: $feedback\n\n";
                $email_headers = "From: $name <$email>";
			if (@mail($recipient, $subject, $email_content, $email_headers))
				{
					http_response_code(200);
					echo "Thank You! Your message has been sent.";
					exit;
				}
			  else
				{
					http_response_code(500);
					echo "Oops! Something went wrong and we couldn't send your message.";
					exit;
				}
			
		}
	  else
		{http_response_code(500);
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
