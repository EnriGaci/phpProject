<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<link rel="stylesheet" type="text/css" href="../css_files/libraries.css"/>

		<title> Lend books </title>

	</head>

	<body>

	<div id="container">

		<?php include "./header.php"; ?>

		<?php include "./menu.php"; ?>

		<div id="content" style="position:relative;width:80%;padding-bottom:2%;padding-top:2%">

			<div style= "color:white;font-size:25pt;text-align:center;height:auto;width:100%">
				
			<?php

				if ( session_status() == PHP_SESSION_NONE) {
				    session_start();
				    if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time() ) {
					    session_destroy();
					    $_SESSION = array();
					    header("Location: ../Account.php");
					}
				} 

				if( empty($_SESSION['username']) )
					header("Location: ../Account.php");

				require 'database.php';

				$sql = " SET NAMES utf8 ";
				$res = mysql_query($sql);

				$username = $_SESSION['username'];

				$books = $_GET['Lend_checkbox'];

				$date = getdate();

				$returnDate = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'] . " 00:00:00";

				$returnDate = date("Y-m-d H:i:s");

				$returnDate = date("Y-m-d H:i:s" , strtotime($returnDate . '+10 days'));

				$isEmpty = 1;

				foreach ($books as $book) {

					if( !empty($book) )
						$isEmpty = 0;
				}

				if( $isEmpty == 0 )
					echo $username . " lended : <br>"; 

				foreach ($books as $id) {

					if( empty($id) )
						continue;

					$userid = $_SESSION['idUsers'];

					$sql = "

						UPDATE
							Documents
						SET
							Documents.isLended = '1',
							Documents.useridLended = '$userid',
							Documents.returnDate = '$returnDate'
						WHERE
							Documents.idDocuments = '$id';

					";

					$res = mysql_query($sql);

					if( !$res )
						die(mysql_error());

					$sql = " SELECT * FROM Documents WHERE Documents.idDocuments = '$id'; ";

					$res = mysql_query($sql);

					if( !$res )
						die(mysql_error());

					$row = mysql_fetch_array($res);

					?> 
					<br/>
					<b> 
						<?php echo $row['title']; ?>
					</b>
					<?php echo " and has to return it at : "; ?>
					<b>
					<?php echo $row['returnDate']; ?>
					</b>
					<?php

				}

				$books = $_GET['Return_checkbox'];

				$isEmpty = 1;

				foreach ($books as $book) {
					if( !empty($book))
						$isEmpty = 0;
				}

				if( $isEmpty == 0 )
					echo "<br><br> Returned : <br>";

				foreach ($books as $id) {

					if( empty($id) )
						continue;

					$userid = $_SESSION['idUsers'];

					$sql = "

						UPDATE
							Documents
						SET
							Documents.isLended = '0',
							Documents.useridLended = 'NULL',
							Documents.returnDate = 'NULL'
						WHERE
							Documents.idDocuments = '$id';

					";

					$res = mysql_query($sql);

					if( !$res )
						die(mysql_error());

					$sql = " SELECT * FROM Documents WHERE Documents.idDocuments = '$id'; ";

					$res = mysql_query($sql);

					if( !$res )
						die(mysql_error());

					$row = mysql_fetch_array($res);

					?> 

					<br/>
					<b> 
						<?php echo $row['title']; ?>
					</b>

					<?php
				}


			?>

			</div>

			</div>

			<?php require './footer.php';  ?>

		</div>

	</body>
</html>
