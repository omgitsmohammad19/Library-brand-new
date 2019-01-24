<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class student_model extends CI_Model {


function __construct() {
  parent::__construct();
}

function get_all_students () {
  $sql = "select * from student inner join
  major on student.studentMajor = major.majorID";
  $query = $this->db-> query($sql);
  $results = array();
  foreach ($query->result() as $result) {
    $results[] = $result;
  }
  return $results;
}
}
?>
