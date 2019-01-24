<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class major_model extends CI_Model {


function __construct() {
  parent::__construct();
}

function get_all_majors () {
  $sql = "select * from major";
  $query = $this->db-> query($sql);
  $results = array();
  foreach ($query->result() as $result) {
    $results[] = $result;
  }
  return $results;
}
}
?>
