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

		<div id="content" style="text-align:center;color:white; padding-top:8%;padding-bottom:8%;">

			<div style="font-size:19pt;">
				
				<b>Browser the documents in Libraries by</b>

			</div>

			<br/>

			<form action="./php_files/Document_search_by_library.php" method="post" accept-charset="utf-8">
				
				<div id="searchHelpingText" style="position:relative;" >
				
					Title
					<input type="text" name="title" placeholder="Title" style="height:20px">

				</div>

				<div id="searchHelpingText" style="position:relative;right:10px" >

					Author
					<input type="text" name="author" placeholder="Author" style="height:20px;">

				</div>

				<div id="searchHelpingText" style="position:relative;right:5.5%" >

					Type
					<select name="type">
						<option value="book"> Book </option>
						<option value="paper"> Paper </option>
					</select>

				</div>

				<div id="searchHelpingText" style="position:relative;" >

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

				<div id = "searchHelpingText" >

					<br/>

					Φιλοσοφική
					<input type="checkbox" name="FilosophikhCheckBox" value="Φιλοσοφική">

					&nbsp;&nbsp;

					Θετικές Επιστήμες
					<input type="checkbox" name="ThetikesEpisthmesCheckBox" value="Θετικές Επιστήμες">

					&nbsp;&nbsp;

					Θεολογική
					<input type="checkbox" name="TheologikhCheckBox" value="Θεολογική">

					&nbsp;&nbsp;

					Επιστήμες Υγείας
					<input type="checkbox" name="EpisthmesYgeiasCheckBox" value="Επιστήμες Υγείας">

					&nbsp;&nbsp;

					Νομική
					<input type="checkbox" name="NomikhCheckBox" value="Νομική">

				</div>

				<br/>
				<br/>	

				<div>

					<input type="hidden" name="name" value='<?php echo $name; ?>' >
					<input type="submit" name="DocumentSearch" value="Search" id="submitBtm">

				</div>

			</form>
				
		</div>

		<?php require 'footer.php';  ?>

	</div>

	</body>
</html>