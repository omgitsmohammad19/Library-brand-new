<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class items_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function SearchItembyTitle($search) {
    $sql = "select item.Title,item.Bestofcollection,item.Num,item.Publishingdate,edition.Editionnum,edition.Printdate,edition.ISBN,
    author.Authorname,genre.Genre, bookformat.Type
     from ((((item inner join author_has_item on item.idItem = author_has_item.Item_idItem)
      inner join author on author_has_item.Author_idAuthor = author.idAuthor)
            inner join edition on item.idItem = edition.Item_idItem)
         inner join item_has_bookformat on item.idItem = item_has_bookformat.Item_idItem)
          inner join bookformat on item_has_bookformat.BookFormat_idBookformat = bookformat.idBookformat
          inner join genre_has_item on item.idItem = genre_has_item.Item_idItem
          inner join genre on genre_has_item.Genre_idGenre = genre.idGenre
      where item.Title = '$search'";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $X ) {
      $results[] = $X;
    }
    return $results;
}
function searchauthorbyname($search) {
  $sql = "select item.Title,item.Bestofcollection,item.Num,item.Publishingdate,edition.Editionnum,edition.Printdate,edition.ISBN,
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
  foreach ($query->result() as $X ) {
    $results[] = $X;
  }
  return $results;
}

function get_all_items() {
  $sql = "select item.idItem, item.Title,item.Bestofcollection,item.Num,item.Publishingdate,edition.Editionnum,edition.Printdate,edition.ISBN,
  author.Authorname,genre.Genre, bookformat.Type
   from ((((item inner join author_has_item on item.idItem = author_has_item.Item_idItem)
    inner join author on author_has_item.Author_idAuthor = author.idAuthor)
          inner join edition on item.idItem = edition.Item_idItem)
       inner join item_has_bookformat on item.idItem = item_has_bookformat.Item_idItem)
        inner join bookformat on item_has_bookformat.BookFormat_idBookformat = bookformat.idBookformat
        inner join genre_has_item on item.idItem = genre_has_item.Item_idItem
        inner join genre on genre_has_item.Genre_idGenre = genre.idGenre
  ";
  $query = $this->db->query($sql);
  $results = array();
  foreach ($query->result() as $X ) {
    $results[] = $X;
  }
  return $results;
}

function getformats() {
  $sql = "select * from bookformat";
  $query = $this->db->query($sql);
  $results = array();
  foreach ($query->result() as $result) {
    $results[] = $result;
  }
  return $results;
}
function getgenres() {
  $sql = "select * from genre";
  $query = $this->db->query($sql);
  $results = array();
  foreach ($query->result() as $result) {
    $results[] = $result;
  }
  return $results;
}
function getauthors() {
  $sql = "select * from author";
  $query = $this->db->query($sql);
  $results = array();
  foreach ($query->result() as $result) {
    $results[] = $result;
  }
  return $results;
}


function additem() {
  $data = array(
          'Title' => $this->input->post("Title"),
          'Publishingdate' => $this->input->post("Publishingdate"),
          'Num' => $this->input->post("Num"),
          'Bestofcollection' => $this->input->post("Bestofcollection")


  );
  $this->db->insert('item', $data);

  $lastitmeid = $this->db->insert_id();

  $ISBN = $this->input->post("ISBN");
  $Edition = $this->input->post("Editionnum");
  $Printdate = $this->input->post("Printdate");
  $idItem = $lastitmeid;

   $sql = "insert into edition (ISBN, Editionnum, Printdate, Item_idItem) values ($ISBN, $Edition, '$Printdate', $idItem)";

 $query = $this->db->query($sql);

  $genre = $this->input->post("genre");
  foreach($genre as $genre)
  {
    $data = array(
            'Item_idItem' => $lastitmeid,
            'Genre_idGenre' => $genre,
    );
    $this->db->insert('genre_has_item', $data);
  }

  $authors = $this->input->post("authors");

  foreach($authors as $authors)
  {
    $data = array(
            'Item_idItem' => $lastitmeid,
            'Author_idAuthor' => $authors,
    );
    $this->db->insert('author_has_item', $data);
  }

  $format = $this->input->post("format");
  foreach($format as $format)
  {
    $data = array(
            'Item_idItem' => $lastitmeid,
            'BookFormat_idBookformat' => $format,
    );
    $this->db->insert('item_has_bookformat', $data);
  }

  return 1;
}

 function deletebook($id)
{
  $sql = "delete from edition WHERE item_idItem = $id";
  $query = $this->db->query($sql);
  return 1;
}










}
