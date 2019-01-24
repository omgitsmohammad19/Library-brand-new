<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class libraries extends CI_Controller {

        public function __construct()
        {
          parent ::__construct();
          $this->load->model('items_model');
          $this->load->model('author_model');
          $this->load->model('account_model');
          $this->load->model('update_model');
          $this->load->helper('url');
        }


        public function additems()
        {

          $result = $this->items_model->getgenres();
          $data = array();
          $data['genrelist'] = $result;
          $result = $this->items_model->getauthors();
          $data['authorlist'] = $result;
          $result = $this->items_model->getformats();
          $data['formatList'] = $result;
          $this->load->view('additems',$data);
        }

        public function add_item_result()
  	{
  		if($this->input->post("Title") || $this->input->post("Publishingdate")
  		 || $this->input->post("Num")|| $this->input->post("Bestofcollection")
  		|| $this->input->post("Editionnum")|| $this->input->post("ISBN")
  		|| $this->input->post("Printdate")
  		|| $this->input->post("BookFormat_idBookformat")|| $this->input->post("Author_idAuthor")
  		|| $this->input->post("Genre_idGenre")|| $this->input->post("idItem"))
  		{
  			$result = $this->items_model->additem();
  			$data = array();
  			$data['result'] = $result;
  			$this->load->view('add_item_result',$data);
  		}
  	}


    public function edititem($id)
            	{
            		$result = $this->items_model->getauthors();
            		$data = array();
            		$data['authorslist'] = $result;
            		$result = $this->items_model->getgenres();
            		$data['genrelist'] = $result;
            		$result = $this->items_model->getformats();
            		$data['formatlist'] = $result;
            		$result = $this->update_model->getitembyID($id);
            		$data['item'] = array_pop($result);
            		$result = $this->update_model->getauthorbyID($id);
            		$data['author_has_item'] = $result;
            		$result = $this->update_model->getbookformatbyID($id);
            		$data['item_has_bookformat'] = $result;
            		$result = $this->update_model->getgenrebyID($id);
            		$data['genre_has_item'] = $result;
            		$this->load->view('edititem',$data);
            	}
            	public function edit_item_result()
            	{
                if($this->input->post("Title") || $this->input->post("Publishingdate")
            		 || $this->input->post("Num")|| $this->input->post("Bestofcollection")
            		|| $this->input->post("Editionnum")|| $this->input->post("ISBN")
            		|| $this->input->post("Printdate")
            		|| $this->input->post("BookFormat_idBookformat")|| $this->input->post("Author_idAuthor")
            		|| $this->input->post("Genre_idGenre")|| $this->input->post("idItem"))
            		{
            			$result = $this->update_model->edit_item();
            			$data = array();
            			$data['result'] = $result;
            			$this->load->view('edit_item_result',$data);
            		}
            	}



        public function index()
        {
            $this->load->view('Welcomepage');
        }

        public function adminpage()
        {
            $this->load->view('adminpage');
        }

          public function login()
          {
            $this->load->view('login');
          }

          public function loginrequest()
          {

            $result = $this->account_model->login($this->input->post("username"),$this->input->post("password"));

            if($result!=0)
            {

              $this->session->set_userdata('isuserloggedin', 'true');

              redirect('/libraries/adminpage');
          }
            else
            {

              echo "wrong username or password";
            }
          }


          public function logout()
          {
            $this->session->unset_userdata('isuserloggedin');
            $this->session->unset_userdata('userrole');
            redirect('/libraries');
          }
        public function searchpage()
        {
            $this->load->view('searchpage');
        }
       public function delete_book($id)
        {
          $result=$this->items_model->deletebook($id);
           echo "doen deleted";
           redirect('/libraries/deletebookresult');
        }
        public function deletebookresult ()
      {
        $this->load->view('deletebookresult');
      }

      public function view_items ()
    {
      $this->load->view('show_items');
    }
        public function view_authors()
        {
            $this->load->view('show_authors');
        }
        public function showallitemsadmin()
      	{
      		$all_items = $this->items_model->get_all_items();
          $data = array();
          $data['item'] = $all_items;

      		$this->load->view('allitemsadmin',$data);
      	}
        public function showallitems()
        {
          $all_items = $this->items_model->get_all_items();
          $data = array();
          $data['item'] = $all_items;

          $this->load->view('allitems',$data);
        }


        public function search_item_by_title()
        {
          if($this->input->post("search"))
          {
            $result = $this->items_model->searchItemByTitle($this->input->post("search"));
            $data = array();
            $data['item'] = $result;
            $this->load->view('show_items',$data);
          }
          else
          {
            $this->load->view('show_items');
          }


        }
         public function search_author_by_name()
          {
            if($this->input->post("search"))
            {
              $result = $this->items_model->searchauthorbyname($this->input->post("search"));
              $data = array();
              $data['author'] = $result;
              $this->load->view('show_authors',$data);
            }
            else
            {
              $this->load->view('show_authors');
            }

          }


}
