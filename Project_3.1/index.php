<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<link rel="stylesheet" type="text/css" href="./css_files/index.css"/>

		<title> Home page </title>

	</head>

	<body>

	<div id="container">

		<?php include "./header.php"; ?>

		<?php include "./menu.php"; ?>

		<div id="content" style="padding-bottom:10%;">
			
			<div style="padding: 90px 0px 0px 0px; text-align:center; ">

				<font color="white" size="6px">Welcome to the Kapodistrian University of Athens Library</font>
			
			</div>

			<div style="text-align:center; font-size:18pt;color:white; padding-top:60pt">

				<br/>

				<form action="./php_files/Sign_in.php" method="post" accept-charset="utf-8">
					
					
					Username
					<div id="searchHelpingText" align="center"  >
						<input type="text" name="userName" placeholder="username" style="height:20px">

					</div>


					Email
					<div id="searchHelpingText" align="center"  >
						<input type="text" name="userEmail" placeholder="email" style="height:20px;">

					</div>

					<br/>	

					<div>

						<input type="submit" name="DocumentSearch" value="Sign in" id="submitBtm">

					</div>

				</form>
				
			</div>

		</div>

		<?php require 'footer.php';  ?>


	</div>

	</body>
</html>
