

<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<link rel="stylesheet" type="text/css" href="./css_files/index.css"/>

		<title> Logout </title>

	</head>

	<body>

	<div id="container">

		<?php include "header.php"; ?>

		<?php include "menu.php"; ?>

		<div id="content" width="80%" style="font-size:18pt;height:200px;text-align:center; color:white;">

			<br/>
			<br/>
			<br/>

			<?php 


				if ( session_status() == PHP_SESSION_NONE) {
				    session_start();
					
				}

				if (ini_get("session.use_cookies")) {
				    $params = session_get_cookie_params();
				    setcookie(session_name(), '', time() - 42000,
				        $params["path"], $params["domain"],
				        $params["secure"], $params["httponly"]
				    );
				}

				session_destroy();
				$_SESSION = array();

				header( "refresh:3;url=../index.php" );
				echo " Hope to see you again ";

			?>

		</div>

		<?php require './footer.php'; ?>

	</div>

	</body>
</html>