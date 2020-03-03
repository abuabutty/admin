<?php
class Admin_Model extends CI_Model 
{

  function get_roles()
  {
    return $this->db->from('user_role')->get()->result();
  }

  function get_module()
  {
    return $this->db->from('module')->get()->result();
  }

  function save_role($data)
  {
      $this->db->insert('user_role',$data);
  }

  function get_role($name)
  {
      return $this->db->from('user_role')
      ->where('role_name',$name)
      ->get()
      ->result();
  }


  function save_access($data)
  {
      $this->db->insert('access_rights',$data);
  }

// Modules DataTable Section Start
   
      var $table = "module";  
      var $select_column = array("module_id", "module_name", "active_status","delete_status");  
      var $order_column = array("module_name");  
      function make_query_college()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("module_name", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('module_name', 'ASC');  
           }  
      }

      function fetch_module()
      {  
           $this->make_query_college();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  

      function get_filtered_data_college()
      {  
           $this->make_query_college();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       

      function get_all_data_college()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      } 

// Modules DataTable Section End


}