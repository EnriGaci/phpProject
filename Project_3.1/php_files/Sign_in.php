<?php

if ( session_status() == PHP_SESSION_NONE) {
    session_start();
} 

?>
<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<link rel="stylesheet" type="text/css" href="../css_files/index.css"/>

		<title> Sign In </title>

	</head>

	<body>


	<div id="container">

		<?php include "./header.php"; ?>

		<?php include "./menu.php"; ?>

		<div id="content">

			<div style="text-align:center;font-size:30pt;color:white;padding: 100px 0px 100px 0px;">
			
				<?php

					require 'database.php';

					$name = $_POST["userName"];
					$name = mysql_real_escape_string($name);
					$mail = $_POST["userEmail"];
					$mail = mysql_real_escape_string($mail);

					$sql = "

					SELECT 
						*
					FROM
						Users
					WHERE
						Users.username = '$name' AND Users.email = '$mail';

					";

					$res = mysql_query($sql);

					if( mysql_num_rows($res) == 0 )
					{
						header("refresh:3; url=../index.php");
						echo " User not found redirecting you to home page ";
					}
					else
					{
						$row = mysql_fetch_array($res);
						$_SESSION['username'] = $name;
						$_SESSION['email'] = $mail;
						$_SESSION['idUsers'] = $row['idUsers'];
						$_SESSION['EXPIRES'] = time() + 600; // set session for 10 minutes
						header("Location: ./Loged_in.php");
					};

					if (!$res) {
						die(mysql_error()) ;
					};

				?>

			</div>

		</div>

		<?php require './footer.php'; ?>

	</body>
</html>
