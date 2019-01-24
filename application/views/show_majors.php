<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title></title>


</head>
<body>

<div><h1>All Majors</h1></div>
<div class="divTable">
<div class="divTableHeading">
<div class="divTableRow">
<div class="divTableHead">Major ID</div>
<div class="divTableHead">Major Name</div>

</div>
</div>
<div class="divTableBody">

      <?php
			foreach ($majors as $major) {

				echo '<div class="divTableRow">';
				echo '<div class="divTableCell">'.$major->MajorID.'</div>';
				echo '<div class="divTableCell">'.$major->MajorName.'</div>';

				echo '</div>';
			}
			?>
		</div>
</div>

</body>
</html>
