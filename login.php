<?php
	//VALID OPTIONS ARE: $_GET (pass through URL), $_POST (pass from form), $_REQUEST (either)
	//Last Modified: 24-MAR-2018
	
	session_start();
    $email = $_POST['email'];
    $pass = $_POST['pass'];
	
    echo "DATA RECEIVED:<br />";
    echo $email."<br />";
    echo $pass."<br />";
	echo "<br />";
	// print_r($_POST);
	// echo "<br />";
	// var_dump($_POST);

	
	//DETERMINE IF USER IS ALREADY LOGGEDIN
	if (!isset($_SESSION['form_token'])){//USER NOT LOGGED IN
		//determine if pass/user is valid
		$response = authenticate_user($email, $pass);
		echo $response;
		echo "<br />";
	}else{//USER IS LOGGED IN
		echo "USER LOGGED IN:".$_SESSION['email'];
	}

	
	
	//if pass is valid -> login, load preferences
	
	//if pass is not valid -> send back to front page
	
	//FUNCTION RECEIVES VARIABLES WHEN CALLED
	function authenticate_user($email, $pass){
		//QUERY DATABASE/ACTIVE DIRECTORY TO SEE IF USER IS VALID
		if ($email == "drinehar@sdccd.edu" && $pass == "1234"){
			/*** set a form token ***/
			$form_token = md5( uniqid('auth', true) );
			
			/*** set the session form token ***/
			$_SESSION['form_token'] = $form_token;
			$_SESSION['email'] = $email;
			$_SESSION['start_timestamp'] = date('Y-m-d HH:mm:s');
			$code = "valid";
		}else{
			$code = "invalid";
		}
		return $code;//RETURNED TO CALLING CODE
	}
?>

<br />
<a href="logout.php">LOGOUT</a>
<?php
	include('footer.php');
?>