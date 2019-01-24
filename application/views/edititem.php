<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>edititems</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["edititem"]["Title"].value == "" )
	         {
	            alert( "Please provide book title!" );
	            return false;
	         }
					 if( document.forms["edititem"]["Genre"].value == "" )
					{
						 alert( "Please provide book genre!" );
						 return false;
					}
					if( document.forms["edititem"]["Editionnum"].value == "" )
					{
						 alert( "Please provide edition!" );
						 return false;
					}

	         if( document.forms["edititem"]["Num"].value == "" )
	         {
	            alert( "Please provide number of pages!" );
	            return false;
	         }
					 if( document.forms["edititem"]["Num"].value < 0 )
					 {
							alert( "Please provide number of pages greater than 0!" );
							return false;
					 }
					 if( document.forms["edititem"]["Publisher"].value == "" )
	         {
	            alert( "Please provide publisher name!" );
	            return false;
	         }
					 if( document.forms["edititem"]["Publishingdate"].value == "" )
					 {
							alert( "Please provide publishing date!" );
							return false;
					 }
					 if( document.forms["edititem"]["Publishingdate"].value < 0 )
					{
						 alert( "Please provide publishing date greater than 0!" );
						 return false;
					}
					if( document.forms["edititem"]["ISBN"].value == "" )
					{
						 alert( "Please provide ISBN number!" );
						 return false;
					}
				if( document.forms["edititem"]["ISBN"].value < 0 )
			 {
					alert( "Please provide ISBN number greater than 0!" );
					return false;
			 }
			 if( document.forms["edititem"]["Authorname"].value == "" )
			 {
					alert( "Please provide author name!" );
					return false;
			 }


	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Edit book</h1></div>
	<form name="updatebook" action="<?php echo base_url(); ?>index.php/libraries/edit_item_result" onsubmit="return validateForm()" method="post">
		Book Title: <input type="text" name="Title"  value="<?php echo $item->Title ?>" ><br>
		Publishing date: <input type="date" name="Publishingdate"  value="<?php echo $item->Publishingdate ?>"><br>
		Number of pages: <input type="text" name="Num" value="<?php echo $item->Num ?>"><br>
		Bestofcollection: <input type="text" name="Bestofcollection" value="<?php echo $item->Bestofcollection ?>"><br>
		Edition: <input type="text" name="Editionnum" value="<?php echo $item->Editionnum ?>"><br>
		ISBN number: <input type="text" name="ISBN" value="<?php echo $item->ISBN ?>"><br>
		Printdate: <input type="date" name="Printdate" value="<?php echo $item->Printdate ?>"><br>

		<?php

		echo "Genres<br>";
			foreach ($genrelist as $genre)
				 {
					 $isthere = 0;
					 foreach($genre_has_item as $selected)
					 {
						 if($genre->idGenre == $selected->Genre_idGenre)
						 {
							 $isthere = 1;
							 break;
						 }
					 }
					 if($isthere == 1)
					 {
						 echo '<input checked type="checkbox" name="genre[]" value="'.$genre->idGenre.'"> '.$genre->Genre.'<br>';
					 }
					 else
					 {
						 echo '<input type="checkbox" name="genre[]" value="'.$genre->idGenre.'"> '.$genre->Genre.'<br>';
					 }
				 }
			echo "Authors<br>";
			  foreach ($authorslist as $author)
			 		 {
			 			 $isthere = 0;
			 			 foreach($author_has_item as $selected)
			 			 {
			 				 if($author->idAuthor == $selected->Author_idAuthor)
			 				 {
			 					 $isthere = 1;
			 					 break;
			 				 }
			 			 }
			 			 if($isthere == 1)
			 			 {
			 				 echo '<input checked type="checkbox" name="authors[]" value="'.$author->idAuthor.'"> '.$author->AuthorName.'<br>';
			 			 }
			 			 else
			 			 {
			 				 echo '<input type="checkbox" name="authors[]" value="'.$author->idAuthor.'"> '.$author->AuthorName.'<br>';
			 			 }
			 		 }
					 echo "Formats<br>";
						foreach ($formatlist as $bookformat)
							 {
								 $isthere = 0;
								 foreach($item_has_bookformat as $selected)
								 {
									 if($bookformat->idBookformat == $selected->BookFormat_idBookformat)
									 {
										 $isthere = 1;
										 break;
									 }
								 }
								 if($isthere == 1)
								 {
									 echo '<input checked type="checkbox" name="format[]" value="'.$bookformat->idBookformat.'"> '.$bookformat->Type.'<br>';
								 }
								 else
								 {
									 echo '<input type="checkbox" name="format[]" value="'.$bookformat->idBookformat.'"> '.$bookformat->Type.'<br>';
								 }
							 }

				 echo'  <input type="hidden" name="idItem" value="'.$item->idItem.'">
			 <br><br><input type="submit" value="Submit">
			 </form>';


		?>

</body>
</html>
