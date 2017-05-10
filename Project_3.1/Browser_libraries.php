<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<link rel="stylesheet" type="text/css" href="./css_files/index.css"/>

		<title> Home page </title>

	</head>

	<body>

	<div id="container">

		<?php include "header.php"; ?>

		<?php include "menu.php"; ?>

		<div id="content">

			<table border="0" width="100%" height="100%" cellspacing="20px">

				<tr>
					
					<td>

						<div align="center">
						
							<font color="white" size="5pt"> Φιλοσοφική </font>

							<form action="./php_files/Browser_libraries.php" method="post">

								<div>
								
									<input type="hidden" name="name" value="Φιλοσοφική">
									<input type="image" src="./Pictures/Libraries_pictures/filosofikh.jpeg" style="width:60%;height:130px">

								</div>

							</form>

						</div>

					</td>

					<td>

						<div align="center">

							<font color="white" size="5pt" style="align:center;"> Θετικές Επιστήμες </font>

							<form action="./php_files/Browser_libraries.php" method="post">

								<div>

									<input type="hidden" name="name" value="Θετικές Επιστήμες">
									<input type="image" src="./Pictures/Libraries_pictures/thetikes_episthmes.jpg" style="width:40% ;height:20%;" >

								</div>

							</form>

						</div>

					</td>

					<td>

						<div align="center">

							<font color="white" size="5pt" style="align:center;"> Νομική </font>


							<form action="./php_files/Browser_libraries.php" method="post">

								<div>

									<input type="hidden" name="name" value="Νομική">
									<input type="image" src="./Pictures/Libraries_pictures/Nomikh.jpeg" style="width:90% ;height:130px;" >

								</div>

							</form>

						</div>

					</td>

				</tr>

				<tr>

					<td>

						<div align="center">

							<font color="white" size="5pt" style="align:center;"> Θεολογική </font>

							<form action="./php_files/Browser_libraries.php" method="post">

								<div>

									<input type="hidden" name="name" value="Θεολογική">
									<input type="image" src="./Pictures/Libraries_pictures/theologikh.jpeg" style="width:60% ;height:60%;" >

								</div>

							</form>

						</div>

					</td>

					<td>

						<div align="center">

							<font color="white" size="5pt" style="align:center;"> Επιστήμες υγείας </font>

							<form action="./php_files/Browser_libraries.php" method="post">

								<div>


									<input type="hidden" name="name" value="Επιστήμες υγείας">
									<input type="image" src="./Pictures/Libraries_pictures/Episthmes_ygeias.png" style="width:40% ;height:20%;" >

								</div>

							</form>

						</div>

					</td>
					
				</tr>

			</table>

		</div>

		<?php require './footer.php';  ?>


	</body>
</html>