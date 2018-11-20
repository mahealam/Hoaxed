<?php 

Class MediaManager extends Controller {

	public function index(){
		$this->loadModel('MediaManagerModel');
			
		if ($this->model->isLoggedIn() && $this->model->isUserA('Media_Manager')) {
			$companies = $this->model->getCompanies();
			$data = ['companies' => $companies];
			$this->loadView('_templates/mediamanager.header');
			$this->loadView('mediamanager/index', $data);
			$this->loadView('_templates/mediamanager.footer');
			
		} else {
			header('Location: '.URL.'home/index');
		}
	}

	public function nearby(){
		$this->index();
	}

	public function mycompany(){
		$this->loadModel('MediaManagerModel');
			
		if ($this->model->isLoggedIn() && $this->model->isUserA('Media_Manager')) {
			$companies = $this->model->getMyCompanies();
			$data = ['companies' => $companies];
			$this->loadView('_templates/mediamanager.header');
			$this->loadView('mediamanager/mycompany', $data);
			$this->loadView('_templates/mediamanager.footer');
			
		} else {
			header('Location: '.URL.'home/index');
		}
	}


	public function company($company_id = '1'){
		$this->loadModel('MediaManagerModel');

		if ($this->model->isLoggedIn() && $this->model->isUserA('Media_Manager')) {
			
			$data['company'] = $this->model->getCompany($company_id);
			$data['reviews'] = $this->model->getReviewsByCompanyID($company_id);

			$this->loadView('_templates/customer.header');
			$this->loadView('mediamanager/company', $data);
			$this->loadView('_templates/customer.footer');		
		} else {
			header('Location: '.URL.'home/index');
		}
	}


	public function addNewCompany(){
		$this->loadModel('MediaManagerModel');
		if ($this->model->isLoggedIn() && $this->model->isUserA('Media_Manager')) {
			$this->loadView('_templates/mediaManager.header');
			$this->loadView('mediaManager/addcompany');
			$this->loadView('_templates/mediamanager.footer');		
		} else {
			header('Location: '.URL.'home/index');
		}
	}

	public function settings(){
		$this->loadModel('MediaManagerModel');
		if ($this->model->isLoggedIn()) {
			$address = $this->model->getAddress($_SESSION['user']['user_id']);
			$this->loadView('_templates/mediamanager.header');
			$this->loadView('mediamanaer/settings', $address);
			$this->loadView('_templates/mediamanager.footer');		
		} else {
			header('Location: '.URL.'home/index');
		}
	}



	public function logout(){
		$this->loadModel('MediaManagerModel');
		$this->model->logout();
		header('Location: '.URL.'home/index');
	}
}

?>