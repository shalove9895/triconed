<?php

@session_start();

if(isset($_POST['sendSubmit']))

{

	if (isset($_POST['url']) && $_POST['url'] == '')

		{

		if ($_SESSION['gfm_captcha'] == strtoupper($_POST['captcha']))

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

			

			$Subject = trim($_POST["Subject"]);

			$message = trim($_POST["message"]);

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

				$recipient = "shalovearts0@gmail.com";

				

				 $subject = "Tricon Contact Details form";

                $email_content = "Name: $name\n\n";

                $email_content.= "Email: $email\n\n"; 

            	if(isset($_POST["phone"]))

			{

                $email_content.= "Phone: $phone\n\n";

			}   

                $email_content.= "message: $message\n\n";

                 

        

                $mailheader .= "From: $name <$email>";

			if (@mail($recipient, $subject, $email_content, $mailheader))

				{

					http_response_code(200);

					echo "Thank You! Your message has been sent, We'll get back to you shortly!";

					// echo "<script> location.replace('../thanks.html')</script>";

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

			{

			// Not a POST request, set a 403 (forbidden) response code.

			http_response_code(403);

			echo "invalid Captcha Code";

			}

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

