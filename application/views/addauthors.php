<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>additems</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

					if( document.forms["addauthor"]["Authorname"].value == "" )
 				 {
 						alert( "Please provide author name!" );
 						return false;
 				 }


	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add author</h1></div>
	<form name="addauthor" action="<?php echo base_url(); ?>index.php/libraries/add_author_result" onsubmit="return validateForm()" method="post">
		Author Name: <input type="text" name="Authorname"><br>


	<?php



	?>

</body>
</html>
