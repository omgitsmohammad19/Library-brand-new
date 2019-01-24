<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Searchpage</title>


</head>
<body>
	<div><h1>Search Page </h1></div>

	<form action="<?php echo base_url(); ?>index.php/libraries/search_item_by_title" method="post">
   Book Title : <input type="text" name="search"><br>
   <input type="submit" value="Search">
 </form>
 
<br><br>
 <form action="<?php echo base_url(); ?>index.php/libraries/search_author_by_name" method="post">
  Author name : <input type="text" name="search"><br>
  <input type="submit" value="Search">
 </form>
 <br><br>
 	 <a href="<?php echo base_url();?>index.php/Libraries/index">homepage</a>


</body>
</html>
