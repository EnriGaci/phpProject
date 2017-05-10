<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<link rel="stylesheet" type="text/css" href="../css_files/libraries.css"/>

		<title> Libraries </title>

	</head>

	<body>

	<div id="container">

		<?php include "./header.php"; ?>

		<?php include "./menu.php"; ?>

		<div id="content" style="width:80%;" >

			<table width="100%" height="100%" border="0">
				
				<tr>
					<td align="center">

						<div style="font-size:20pt; color:white; height:100% ">

							<?php

								require 'database.php';

								$libname = $_POST["name"];
								$title = $_POST["title"];
								$author = $_POST["author"];
								$type = $_POST["type"];
								$date = $_POST["publicationYear"];
								$date .= "-" . $_POST["publicationMonth"];
								$date .= "-" . $_POST["publicationDay"];
								$date .=" 00:00:00";

								if($date == "-- 00:00:00")
									unset($date);

								$sql = " SET NAMES utf8 ";
								$res = mysql_query($sql);

								$sql = "

								SELECT 
									*
								FROM
									Documents
								WHERE
									Documents.libName = '$libname';

								";

								$res = mysql_query($sql);

								if( !$res )
									die(mysql_error());

							?>

							<div style="font-size:26pt;">
								<br/>
								<br/>
									In <?php echo $libname ?> Library you can find these books
								<br/>
								<br/>
							</div>

							<form action="Lend_books.php" method="get" accept-charset="utf-8">
								
							<table width="100%" height="50%" border="0">

								<tr>
									
									<td> <b> Title</b> </td>
									<td> <b>Type</b> </td>
									<td> <b>Author</b> </td>
									<td> <b>PublicationDate</b> </td>
									<td> <b>Lend it</b> </td>

								</tr>

							<?php

								$everythingIsEmpty = 1;

								$bookRequestedString = "";

								while ($row = mysql_fetch_array($res)) {

									$flag = 1;

									if( !empty($title) ){

										$everythingIsEmpty = 0;

										if( $title !== $row['title'] )
											$flag = 0;
										
									}
									if( !empty($author) )
									{

										$everythingIsEmpty = 0;

										if( $author != $row['author'])
											$flag = 0;

									}
									if( !empty($type) )
									{

										$everythingIsEmpty = 0;

										if( $type !== $row['type'])
											$flag = 0;
									}
									if( !empty($date) )
									{

										$everythingIsEmpty = 0;

										if( $date !== $row['publicationDate'])
											$flag = 0;
									}

									if( $flag === 1 && $everythingIsEmpty === 0 && $row['isLended'] == 0 )
									{

							?>
							<tr>
								<td>
								<?php echo $row['title'] . " " ?> 
								</td>

								<td>
								<?php echo $row['type'] . " " ?> 
								</td>

								<td>
								<?php echo $row['author'] . " " ?> 
								</td>

								<td>
								<?php echo $row['publicationDate'] . " " ?>
								</td>

								<td>
									
									<input type="checkbox" name='Lend_checkbox[]' id="Lend_checkbox" value='<?php echo $row['idDocuments']; ?>' >

								</td>

							</tr>
						
							<?php
									}//telos if isLended
									
								}//telos while

							?>

						</div>

					</td>

				</tr>

			</table>

			<div style="text-align:right;padding-right:130px;">

				<br/>

				<input type="submit" name="DocumentSearch" value="Lend" id="submitBtm">
				
			</div>

			</form>

		</div>
		</td>
		</tr>
		</table>
		</div>

		<?php require './footer.php' ?>;

	</body>
</html>
