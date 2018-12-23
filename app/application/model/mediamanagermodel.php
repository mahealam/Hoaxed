<?php
require 'usermodel.php';


class MediaManagerModel extends UserModel{
	
	public function addNewBusiness($company_name, $company_logo, $company_cover, $company_type, $company_slogan, $company_information, $company_address){

        if(isset($company_name) && isset($company_type) && isset($company_slogan) && isset($company_information) && isset($company_address)){ 
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('INSERT INTO company(company_name, company_logo, company_cover, company_type, company_slogan, company_information, company_address) VALUES (?, ?, ?, ?, ?, ?, ? )');
            if($stmt->execute( [$company_name, $company_logo, $company_cover, $company_type, $company_slogan, $company_information, $company_address] )){
                return true;
            }else{
                $this->msg = 'Adding new business failed';
                return false;
            }
        }else{
            $this->msg = 'Please provide valid information!';
            return false;
        }
    }
    public function getMyCompanies(){

        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM company WHERE user_id = ?');
        $stmt->execute([$_SESSION['user']['user_id']]);    
        return  $stmt->fetchAll();
    }

}
