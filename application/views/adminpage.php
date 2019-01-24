<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>adminpage</title>


</head>
<body>
	<div><h1>Administration page</h1></div>

	<brf>&nbsp; &nbsp; &nbsp;
	<a href="<?php echo base_url();?>index.php/Libraries/additems">Add Book</a>

 </form>

<br><br>
&nbsp; &nbsp; &nbsp;<a href="<?php echo base_url();?>index.php/Libraries/showallitemsadmin">Edit Book</a><br>
   <br><br>&nbsp; &nbsp; &nbsp; <a href="<?php echo base_url();?>index.php/libraries/logout">logout</a>

</body>
</html>
