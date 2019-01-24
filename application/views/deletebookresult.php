<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>edititemresult</title>


</head>
<body>
	<div><h1>Delete book</h1></div>
	<h3>Book Deleted Successfully!</h3>


<br><br><br> <a href="<?php echo base_url();?>index.php/Libraries/adminpage">Admin page</a>


</body>
</html>
