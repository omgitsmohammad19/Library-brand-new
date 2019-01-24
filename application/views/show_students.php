<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Students</title>


</head>
<body>

<div><h1>All Students</h1></div>
<div class="divTable">
<div class="divTableHeading">
<div class="divTableRow">
<div class="divTableHead">Student Name</div>
<div class="divTableHead">Student Age</div>
<div class="divTableHead">Student Major</div>
</div>
</div>
<div class="divTableBody">

      <?php
			foreach ($students as $student) {

				echo '<div class="divTableRow">';
				echo '<div class="divTableCell">'.$student->StudentName.'</div>';
				echo '<div class="divTableCell">'.$student->StudentAge.'</div>';
				echo '<div class="divTableCell">'.$student->MajorName.'</div>';
				echo '</div>';
			}
			?>
		</div>
</div>

</body>
</html>
