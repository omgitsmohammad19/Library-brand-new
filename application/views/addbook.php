<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>addbooks</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["addbook"]["Title"].value == "" )
	         {
	            alert( "Please provide book title!" );
	            return false;
	         }

	         if( document.forms["addbook"]["Editionname"].value == "" )
	         {
	            alert( "Please provide book edition!" );
	            return false;
	         }

           if( document.forms["addbook"]["Authorname"].value == "" )
	         {
	            alert( "Please provide author name!" );
	            return false;
	         }

	         if( document.forms["addbook"]["Num"].value == "" )
	         {

	            alert( "Please provide book Number of pages!" );
	            return false;
	         }
           if( document.forms["addbook"]["Publisher"].value == "" )
	         {
	            alert( "Please provide book publisher!" );
	            return false;
	         }

	         if( document.forms["addbook"]["Publishingdate"].value == "" )
	         {
	            alert( "Please provide book edition!" );
	            return false;
	         }
           if( document.forms["addbook"]["ISBN"].value == "" )
	         {
	            alert( "Please provide book ISBN!" );
	            return false;
	         }

	         if( document.forms["addbook"]["Genre"].value == "" )
	         {
	            alert( "Please provide book genre!" );
	            return false;
	         }

	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add Books</h1></div>
	<form name="addbook" action="<?php echo base_url(); ?>index.php/libraries" onsubmit="return validateForm()" method="post">
	 Student Name: <input type="text" name="studentName"><br>
	 Student Age: <input type="text" name="studentAge"><br>
	 Major: <select name="studentMajor">
	<?php


		 if(isset($majorList))
		 {
			 foreach ($majorList as $major)
			 {
				 echo '<option value="'.$major->MajorID.'">'.$major->MajorName.'</option>';
			 }
		 }
		 echo '</select>';
		 echo '<br><br> Hobbies <br>';

		 foreach ($hobbyList as $hobby)
		 {
			 echo '<input type="checkbox" name="hobbies[]" value="'.$hobby->HobbyID.'"> '.$hobby->HobbyName.'<br>';
		 }

		  echo'  <input type="submit" value="Submit">
		  </form>';

	?>






</body>
</html>
