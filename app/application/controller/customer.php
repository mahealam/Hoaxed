<?php 

Class Customer extends Controller {

	public function index(){
		$this->loadModel('CustomerModel');
		if ($this->model->isLoggedIn() && $this->model->isUserA('Customer') ) {
				
				$companies = $this->model->getCompanies();
				$data = ['companies' => $companies];

				$this->loadView('_templates/customer.header');
				$this->loadView('customer/feed', $data);
				$this->loadView('_templates/customer.footer');
		} else {
			header('Location: '.URL.'home');
		}
	}

	public function feed(){
		$this->index();
	}


	public function company($company_id = '1'){
		$this->loadModel('CustomerModel');
		if ($this->model->isLoggedIn() && $this->model->isUserA('Customer')) {
			
			$data['company'] = $this->model->getCompany($company_id);
			$data['reviews'] = $this->model->getReviewsByCompanyID($company_id);

			$this->loadView('_templates/customer.header');
			$this->loadView('customer/company', $data);
			$this->loadView('_templates/customer.footer');		
		} else {
			header('Location: '.URL.'home');
		}
	}
	public function profile(){
		$this->loadModel('CustomerModel');
		if ($this->model->isLoggedIn()  && $this->model->isUserA('Customer')) {
			$this->loadView('_templates/customer.header');
			$this->loadView('customer/profile');
			$this->loadView('_templates/customer.footer');	
		} else {
			header('Location: '.URL.'home');
		}
	}

	public function settings(){
		$this->loadModel('CustomerModel');
		if ($this->model->isLoggedIn()  && $this->model->isUserA('Customer')) {
			$this->loadView('_templates/customer.header');
			$this->loadView('customer/settings');
			$this->loadView('_templates/customer.footer');	
		} else {
			header('Location: '.URL.'home');
		}
	}


	public function help(){
		$this->loadModel('CustomerModel');
		if ($this->model->isLoggedIn()  && $this->model->isUserA('Customer')) {
			$this->loadView('_templates/customer.header');
			$this->loadView('customer/contact');
			$this->loadView('_templates/customer.footer');		
		} else {
			header('Location: '.URL.'home');
		}
	}


	public function faq(){
		$this->loadModel('CustomerModel');
		if ($this->model->isLoggedIn()  && $this->model->isUserA('Customer')) {

			$this->loadView('_templates/customer.header');
			$this->loadView('customer/faq');
			$this->loadView('_templates/customer.footer');		
		} else {
			header('Location: '.URL.'home');
		}
	}


	public function recover(){
		$this->loadModel('CustomerModel');
		$this->loadView('_templates/account.header');
		$this->loadView('panel/recover');
		$this->loadView('_templates/account.footer');
		
	}


	public function logout(){
		$this->loadModel('CustomerModel');
		$this->model->logout();
		header('Location: '.URL.'home/index');
	}
}

?>