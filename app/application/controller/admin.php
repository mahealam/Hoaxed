<?php 

/**
* Admin Controller
*/
class Admin extends Controller {
	

	public function index(){
		$this->loadModel('AdminModel');
		if ($this->model->isLoggedIn() && $this->model->isUserA('Admin') ) {	
				$users = $this->model->getUsers();
				$data = ['users' => $users];
				$this->loadView('_templates/admin.header');
				$this->loadView('admin/users', $data);
				$this->loadView('_templates/admin.footer');
		} else {
			header('Location: '.URL.'home');
		}
	}

	public function users(){
		$this->index();
	}

	public function companies(){
		$this->loadModel('AdminModel');
		if ($this->model->isLoggedIn() && $this->model->isUserA('Admin') ) {	
				$companies = $this->model->getCompanies();
				$data = ['companies' => $companies];
				$this->loadView('_templates/admin.header');
				$this->loadView('admin/companies', $data);
				$this->loadView('_templates/admin.footer');
		} else {
			header('Location: '.URL.'home');
		}
	}




	public function company($company_id = '1'){
		$this->loadModel('AdminModel');
		if ($this->model->isLoggedIn() && $this->model->isUserA('Admin')) {
			$data['company'] = $this->model->getCompany($company_id);
			$data['reviews'] = $this->model->getReviewsByCompanyID($company_id);
			$this->loadView('_templates/admin.header');
			$this->loadView('admin/company', $data);
			$this->loadView('_templates/admin.footer');		
		} else {
			header('Location: '.URL.'home');
		}
	}

	public function enquiries(){
		$this->loadModel('AdminModel');
		if ($this->model->isLoggedIn() && $this->model->isUserA('Admin') ) {	
				//$enquiries = $this->model->getEnquiries();
				//$data = ['enquiries' => $enquiries];
			$data= 0;
			$this->loadView('_templates/admin.header');
			$this->loadView('admin/enquiries', $data);
			$this->loadView('_templates/admin.footer');
		} else {
			header('Location: '.URL.'home');
		}
	}




}