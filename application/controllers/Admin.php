<?php
class Admin extends CI_Controller 
{
	public function __construct()
	{
	
		parent::__construct();

		$this->load->database();

		$this->load->helper(array('form', 'url','html'));

		$this->load->model('Admin_Model');

		$this->load->library('session');

		$this->load->library('form_validation');

		$this->load->library(array('encryption','Layouts'));

		$this->load->library('pagination');

		// if($this->session->userdata('loggedin') != TRUE)
		// {
		// 	redirect('login');
		// }
	
	}


	public function index()
	{
		$this->layouts->set_title('Dashborad');
		$this->layouts->view('pages/dashboard');
	}

	public function modules()
	{
		$this->layouts->set_title('Module Table');
		$this->layouts->view('pages/module_table');
	}

	public function fetch_modules()
	{
		$fetch_data = $this->Admin_Model->fetch_module();  
           $data = array();  
           $i=1;
           foreach($fetch_data as $row)  
           {  
                $sub_array = array(); 
                $sub_array[] = $i;   
                $sub_array[] = $row->module_name;

                if($row->active_status == 0)
                {
                	$sub_array[] = "Active";
                }
                else
                {
                	$sub_array[] = "In-Active"; 
                }
                 
                $sub_array[] = '<div align="center"><a href ="edit_college_form?college_id='.$row->module_id.'" type="submit" name="update" id="'.$row->module_id.'" class="update" value=""><i class="fas fa-edit"></i></a>&nbsp&nbsp
                				<a href ="delete_college?id='.$row->module_id.'" type="submit" name="delete" id="'.$row->module_id.'" class="update" ><i class="fa fa-trash"></a></div>';   
                $data[] = $sub_array;  
                $i++;
                
           }  
           $output = array(  
                "draw"                  =>     intval($_POST["draw"]),  
                "recordsTotal"          =>     $this->Admin_Model->get_all_data_college(),  
                "recordsFiltered"     	=>     $this->Admin_Model->get_filtered_data_college(),  
                "data"                  =>     $data  
           );  
           echo json_encode($output);
	}

	public function createrole()
	{
		$data['modules'] = $this->Admin_Model->get_module();

		$this->layouts->set_title('Create Role');
		$this->layouts->view('pages/createrole',$data);
	}


	public function save_role()
	{
		// $this->Admin_Model->save_role(['role_name'=>$this->input->post('rolename'),'role_active_status'=>0,'role_delete_status'=>0]);
		$data = $this->Admin_Model->get_role($this->input->post('rolename'));
		
		$role_id = $data[0]->role_id;

		$modules = $this->input->post('module');
		
		for($i=0; $i<count($modules); $i++)
		{
			// $this->Admin_Model->save_access([
			// 	'role_id' => $role_id,
			// 	'module_id' => $this->input->post('module['.$i.']')
			// ]);

			echo $this->input->post('module['.$i.']');
			echo '<br>';
		}

	}

	
	



}