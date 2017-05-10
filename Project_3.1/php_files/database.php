<?php  
	 $success = mysql_connect(
		"localhost",
		"eamuser1",
		"13243568"
	);

	 if( ! $success )
	 	die(mysql_error());

	mysql_select_db( "eamuser1" );
?>