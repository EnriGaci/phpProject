<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<link rel="stylesheet" type="text/css" href="../css_files/libraries.css"/>

		<title> Documents in libraries </title>

	</head>

	<body>


	<div id="container">

		<?php include "./header.php"; ?>

		<?php include "./menu.php"; ?>

		<div id="content" style="width:80%; margin: 5% 10% 10% 10%;padding-bottom:3%">

			<table width="100%" height="auto" border="0">
				
				<tr>
					<td align="center">

						<br/>

						<div style="font-size:18pt; color:white; height:100% ">

							<?php

								require 'database.php';

								$sql = " SET NAMES utf8 ";
								$res = mysql_query($sql);

								$libnames = array( $_POST["FilosophikhCheckBox"] , $_POST["ThetikesEpisthmesCheckBox"] , $_POST["TheologikhCheckBox"] , $_POST["EpisthmesYgeiasCheckBox"] , $_POST["NomikhCheckBox"] );

								$emptyArray = 1;

								foreach ($libnames as $libname) {

									if( !empty($libname) )
										$emptyArray = 0;

								}

								if( $emptyArray == 1 )
								{

									header( "Location: ./Error_Document_search_by_library.php" );

								}

								foreach ($libnames as $libname) {

									if( empty($libname) )
									{
										continue;
									}

									$title = $_POST["title"];
									$author = $_POST["author"];
									$type = $_POST['type'];
									$date = $_POST["publicationYear"];
									$date .= "-" . $_POST["publicationMonth"];
									$date .= "-" . $_POST["publicationDay"];
									$date .=" 00:00:00";

									if($date == "-- 00:00:00")
										unset($date);

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

							<form action="Lend_books.php" method="get" accept-charset="utf-8">

							<table width="100%" height="10%" border="0">

								<div style="font-size:20pt">

									<?php 

										echo "<br>In " . $libname . " Library you can find these books<br><br>"; 
									
									?>

								</div>

								<tr>
									
									<td> <b><?php echo "Title"; ?></b> </td>
									<td> <b><?php echo "Type"; ?></b> </td>
									<td> <b><?php echo "Author"; ?></b> </td>
									<td> <b><?php echo "PublicationDate"; ?></b> </td>
									<td> <b><?php echo "Lend it"; ?></b> </td>

								</tr>

							<?php

								$everythingIsEmpty = 1;

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

									if( $flag === 1 && $everythingIsEmpty === 0 )
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

								<td >
									<input type="checkbox" name='Lend_checkbox[]' id="Lend_checkbox" value='<?php echo $row['idDocuments']; ?>' >
								</td>
							</tr>

							<?php
									}//telos if isLended
									
								}//telos while

							}//telos for each

							?>

						</div>

					</td>

				</tr>

			</table>

			<?php if( $emptyArray != 1 ) { ?>

				<div width="100%" style="text-align:right; padding-right: 75px;">

					<br/>

					<input type="submit" name="DocumentSearch" value="Lend" id="submitBtm">
					
				</div>

			<?php } ?>

			</form>

			</table>

		</div>

		<?php require './footer.php' ?>;

	</body>
</html>