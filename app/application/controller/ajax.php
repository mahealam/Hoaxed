<?php

/**
* Controlls all ajax calls 
*/
class Ajax extends Controller {

   	/**
     * Action: Ajax Index Action
     */
    public function index(){
        echo "You are not supposed to be here!";
        die;
    }

    /**
     * Action: Ajax Register New User Action
     */
    public function register(){
        header('Content-type: text/javascript');
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );
        $this->loadModel('UserModel');
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        $day = filter_input(INPUT_POST, 'day', FILTER_SANITIZE_STRING);
        $month = filter_input(INPUT_POST, 'month', FILTER_SANITIZE_STRING);
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $user_type = filter_input(INPUT_POST, 'user_type', FILTER_SANITIZE_STRING);
        $dob = date('Y-m-d', strtotime($year.'-'.$month.'-'.$day));

        if( $this->model->registration($firstname, $lastname, $email, $password, $dob, $gender, $city, $country, $user_type)) {
            $msg['prefix'] = 'Great!';
            $msg['content'] = 'Your account was successfully created! Please login to use our service.';
            $msg['status'] = 'success';
            echo json_encode($msg);
            die;
        } else {
            $msg['content'] =$this->model->getMsg();
            echo json_encode($msg);
            die;
        }
    }

    /**
     * Action: Ajax Login Action
     */
    public function login(){
        $this->loadModel('UserModel');
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        if( $this->model->login( $email, $password) ) {
            die;
        } else {
            $this->model->printMsg();
            die;
        }
    }

    /**
     * Action: Ajax submitUserReview Action
     */
    public function submitUserReview(){
        header('Content-type: text/javascript');
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );
        $this->loadModel('UserModel');

        $company_id = filter_input(INPUT_POST, 'company_id', FILTER_SANITIZE_STRING);
        $review = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_STRING);
        $rating = filter_input(INPUT_POST, 'rating', FILTER_DEFAULT);

        if ($this->model->isLoggedIn()) {
            $user_id  = $_SESSION['user']['user_id'];

            if($this->model->saveUserReview($user_id, $company_id, $review, $rating )) {
                $msg['prefix'] = 'Great!';
                $msg['content'] = 'Your reviews was posted successfully';
                $msg['status'] = 'success';
                echo json_encode($msg);
                die;
            } else {
                $msg['content'] =$this->model->getMsg();
                echo json_encode($msg);
                die;
            }
        } else {
            die;
        }
    }





    /**
     * Action: Ajax Register New Test Action
     */
    public function submitBusiness(){
        header('Content-type: text/javascript');
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );
        $this->loadModel('MediaManagerModel');
        $company_name = filter_input(INPUT_POST, 'company_name', FILTER_SANITIZE_STRING);
        $company_logo = filter_input(INPUT_POST, 'company_logo', FILTER_SANITIZE_STRING);
        $company_cover = filter_input(INPUT_POST, 'company_cover', FILTER_SANITIZE_STRING);
        $company_type = filter_input(INPUT_POST, 'company_type', FILTER_SANITIZE_STRING);
        $company_slogan = filter_input(INPUT_POST, 'company_slogan', FILTER_SANITIZE_STRING);
        $company_information = filter_input(INPUT_POST, 'company_information', FILTER_SANITIZE_STRING);
        $company_address = filter_input(INPUT_POST, 'company_address', FILTER_SANITIZE_STRING);
        
        
        if($this->model->addNewBusiness($company_name, $company_logo, $company_cover, $company_type, $company_slogan, $company_information, $company_address)) {
            $msg['prefix'] = 'Great!';
            $msg['content'] = 'New Business Successfully Added';
            $msg['status'] = 'success';
            echo json_encode($msg);
            die;
        } else {
            $msg['content'] =$this->model->getMsg();
            echo json_encode($msg);
            die;
        }
    }









    /**
     * Action: Ajax Pass Reset Action
     */
    public function resetPassword(){
        header('Content-type: text/javascript');
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );
        $this->loadModel('UserModel');
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $reset_code = filter_input(INPUT_POST, 'reset_code', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        
        if($this->model->resetPassword($username, $password, $reset_code)) {
            $msg['prefix'] = 'Great!';
            $msg['content'] = 'Password Successfully Updated';
            $msg['status'] = 'success';
            echo json_encode($msg);
            die;
        } else {
            $msg['content'] =$this->model->getMsg();
            echo json_encode($msg);
            die;
        }
        
    }





    /**
     * Action: Ajax Name Updater Action
     */
    public function updateName(){
        header('Content-type: text/javascript');
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );



        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
       
        if ($this->model->isLoggedIn()) {
            $userid = $_SESSION['user']['user_id'];

            if($this->model->updateName($fname, $lname, $userid)) {
                $msg['prefix'] = 'Great!';
                $msg['content'] = 'Name Successfully Updated';
                $msg['status'] = 'success';
                echo json_encode($msg);
                die;
            } else {
                $msg['content'] =$this->model->getMsg();
                echo json_encode($msg);
                die;
            }
        } else {
            die;
        }
    }



    /**
     * Action: Ajax Pass Updater Action
     */
    public function updatePassword(){
        header('Content-type: text/javascript');
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );
        $this->loadModel('UserModel');

        $oldPass = filter_input(INPUT_POST, 'oldPass', FILTER_DEFAULT);
        $newPass = filter_input(INPUT_POST, 'newPass', FILTER_DEFAULT);

        if ($this->model->isLoggedIn()) {
            $userid = $_SESSION['user']['user_id'];


            if($this->model->updatePassword($oldPass, $newPass, $userid )) {
                $msg['prefix'] = 'Great!';
                $msg['content'] = 'Password Successfully Updated';
                $msg['status'] = 'success';
                echo json_encode($msg);
                die;
            } else {
                $msg['content'] =$this->model->getMsg();
                echo json_encode($msg);
                die;
            }
        } else {
            die;
        }
    }

    /**
     * Action: Ajax Address Updater Action
     */
    public function updateAddress(){
        header('Content-type: text/javascript');
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );
        $this->loadModel('UserModel');
        $adrline1 = filter_input(INPUT_POST, 'adrline1', FILTER_SANITIZE_STRING);
        $adrline2 = filter_input(INPUT_POST, 'adrline2', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);

        if ($this->model->isLoggedIn()) {
            $userid = $_SESSION['user']['user_id'];
             if($this->model->updateAddress($adrline1, $adrline2, $city, $state, $zip, $phone, $country, $userid )) {
                $msg['prefix'] = 'Great!';
                $msg['content'] = 'Address Successfully Updated';
                $msg['status'] = 'success';
                echo json_encode($msg);
                die;
            } else {
                $msg['content'] =$this->model->getMsg();
                echo json_encode($msg);
                die;
            }
        } else {
            die;
        }
    }

    /**
     * Action: Ajax Emails Updater Action
     */
    public function updateEmail(){
        header('Content-type: text/javascript');
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );

        $this->loadModel('UserModel');
        if (!isset($_POST['primaryEmail']) && !isset($_POST['paypalEmail'])) {
            $msg['prefix'] = 'Ops!';
            $msg['content'] = 'Please provide Valid Data';
            $msg['status'] = 'error';
            echo json_encode($msg);
            die;
        }

        $primaryEmail = filter_input(INPUT_POST, 'primaryEmail', FILTER_SANITIZE_EMAIL);
        $paypalEmail = filter_input(INPUT_POST, 'paypalEmail', FILTER_SANITIZE_EMAIL);
        
        
        if ($this->model->isLoggedIn()) {
            $userid = $_SESSION['user']['user_id'];

            if($this->model->updateEmail($primaryEmail, $paypalEmail, $userid )) {
                $msg['prefix'] = 'Great!';
                $msg['content'] = 'Address Successfully Updated';
                $msg['status'] = 'success';
                echo json_encode($msg);
                die;
            } else {
                $msg['content'] =$this->model->getMsg();
                echo json_encode($msg);
                die;
            }
        } else {
            die;
        }
        
    }


    /**
     * Action: Ajax Contact Action
     */
    public function contactUs(){
        header('Content-type: text/javascript');
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );
        $this->loadModel('UserModel');
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        if( $this->model->sendMessage($name, $email, $subject, $message)) {
            $msg['prefix'] = 'Great!';
            $msg['content'] = 'Your message has been sent!';
            $msg['status'] = 'success';
            echo json_encode($msg);
            die;
        } else {
            $msg['content'] =$this->model->getMsg();
            echo json_encode($msg);
            die;
        }
    }






        /**
     * Action: Ajax Email Availability Checker Action
     */
    public function emailAvailability(){
        $this->loadModel('UserModel');
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); 
        if($this->model->checkEmail($email)){
            echo "1";
            die;
        } else {
            echo "0";
            die;
        }
    }

    /**
     * Action: Ajax Username Availability Checker Action
     */
    public function usernameAvailability(){
        $this->loadModel('UserModel'); 
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        if($this->model->checkUsername($username)){
            echo "1";
            die;
        } else {
            echo "0";
            die;
        }
    }




    /**
     * Action: Ajax submitUserComplaint Action
     */
    public function submitUserEnquiry(){
        header('Content-type: text/javascript');
        
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );
        
        $this->loadModel('UserModel');

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
        $message = filter_input(INPUT_POST, 'message', FILTER_DEFAULT);


        if ($this->model->isLoggedIn()) {
            $user_id  = $_SESSION['user']['user_id'];
            $username = $_SESSION['user']['first_name'];

            if($this->model->registerUserEnquiry($user_id, $username, $email, $subject, $message )) {
                $msg['prefix'] = 'Great!';
                $msg['content'] = 'We have received your message, We\'ll contact you shortly.';
                $msg['status'] = 'success';
                echo json_encode($msg);
                die;
            } else {
                $msg['content'] =$this->model->getMsg();
                echo json_encode($msg);
                die;
            }
        } else {
            die;
        }
    }


    /**
     * Action: Ajax Send Email
     */
    public function sendMail(){
        header('Content-type: text/javascript');
        $msg  = array(
            'prefix'  => 'Ops',
            'content' => ' ',
            'status'  => 'error'
        );
        $this->loadModel('UserModel');

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
        $message = $_POST['message'];

        


        if ($this->model->isLoggedIn()) {
            $emailObj = new Email();
            $notifier = new Notifier($emailObj);
            
            if($notifier->notify($subject, $message, array( ''.$email.'' => $username))) {
                $msg['prefix'] = 'Great!';
                $msg['content'] = 'We have received your message, We\'ll contact you shortly.';
                $msg['status'] = 'success';
                echo json_encode($msg);
                die;
            } else {
                $msg['content'] =$this->model->getMsg();
                echo json_encode($msg);
                die;
            }
        } else {
            die;
        }
    }


    

}

?>