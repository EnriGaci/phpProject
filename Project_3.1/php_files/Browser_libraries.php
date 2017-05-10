<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<link rel="stylesheet" type="text/css" href="../css_files/index.css"/>

		<title> Home page </title>

	</head>

	<body>

	<div id="container">

		<?php include "./header.php"; ?>

		<?php include "./menu.php"; ?>

		<div id="content" >

			<div style="color:white;font-size:15pt ; text-align:center; margin-top: 50pt; ">

				<?php

					session_start();

					if( !empty($_SESSION['libNameSearch']) )
					{
						$name = $_SESSION['libNameSearch'];
						$_SESSION['libNameSearch']="";
					}
					else
						$name = $_POST["name"];

					if( empty($name) )
						header("Location: ./Error_Search_Library.php");

					include './database.php';

					$sql = " SET NAMES utf8 ";
					$res = mysql_query($sql);

					if( !$res )
						die(mysql_error());

					$sql = "

						SELECT * FROM Libraries WHERE Libraries.libName = '$name' ;

					";

					$res = mysql_query($sql);

					if( !$res)
						die(mysql_error());

					$row = mysql_fetch_array($res);

				?>

				<div style="font-size:30pt;">

					Welcome to the <?php echo $name ?> Library

				</div>

				<br/>
				<br/>
				<br/>

				<table border="0" width="100%">

					<tr>

						<td width="50%">
							<div style="font-size:20pt;text-align:left; padding-left:15pt;">
								
								Here you can find a variety of services we provide

								<br/>
								<br/>

								<div style="font-size:18pt;text-align:left; padding-left:20pt;" >
									
								
									Feel free to contact us at : <?php echo $row['telNum']; ?>

									<br/>
									<br/>
									Or by email at : <?php echo $row['email']; ?>

									<br/>
									<br/>
									Our address is : <?php echo $row['address'] . " "; ?>

								</div>

							</div>

						</td>

						<td>
							
							<font size="6px">
							
								Or search a document Now!

							</font>

							<br/>
							<br/>

							<div align="center">

								<form action="./Document_search.php" method="post" accept-charset="utf-8">
									
									<div id="searchHelpingText"  >
									
										Title
										<input type="text" name="title" placeholder="Title" style="height:20px">

									</div>

									<div id="searchHelpingText" style="padding:0px 19px 0px 0px" >

										Author
										<input type="text" name="author" placeholder="Author" style="height:20px;">

									</div>

									<div id="searchHelpingText" style="position:relative;right:10.8%" >

										Type
										<select name="type">
											<option value="book"> Book </option>
											<option value="paper"> Paper </option>
										</select>

									</div>

									<div id="searchHelpingText" style="padding:0px 0px 0px 3px" >

										Publication date
										<select name="publicationYear">

											<option value=""></option>
											<option value="2011">2011</option>
											<option value="2014">2014</option>
											<option value="1996">1996</option>
											<option value="2010">2010</option>
											<option value="1994">1994</option>
											<option value="2001">2001</option>
											

										</select>

										<select name="publicationMonth">

											<option value=""></option>
											<option value="01">01</option>

										</select>

										<select name="publicationDay">

											<option value=""></option>
											<option value="01">01</option>

										</select>

										(yyyy-mm-dd)

									</div>

									<br/>

									<div>

										<input type="hidden" name="name" value='<?php echo $name; ?>' >
										<input type="submit" name="DocumentSearch" value="Search" id="submitBtm">

									</div>

								</form>

							</div>

						</td>

					</tr>

				</table>

			</div>
			

		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>

		</div>

		<?php require './footer.php' ?>;

	</div>

	</body>
</html>