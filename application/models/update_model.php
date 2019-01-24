<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class update_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  function edit_item() {
  $id = $this->input->post("idItem");
  $Title = $this->input->post("Title");
  $Num = $this->input->post("Num");
  $publishdate = $this->input->post("Publishingdate");
  $Bestofcollection = $this->input->post("Bestofcollection");



  $sql = "update item
  set Title='$Title',
  Num=$Num,
  Publishingdate='$publishdate',
  Bestofcollection='$Bestofcollection'
  where idItem=$id";
  $query = $this->db->query($sql);

  $ISBN = $this->input->post("ISBN");
  $Editionnum = $this->input->post("Editionnum");
  $printdate = $this->input->post("Printdate");

  $sql = "update edition
  set
  ISBN=$ISBN,
  Editionnum=$Editionnum,
  Printdate='$printdate'
  where item_idItem=$id";
  $query = $this->db->query($sql);


  $sql = "delete from author_has_item where item_idItem = $id";
  $query = $this->db->query($sql);

  $authors = $this->input->post("authors");
  if(!isset($authors))
  {
    return 1;
  }
  foreach($authors as $authors)
  {

    $data = array(
            'item_idItem' => $id,
            'Author_idAuthor' => $authors,
    );
    $this->db->insert('author_has_item', $data);
  }

  $sql = "delete from genre_has_item where item_idItem = $id";
  $query = $this->db->query($sql);

  $genre = $this->input->post("genre");
  if(!isset($genre))
  {
    return 1;
  }
  foreach($genre as $genre)
  {
    $data = array(
            'item_idItem' => $id,
            'Genre_idGenre' => $genre,
    );
    $this->db->insert('genre_has_item', $data);
  }


  $sql = "delete from item_has_bookformat where item_idItem = $id";
  $query = $this->db->query($sql);

  $format = $this->input->post("format");
  if(!isset($format))
  {
    return 1;
  }
  foreach($format as $format)
  {
    $data = array(
            'Item_idItem' => $id,
            'BookFormat_idBookformat' => $format,
    );
    $this->db->insert('item_has_bookformat', $data);
  }


  return 1;
}

function getgenrebyID($id)
  {
    $sql = "select * from genre_has_item where item_idItem=$id";
      $query = $this->db->query($sql);
        $results = array();
        foreach ($query->result() as $result) {
          $results[] = $result;
        }
        return $results;
      }

      function getbookformatbyID($id)
        {
          $sql = "select * from item_has_bookformat where item_idItem=$id";
            $query = $this->db->query($sql);
              $results = array();
              foreach ($query->result() as $result) {
                $results[] = $result;
              }
              return $results;
            }

  function getitembyID($id)
  {
    $sql = "select * from item inner join edition on item.idItem = edition.Item_idItem where idItem=$id";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function getauthorbyID($id)
      {
        $sql = "select * from author_has_item where Item_idItem=$id";
          $query = $this->db->query($sql);
            $results = array();
            foreach ($query->result() as $result) {
              $results[] = $result;
            }
            return $results;
          }
}
