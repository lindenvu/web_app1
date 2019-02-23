<?php
	session_start();
	if (isset($_SESSION['form_token'])){
		echo "USER LOGGED IN";
		echo '<a href="logout.php">LOGOUT</a>';
	}
?>
<!doctype html>
<html>
    <head>
        
	<link href="lib/bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    <body>
        <h1>The Better Social Networking Site</h1>
        <form id="login" action="login.php" method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" name="btn_submit" value="Login">
        </form>
        
		<?php
			include('footer.php');
		?>
		
        <script src="lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    </body>
</html>