<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>

<form>
&nbsp; &nbsp; &nbsp;  Homepage &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong><mark>Welcome to our library</mark></strong> &nbsp; &nbsp; &nbsp; &nbsp;

<a href="<?php echo base_url();?>index.php/Libraries/login">login(admin)</a>



<br><br><br><br>&nbsp; &nbsp; &nbsp;
<a href="<?php echo base_url();?>index.php/Libraries/searchpage">Search Page</a><br>
<br><br><br>
&nbsp; &nbsp; &nbsp;<a href="<?php echo base_url();?>index.php/Libraries/showallitems">All Books</a><br>

<img src="https://www.google.com.tr/search?q=library&client=opera&hs=Snp&source=lnms&tbm=isch&sa=X&ved=0ahUKEwj3lNCUzYPfAhWhposKHalWBYAQ_AUIDigB&biw=1880&bih=939#imgrc=bcm9lAnCWtiCRM: (1).jpg" width="400" height="250" alt=""/>

<form id="form1" name="form1" method="post">
  &nbsp;
</form>
</img> <br>
</body>
</html>
