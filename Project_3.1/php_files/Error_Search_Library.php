<!DOCTYPE html>
<html>
	<head>

	 	<meta charset="utf-8"> <!-- για να καταλαβαίνει ελληνικούς χαρακτήρες ο browser -->

	 	<link rel="stylesheet" type="text/css" href="../css_files/libraries.css"/>

		<title> Search Library </title>

	</head>

	<body>

		<div id="container">

		<?php include "./header.php"; ?>

		<?php require "./menu.php"; ?>

		<div id="content" style="width:80%">

			<table style=" width:100%;height:auto;" border="0">
					<tr>
						<td align="center">
							
							<div style="padding-top:90pt">
								<font face="Times New Roman" size="9" color="#FFFFFF">
								
									Search Libraries by

								</font>

							</div>

							<br/>

							<div>

								<form action="./Libraries_search.php" method="post" accept-charset="utf-8">
									
									<table style="padding-right:43px;width:50%;height:30%;align:center" border="0">
										<tr>
											<td style="text-align:right;padding-right:110px;">
										
									<div id="searchHelpingText">
										
										Name
										<input type="text" name="libName" placeholder="name" style="height:20px;">

									</div>

									<div id="searchHelpingText" style="padding:0px 0px 0px 0px" >

										Address
										<input type="text" name="libAddress" placeholder="address" style="height:20px;">

									</div>

									<div id="searchHelpingText" style="padding:0px 0px 0px 0px" >

										Telephone
										<input type="text" name="libTelephone" placeholder="telephone" style="height:20px;">

									</div>

									<div id="searchHelpingText" >

										Email
										<input type="text" name="libEmail" placeholder="email" style="height:20px;">

									</div>

									<div id="searchHelpingText" style="padding:0px 0px 0px 0px" >

										Website
										<input type="text" name="libWebsite" placeholder="website" style="height:20px;">

									</div>

									<div id="searchHelpingText" style="padding:0px 0px 0px 0px" >

										Department
										<input type="text" name="libDepartment" placeholder="department" style="height:20px;">

									</div>

									<br/>

										</td>
										</tr>
									</table>

									<br/>
									

									<font size="5pt" color="white"> 

										Please fill at least one search text 
									</font>

									<br/>
									<br/>

									<div style="padding-left:20px;">
										
										<input type="submit" name="LibrarySearch" value="Search" id="submitBtm">

									</div>

								</form>

							</div>

						</td>
					</tr>
			</table>

		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>


		</div>

		<?php require './footer.php'; ?>


	</body>
</html>