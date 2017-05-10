<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<meta http-equiv="refresh" content="0.001;url=Browser_libraries.php"> <!-- meta apo 0.001 sexonds se kanei anakateu8hnsh sto Browser_libraries.php -->

	 	<link rel="stylesheet" type="text/css" href="../css_files/libraries.css"/>

		<title> Libraries </title>

	</head>

	<body>


	<div id="container">

		<?php include "./header.php"; ?>

		<?php include "./menu.php"; ?>

		<div id="content" style="width:auto;">

			<table  style="width:auto;height:auto;position:relative;" border="0">
				
				<tr>
					<td align="center">

						<div style="font-size:20pt; color:white; ">

							<?php

								require 'database.php';

								$name = $_POST["libName"];
								$addr = $_POST["libAddress"];
								$tel = $_POST["libTelephone"];
								$mail = $_POST["libEmail"];
								$web = $_POST["libWebsite"];
								$dep = $_POST["libDepartment"];

								$sql = " SET NAMES utf8 ";
								$res = mysql_query($sql);

								$sql = "

								SELECT 
									*
								FROM
									Libraries

								";

								$res = mysql_query($sql);

								$everythingIsEmpty = 1;

								while ($row = mysql_fetch_array($res)) {

									$flag = 1;

									if( !empty($name) ){

										$everythingIsEmpty = 0;

										if( $name !== $row['libName'] )
											$flag = 0;
									}
									if( !empty($addr) )
									{

										$everythingIsEmpty = 0;

										if( $addr !== $row['address'])
											$flag = 0;
									}
									if( !empty($tel) )
									{

										$everythingIsEmpty = 0;

										if( $tel !== $row['telNum'])
											$flag = 0;
									}
									if( !empty($mail) )
									{

										$everythingIsEmpty = 0;

										if( $mail !== $row['email'])
											$flag = 0;
									}
									if( !empty($web) )
									{

										$everythingIsEmpty = 0;

										if( $web !== $row['website'])
											$flag = 0;
									}
									if( !empty($dep) )
									{
										$everythingIsEmpty = 0;

										if( $dep !== $row['department'])
											$flag = 0;
									}

									if( $flag === 1 && $everythingIsEmpty === 0 )
									{

										$name = $row['libName'];

										session_start();

										$_SESSION['libNameSearch'] = $name;

										// echo $row['libName'] . " " . $row['address'] . " " . $row['telNum'] . " " . $row['email'] . " " . $row['website'] . " " . $row['department'] . "<br><br>";

									}

								}

								if (!$res) {
									die(mysql_error()) ;
								};

							?>

						</div>

					</td>

				</tr>

			</table>

		</div>

		<?php require './footer.php'; ?>

	</body>
</html>
