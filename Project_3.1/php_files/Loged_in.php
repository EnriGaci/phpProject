<?php

if ( session_status() == PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time() ) {
	    session_destroy();
	    $_SESSION = array();
	    header("Location: ../Account.php");
	}
}

?>

<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<link rel="stylesheet" type="text/css" href="./css_files/index.css"/>

		<title> Account </title>

	</head>

	<body>

	<div id="container">

		<?php include "./header.php"; ?>

		<?php include "./menu.php"; ?>

		<div id="content" width:auto; style="padding-bottom:11%">
			
			<div style="padding: 90px 0px 0px 0px; text-align:center; ">

				<font color="white" size="6px">

				Books that are in  <?php session_start(); echo $_SESSION['username']; ?> possesion 

				</font>
			
			</div>

			<div style="text-align:center; font-size:18pt;color:white; padding-top:70pt">

			

				<table border="0" width="100%">

					<div style="float:right;font-size:15pt;position:relative;right:320px">
						
						Renew Lending Period

					</div>

					<div  style="float:right;position:relative;left:90px;font-size:15pt">
						
						Return book

					</div>


					<form action="Lend_books.php" method="get" accept-charset="utf-8">

				<?php

					require 'database.php';

					$sql = " SET NAMES utf8 ";
					$res = mysql_query($sql);

					if( !$res )
						die(mysql_error());

					$id = $_SESSION['idUsers'];

					$sql = " SELECT * FROM Documents WHERE Documents.useridLended = '$id'; ";

					$res = mysql_query($sql);

					if( !$res )
						die(mysql_error());

					while ( $row = mysql_fetch_array($res) ) {
						
					?>

					<tr>

						<td width="50%" height="40px" style="text-align:center;">

							<b><?php echo "<br>" . $row['title']?></b>

							 <?php echo " and you have to have returned it by "?>

							 <b><?php echo $row['returnDate'] ."<br>" ; ?></b>

						</td>

							<td style="vertical-align:bottom;" height="40px">
								<input type="checkbox" name='Lend_checkbox[]' value='<?php echo $row['idDocuments']; ?>'>
							
							</td>

							<td style="vertical-align:bottom;" height="40px">
								<input type="checkbox" name='Return_checkbox[]' value='<?php echo $row['idDocuments']; ?>'>
							</td>

					</tr>

					<?php

					} // telos while


				?>


				</table>

					<div style="float:right;position:relative;top:40px;right:45%">

						<br/>

						<input type="submit" name="DocumentSearch" value="Submit" id="submitBtm">
					
					</div>

				</form>

			</div>

		</div>

		<?php require './footer.php'; ?>

	</div>

	</body>
</html>
