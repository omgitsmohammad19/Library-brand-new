<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class account_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function login($username, $userpassword)
  {
    $sql = "select * from useraccount where username ='$username' AND password ='$userpassword'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)
    {
      return true;
    }
    else {
      return 0;
    }
  }

}
