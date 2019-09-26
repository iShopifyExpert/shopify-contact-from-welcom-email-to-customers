<?php 
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	if($_SERVER['REQUEST_METHOD']=="GET"){
			$to=$_REQUEST['sent_email'];
			$request=$_REQUEST['request'];

			$pass=$_REQUEST['pass'];
			$page=$_REQUEST['page']?$_REQUEST['page']:"";
			$result = array();
			if($request!=='ajax'){
				$result['type']="error";
				$result['msg']="Wrong Request";
				echo json_encode($result);
				exit;

			}
			if($pass!=='123tj12'){
				$result['type']="error";
				$result['msg']="Wrong Password";
				echo json_encode($result);
				exit;

			}

			/* Set e-mail recipient */
			//$to = "tjthouhid@gmail.com";
			//$to = "tjthouhid2@gmail.com";
			$from = "HelloClassy <hello@helloclassy1.com>";
			$replyTo = "hello@helloclassy.com";

			/* Let's prepare the message for the e-mail */
        $subject = "Love Knitting? Here is Your Instant 10% Discount!";
        switch ($page) {
            case "chain":
                 $subject = "Free Turquoise Chain for You!";
                 break;
            case "sun":
                 $subject = "Free Sun-Readers for You!";
                 break;
            case "quilting":
                 $subject = "Love Quilting?  Here is Your Instant 10% Discount!";
                 break;
            case "nursing":
                 $subject = "SUCCESS!  Here is Your Instant 10% Discount!";
                 break;
            default:
                $subject = "Love Knitting? Here is Your Instant 10% Discount!";
           }
			

		    // To send HTML mail, the Content-type header must be set
		   // $headers  = 'MIME-Version: 1.0' . "\r\n";
		   // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		    $headers = "From: " . $from . "\r\n";
		    $headers .= "Reply-To: ". $replyTo . "\r\n";
		    //$headers .= "CC: susan@example.com\r\n";
		    $headers .= "MIME-Version: 1.0\r\n";
		    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		    
		    $message = "<!DOCTYPE html>";
		    $message .= "<html>";
		    $message .= "<head>";

			//$message .= "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>";
			
			$message .= "<style>";

		    $message .= "html, body{margin:0;background: #FAFAFA;}";
			$message .= "#main_content{width: 50%;margin: 0 auto;}";
			$message .= ".header_image {display: block;margin-left: auto;margin-right: auto;margin-bottom: 25px;}";
			$message .= ".padding_p{padding: 7px 0px;}";
			$message .= ".padding_b{padding: 20px 0px;}";
			$message .= ".padding_c{padding: 20px 0px;text-align:center}";
			$message .= "hr{width: 50%;}";
			$message .= ".sep_i{margin-right: 15px;}";

			$message .= "</style>";
		    $message .= "</head>";
		    $message .= "<body>";


			$message .= "<div class='container'>";
				//$message .= "<p style='text-align:center'><a href='#'>View this email in your browser</a></p>";

				$message .= "<div id='main_content'>";
					$message .= "<div style='background: #FFFFFF; width: 100%;padding: 10px;'>";
		    			$message .= "<div class='row'>";
		    			    $message .= "<div class='col-sm-12' style='padding: 40px 40px 20px 40px;'>";
		    			    	$message .= "<img src='http://helloclassy1.com/img/header_image.png'>";
		    			    $message .= "</div>";
		                $message .= "</div>";


					$message .= "<div class='row'>";
						$message .= "<div class='col-sm-12'>";
							$message .= "<p class='padding_p'>Hey Gorgeous,</p>";
							
        
        switch ($page) {
            case "chain":
                 $message .= "<p class='padding_p'><strong>Thanks for signing up for a FREE Turquoise Reading Glasses Chain!</strong></p>";
							$message .= "<p class='padding_p'>Please use coupon code <strong>CHAIN</strong> for your discount.   <strong>IMPORTANT:</strong>  This code is valid for one day only with your first CLASSY purchase, so ACT NOW!</p>";
							$message .= "<p class='padding_p'><strong>JUST FOR YOU!</strong>  HelloClassy features gorgeous reading glasses and stylish accessories that are perfect for you!</p>";			
                 break;
            case "sun":
                 $message .= "<p class='padding_p'><strong>Thanks for signing up for FREE Sun-Readers! </strong></p>";
							$message .= "<p class='padding_p'>Please use coupon code <strong>SUN</strong> for your discount.   <strong>IMPORTANT:</strong>  This code is valid with your first CLASSY purchase for one day only, so ACT NOW!</p>";
							$message .= "<p class='padding_p'><strong>JUST FOR YOU!</strong>  HelloClassy features gorgeous reading glasses and stylish accessories that are perfect for you!</p>";			
                 break;
            case "quilting":
                $message .= "<p class='padding_p'><strong>Here is your 10% discount code for your first HelloClassy purchase!</strong></p>";
							$message .= "<p class='padding_p'>Please use coupon code <strong>BEST</strong> for your discount.   <strong>IMPORTANT:</strong>  This code is valid for one day only, so ACT NOW!</p>";
							$message .= "<p class='padding_p'><strong>JUST FOR QUILTERS!</strong>  HelloClassy features gorgeous reading glasses and stylish accessories that are perfect for quilters!</p>";
							
                 break;
            case "nursing":
                 $message .= "<p class='padding_p'><strong>Here is your 10% discount code for your first HelloClassy purchase!</strong></p>";
							$message .= "<p class='padding_p'>Please use coupon code <strong>BEST</strong> for your discount.   <strong>IMPORTANT:</strong>  This code is valid for one day only, so ACT NOW!</p>";
							$message .= "<p class='padding_p'><strong>JUST FOR nurses!</strong>  HelloClassy features gorgeous reading glasses and stylish accessories that are perfect for nurses!</p>";
							
                 break;
            default:
                $message .= "<p class='padding_p'><strong>Here is your 10% discount code for your first HelloClassy purchase!</strong></p>";
							$message .= "<p class='padding_p'>Please use coupon code <strong>BEST</strong> for your discount.   <strong>IMPORTANT:</strong>  This code is valid for one day only, so ACT NOW!</p>";
							$message .= "<p class='padding_p'><strong>JUST FOR KNITTERS!</strong>  HelloClassy features gorgeous reading glasses and stylish accessories that are perfect for knitters!</p>";
							
           }
        $message .= "<p class='padding_p'><strong>MORE GREAT NEWS!</strong>   New CLASSY products will be added all the time, for a more beautiful you!</p>";
							
							$message .= "<br><p>Laura Trubow";
							$message .= "<br>Customer Champion";
							$message .= "<br>HelloClassy.com";
							
							$message .= "<br><a href='https://helloclassy.com/' target='_blank' >www.HelloClassy.com</a>";
							$message .= "<br><strong><i>With the right pair of readers,<br>Women can rule the world.</i></strong></p>";
						$message .= "</div>";
					$message .= "</div>";

				$message .= "</div>";


					$message .= "<div class='row' style='background-color: #333333;padding: 60px 0px 40px;text-align: center;'>";
						$message .= "<div class='col-sm-12'>";
							$message .= "<p class='text-center;'>";

								$message .= "<a href='#'><span class='sep_i'><img style='width: 30px;height: 30px;margin-right=6px;' src='http://helloclassy1.com/img/fb.png' /></span></a>";
								$message .= "<a href='#'><span class='sep_i'><img style='width: 30px;height: 30px;margin-right=6px;' src='http://helloclassy1.com/img/tw.png' /></span></a>";
								$message .= "<a href='#'><span class='sep_i'><img style='width: 30px;height: 30px;margin-right=6px;' src='http://helloclassy1.com/img/ins.png' /></span></a>"; 
								$message .= "<a href='#'><span class='sep_i'><img style='width: 30px;height: 30px;margin-right=6px;' src='http://helloclassy1.com/img/link.png' /></span></a>"; 
								

								
							
							$message .= "</p>";
							$message .="<span style='color:#fff;'>Copyright © 2018 <a style='color:#fff;' href='https://helloclassy.com/' target='_blank' >HelloClassy</a>, All rights reserved.</span>";
						$message .= "</div>";
					$message .= "</div>";
					$message .= "</div>";

					$message .= "<hr>";
					//$message .= "<div class='row'>";
						//$message .= "<div class='col-sm-12'>";
							//$message .= "<p class='padding_c'>copyright @                   2018 HellowClassy, All rights reserved</p>";
							//$message .= "<p  style='text-align:center'>Want to change how you receive this emails ?</p>";
							//$message .= "<p  style='text-align:center'>You can <a href='#'>Update your preferences</a> oe <a href='#'>Unsubscribe from this list</a></p>";
					//$message .= "</div>";
					//$message .= "</div>";



		    	$message .= "</div>";
		    
		    $message .= "</body>";
		    $message .= "</html>";
		  //  echo $message;
		    //mail($to, $subject, $message, $headers);
		    if(mail($to, $subject, $message, $headers)){
		       // echo 'Your mail has been sent successfully.';
		    } else{
		        //echo 'Unable to send email. Please try again.';
		    }
		    $result['type']="success";
		    $result['msg']="Your mail has been sent successfully";
		    echo json_encode($result);
		    exit;
	}
	$result['type']="success";
    $result['msg']="Double Request kene deu ba";
    echo json_encode($result);
    exit;

?>

<!DOCTYPE html>
<html>
<head>
	<title>HelloW Classy</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>

		html, body{
			margin:0;
			background: #FAFAFA;
		}
		#main_content{
			width: 50%;
		    margin: 0 auto;
		}
		.header_image {
		    display: block;
		    margin-left: auto;
		    margin-right: auto;
		    margin-bottom: 25px;
		}
		.padding_p
		{
			padding: 7px 0px;
		}
		.padding_b
		{
			padding: 20px 0px;;
		}
		hr{
		    width: 50%;
		}
		.sep_i{
			margin-right: 15px;
		}

	</style>
</head>
<body>

	<div class="container">
		<p class="text-center"><a href="#">View this email in your browser</a></p>

		<div id="main_content">
			<div style="background: #FFFFFF; width: 100%;padding: 10px;">
			<div class="row">
			    <div class="col-sm-12">
			    	<img src="img/header_image.png" class="header_image">
			    </div>
			</div>


			<div class="row">
				<div class="col-sm-12">
					<p class="padding_p">Thank you for signing up for our for our CLASSY giveaway</p>
					<p class="padding_p">Winners Will be announced on the HelloClassy Facebook page each month.</p>
					<p class="padding_p"><strong>GREAT NEWS! </strong> The next lucky winner could be you. In the meantime get attached and shop Classy!</p>
					<p>Laura Trubow</p>
					<p>Customer Champion</p>
					<p>Customer Champion HelloClassy</p>
					<p><a href="www.HelloClassy.com">www.HelloClassy.com</a></p>
				</div>
			</div>

		</div>


			<div class="row">
				<div class="col-sm-12">
					<p class="text-center" style="margin: 45px 10px 15px 10px;;">
						<a href="#"><span class="sep_i"><i class="fa fa-facebook" style="background: #537BBE;width: 30px;height: 30px;border-radius: 50%;padding-top: 7px;color: white;"></i></span></a>
						<a href="#"><span class="sep_i"><i class="fa fa-twitter" style="background: #76CBF0;width: 30px;height: 30px;border-radius: 50%;padding-top: 7px;color: white;"></i></span></a>
						<a href="#"><span class="sep_i"><i class="fa fa-instagram" style="background: #E4405F;width: 30px;height: 30px;border-radius: 50%;padding-top: 7px;color: white;"></i></span></a>
						<a href="#"><span class="sep_i"><i class="fa fa-pinterest" style="background: #CE2229;width: 30px;height: 30px;border-radius: 50%;padding-top: 7px;color: white;"></i></span></a>
					</p>
				</div>
			</div>
			</div>

			<hr>
			<div class="row">
				<div class="col-sm-12">
					<p class="text-center padding_b">copyright @ 2019 HelloClassy, All rights reserved</p>
					<p class="text-center">Want to change how you receive this emails ?</p>
					<p class="text-center">You can <a href="#">Update your preferences</a> oe <a href="#">Unsubscribe from this list</a></p>
				</div>
			</div>



	</div>

</body>
</html>
