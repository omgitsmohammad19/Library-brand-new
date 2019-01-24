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

	         if( document.forms["additem"]["Title"].value == "" )
	         {
	            alert( "Please provide book title!" );
	            return false;
	         }
					 if( document.forms["additem"]["Genre"].value == "" )
					{
						 alert( "Please provide book genre!" );
						 return false;
					}
					if( document.forms["additem"]["Editionname"].value == "" )
					{
						 alert( "Please provide edition!" );
						 return false;
					}

	         if( document.forms["additem"]["Num"].value == "" )
	         {
	            alert( "Please provide number of pages!" );
	            return false;
	         }
					 if( document.forms["additem"]["Num"].value < 0 )
					 {
							alert( "Please provide number of pages greater than 0!" );
							return false;
					 }
					 if( document.forms["additem"]["Publisher"].value == "" )
	         {
	            alert( "Please provide publisher name!" );
	            return false;
	         }
					 if( document.forms["additem"]["Publishingdate"].value == "" )
					 {
							alert( "Please provide publishing date!" );
							return false;
					 }
					 if( document.forms["additem"]["Publishingdate"].value < 0 )
					{
						 alert( "Please provide publishing date greater than 0!" );
						 return false;
					}
					if( document.forms["additem"]["ISBN"].value == "" )
					{
						 alert( "Please provide ISBN number!" );
						 return false;
					}
				if( document.forms["additem"]["ISBN"].value < 0 )
			 {
					alert( "Please provide ISBN number greater than 0!" );
					return false;
			 }
			 if( document.forms["additem"]["Authorname"].value == "" )
			 {
					alert( "Please provide author name!" );
					return false;
			 }


	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add book</h1></div>
	<form name="additem" action="<?php echo base_url(); ?>index.php/libraries/add_item_result" onsubmit="return validateForm()" method="post">
		Book Title: <input type="text" name="Title"><br>
		Publishing date: <input type="date" name="Publishingdate"><br>
		Number of pages: <input type="text" name="Num"><br>
		Best of collection: <input type="text" name="Bestofcollection"><br>
		Edition Number: <input type="text" name="Editionnum"><br>
		ISBN: <input type="text" name="ISBN"><br>
		Printdate: <input type="date" name="Printdate"><br>

	<?php

echo '<br>genres<br>';
	foreach ($genrelist as $genre)
		{
			echo '<input type="checkbox" name="genre[]" value="'.$genre->idGenre.'"> '.$genre->Genre.'<br>';
		}
echo '<br>authors<br>';
		foreach ($authorlist as $author)
		 {
			 echo '<input type="checkbox" name="authors[]" value="'.$author->idAuthor.'"> '.$author->AuthorName.'<br>';
		 }
echo '<br>Types<br>';
		  foreach ($formatList as $format)
		 {
			 echo '<input type="checkbox" name="format[]" value="'.$format->idBookformat.'"> '.$format->Type.'<br>';
		 }

		 echo'  <br><br><input type="submit" value="Submit">
		 </form>';


	?>

</body>
</html>
