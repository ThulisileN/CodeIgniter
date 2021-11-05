<?php
class Hello extends CI_Controller {
	function __construct() {
		parent::__construct();
		
	}
	function sign_up(){
			$this->view->render('hello/index');
	}
	function verification(){
			
			if(isset($_POST['submit']))
			{
				Session::set('contact',$_POST['contact']);
				Session::set('name',$_POST['name']);
				Session::set('email',$_POST['email']);
				/*Your authentication key*/
				$authKey = "354555695Abti5JzlQTYb593b5c59";
				/*Multiple mobiles numbers separated by comma*/
				$mobileNumber = $_POST['contact'];
				/*Sender ID,While using route4 sender id should be 6 characters long.*/
				$senderId = "ABCDEF";
				/*Your message to send, Add URL encoding here.*/
				$rndno=rand(1000, 9999);
				Session::set('otp',$rndno);
				$message = urlencode("Your OTP number is : ".$rndno);
				/*Define route */
				$route = "route=4";
				/*Prepare you post parameters*/
				$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'message' => $message,
				'sender' => $senderId,
				'route' => $route
				);
				/*API URL*/
				$url="https://control.msg91.com/api/sendhttp.php";
				/* init the resource */
				$ch = curl_init();
				curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $postData
				/*,CURLOPT_FOLLOWLOCATION => true*/
				));
				/*Ignore SSL certificate verification*/
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				/*get response*/
				$output = curl_exec($ch);
				/*Print error if any*/
				if(curl_errno($ch))
				{
				echo 'error:' . curl_error($ch);
				}
				curl_close($ch);
			}
			if(isset($_POST['resend']))
			{
				
				/*Your authentication key*/
				$authKey = "354555695Abti5JzlQTYb593b5c59";
				/*Multiple mobiles numbers separated by comma*/
				$mobileNumber = Session::get('contact');
				/*Sender ID,While using route4 sender id should be 6 characters long.*/
				$senderId = "ABCDEF";
				/*Your message to send, Add URL encoding here.*/
				$rndno=Session::get('otp');
				$message = urlencode("Your OTP number is : ".$rndno);
				/*Define route */
				$route = "route=4";
				/* ZPrepare you post parameters*/
				$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'message' => $message,
				'sender' => $senderId,
				'route' => $route
				);
				/*API URL*/
				$url="https://control.msg91.com/api/sendhttp.php";
				/* init the resource*/
				$ch = curl_init();
				curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $postData
				/*,CURLOPT_FOLLOWLOCATION => true*/
				));
				/*Ignore SSL certificate verification*/
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				/*get response
				$output = curl_exec($ch);
				/*Print error if any */
				if(curl_errno($ch))
				{
				echo 'error:' . curl_error($ch);
				}
				curl_close($ch);
				echo "Otp resend successfully !";
			}
			if(isset($_POST['save']))
			{
				if(Session::get('otp')==$_POST['otp']){
					$data = array(
						'id'=> null,
						'name' =>Session::get('name'),
						'email' =>Session::get('email'),
						'contact' => Session::get('contact')
					);
					$this->model->submit_index($data);
					echo "Signup successful !";
				}
				else{
					echo "Invalid OTP !";
				}
				
				Session::destroy();
			}
			
			$this->view->render('hello/otp_verify');
	}
}