<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class author_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }


  function searchauthorbyname($search) {
    $sql = "select item.Title,item.Bestofcollection,item.Num,item.Publishingdate,edition.Edition,edition.Printdate,edition.ISBN,
    author.Authorname,genre.Genre, bookformat.Type
     from ((((item inner join author_has_item on item.idItem = author_has_item.Item_idItem)
      inner join author on author_has_item.Author_idAuthor = author.idAuthor)
            inner join edition on item.idItem = edition.Item_idItem)
         inner join item_has_bookformat on item.idItem = item_has_bookformat.Item_idItem)
          inner join bookformat on item_has_bookformat.BookFormat_idBookformat = bookformat.idBookformat
          inner join genre_has_item on item.idItem = genre_has_item.Item_idItem
          inner join genre on genre_has_item.Genre_idGenre = genre.idGenre
      where author.Authorname = '$search'";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $y) {
      $results[] = $y;
    }
    return $results;
  }


}
