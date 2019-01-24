<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
 <title>allitems</title>


</head>
<body>
  <div><h1>All Books</h1></div>
  <div class="divTable">
  <div class="divTableHeading">
  <div class="divTableRow">
  <div class="divTableHead">Book Title</div>
  <div class="divTableHead">Author</div>
  <div class="divTableHead">Genre</div>
  <div class="divTableHead">Publishing date</div>
  <div class="divTableHead">Edition</div>
  <div class="divTableHead">Number of pages</div>
  <div class="divTableHead">Print date</div>
  <div class="divTableHead">ISBN</div>
  <div class="divTableHead">Format</div>
  <div class="divTableHead">best of collection</div>
  <div class="divTableHead">Action</div>
  <div class="divTableHead">Delete</div>
  </div>
</div>
  <div class="divTableBody">

<?php
        foreach ($item as $x) {

          echo '<div class="divTableRow">';
          echo '<div class="divTableCell">'.$x->Title.'</div>';
          echo '<div class="divTableCell">'.$x->Authorname.'</div>';
          echo '<div class="divTableCell">'.$x->Genre.'</div>';
          echo '<div class="divTableCell">'.$x->Publishingdate.'</div>';
          echo '<div class="divTableCell">'.$x->Editionnum.'</div>';
          echo '<div class="divTableCell">'.$x->Num.'</div>';
          echo '<div class="divTableCell">'.$x->Printdate.'</div>';
          echo '<div class="divTableCell">'.$x->ISBN.'</div>';
          echo '<div class="divTableCell">'.$x->Type.'</div>';
          echo '<div class="divTableCell">'.$x->Bestofcollection.'</div>';
      		echo '<div class="divTableCell"><a href="'. base_url().'index.php/libraries/edititem/'.$x->idItem.'">Edit</a></div>';
          echo '<div class="divTableCell"><a href="'. base_url().'index.php/libraries/delete_book/'.$x->idItem.'">Delete</a></div>';
          echo '</div>';
        }
        ?>
      </div>
      <br><br>	 <a href="<?php echo base_url();?>index.php/Libraries/index">homepage</a>
</div>

</body>
</html>
