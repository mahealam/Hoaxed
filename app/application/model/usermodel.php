<?php
/**
* Secure login/registration user class.
*/

class UserModel {
    /** @var object $pdo Copy of PDO connection */
    protected $pdo;
    /** @var object of the logged in user */
    protected $user;
    /** @var string error msg */
    protected $msg;
    /** @var int number of permitted wrong login attemps */
    protected $permitedAttemps = 5;

    /**
     * @param object $db A PDO database connection
     */
    function __construct($db){
        try {
            $this->pdo = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
    * Register a new user account function
    * @param string $username User email.
    * @param string $email User email.
    * @param string $pass User password.
    * @return boolean of success.
    */

    public function registration($firstname, $lastname, $email, $password, $dob, $gender, $city, $country, $user_role){
        $pdo = $this->pdo;

        if($this->checkEmail($email)){
            $this->msg = 'This email is already in Use.';
            return false;
        }

        if(!(isset($firstname) && isset($lastname) && isset($email) && isset($password) && isset($dob)  && isset($gender) && isset($city) && isset($country) && filter_var($email, FILTER_VALIDATE_EMAIL))){
            $this->msg = 'Inesrt all requifffred fields with valid data.';
            return false;
        }
        $password = $this->hashPass($password);
        
        $stmt = $pdo->prepare('INSERT INTO user (first_name, last_name, email, password, gender, city, country, DOB, user_role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
        if($stmt->execute([$firstname, $lastname, $email, $password, $gender, $city, $country, $dob, $user_role])){
            
            //Getting new assigned user_id 
            $stmt = $pdo->prepare('SELECT user_id FROM user WHERE email = ? limit 1');
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if( $user_role == '1' )
                $stmt = $pdo->prepare('INSERT INTO admin (user_id) VALUES (?)');
            if( $user_role == '3' )
                $stmt = $pdo->prepare('INSERT INTO customer (user_id) VALUES (?)');
            if( $user_role == '2' )
                $stmt = $pdo->prepare('INSERT INTO media_manager (user_id) VALUES (?)');
            
            $stmt->execute([$user['user_id']]);


            //if($this->sendConfirmationCode($email)){
                return true;
            //}else{
            //    $this->msg = 'confirmation email sending has failed.';
                return false; 
            //}
        }else{
            $this->msg = "Couldn't Create New Account";
            return false;
        }
    }


    /**
    * Login function
    * @param string $email User email.
    * @param string $password User password.
    * @return bool Returns login success.
    */
    public function login($email, $password){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return false;
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM user WHERE email = ? limit 1');
            $stmt->execute([$email]);      
            $user = $stmt->fetch();

            if(password_verify($password, $user['password'])){
                if($user['wrong_logins'] <= $this->permitedAttemps){
                    $this->user = $user;
                    session_regenerate_id();
                    $_SESSION['user']['user_id'] = $user['user_id'];
                    $_SESSION['user']['first_name'] = $user['first_name'];
                    $_SESSION['user']['last_name'] = $user['last_name'];
                    $_SESSION['user']['email'] = $user['email'];
                    $_SESSION['user']['user_role'] = $user['user_role'];
                    //$_SESSION['user']['confirmed'] = $user['confirmed'];

                    $stmt = $pdo->prepare('UPDATE user SET wrong_logins = 0 WHERE user_id = ?');
                    $stmt->execute([$user['user_id']]);
                    return true;
                }else{
                    $this->msg = 'This user account is blocked, please contact our support department.';
                    return false;
                }
            }else{
                $this->registerWrongLoginAttemp($user['email']);
                $this->msg = 'Invalid login information or the account is not activated. '.$email.''.$password.$user['password'];
                return false;
            } 
        }
    }


    /**
    * Checks if The user is loggedin //TODO should add more security
    * returns bool
    */
    public function isLoggedIn(){
        if(isset($_SESSION['user']['user_id']) && $_SESSION['user']['user_id'] !== ''){
            return true;
        }
        else {
            return false;
        }
    }


    /**
    * Checks if The user is a Counselor
    * returns bool
    */

    public function isUserA($user_role){    
        $user_role = strtolower($user_role);
        $user_id = $_SESSION['user']['user_id'];
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM '.$user_role.' WHERE user_id = ?');
        $stmt->execute([$user_id]);
        if($stmt->rowCount()>0){
            return true;
        }else{
            $this->msg = "You're not logged in as a ".$user_role;
            return false;
        }
    }

    public function autoRedirect(){
        if($this->isUserA('customer'))
            header('Location: '.URL.'customer');
        if($this->isUserA('media_manager'))
            header('Location: '.URL.'mediamanager');
        if($this->isUserA('admin'))
            header('Location: '.URL.'admin');
    }
    

    public function getCompanies(){

        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM company ORDER BY RAND() LIMIT 20');
        $stmt->execute();    
        return  $stmt->fetchAll();
    }

    public function getCompany($company_id){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM company WHERE company_id = ?');
        $stmt->execute([$company_id]);    
        return  $stmt->fetch();
    }

    public function getReviewsByCompanyID($company_id){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM review NATURAL JOIN user WHERE company_id = ?');
        $stmt->execute([$company_id]);    
        return  $stmt->fetchAll();
    }

    public function saveUserReview($user_id, $company_id, $review, $rating ){
        
        if(isset($user_id) && isset($company_id) && isset($review) && isset($rating)){    
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('INSERT INTO review (user_id, company_id, review, rating ) VALUES (?, ?, ?, ? )');

            if($stmt->execute( [$user_id, $company_id, $review, $rating] )){
                return true;
            }else{
                $this->msg = 'Posting Review Failed!';
                return false;
            }
        }else{
            $this->msg = 'Please provide valid information!';
            return false;
        }
    }

    /**
    * Update Name of User
    * @param string firstname.
    * @param string lastname.
    * @param int $user_id.
    */
    public function updateName($firstname, $lastname, $user_id){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('UPDATE patients SET first_name = ?, last_name = ? WHERE user_id = ?');

        if($stmt->execute([$firstname, $lastname, $user_id])){
            $_SESSION['user']['first_name'] = $firstname;
            $_SESSION['user']['last_name'] = $lastname;
            return true;
        } else {
            $this->msg = 'Something went wrong!, Check your info and Try again!';
            return false;
        }
    }
  
     /**
    * Update password of User
    * @param string oldPass.
    * @param string newPass.
    * @param int $user_id.
    */
    public function updatePassword($oldPass, $newPass, $user_id){
        if(isset($oldPass) && isset($newPass) && isset($user_id)){
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT password FROM user WHERE user_id = ? limit 1');
            $stmt->execute([$user_id]);      
            $password = $stmt->fetch();
            if(password_verify($oldPass, $password['password'])){
                $pdo = $this->pdo;
                $stmt = $pdo->prepare('UPDATE user SET password = ? WHERE user_id = ?');
                if($stmt->execute( [password_hash($newPass, PASSWORD_DEFAULT), $user_id] )){
                    return true;
                }else{
                    $this->msg = 'Password change failed.';
                    return false;
                }
            } else {
                $this->msg = "Wrong password!";
            }
        }else{
            $this->msg = 'Provide valid passwords.';
            return false;
        }
    }


    /**
    * Update address of User
    * @param string $user_id.
    * @param string $city.
    * @param string $country.
    */
    public function updateAddress($user_id, $city, $country){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('UPDATE user SET city = ?, country = ? WHERE user_id = ?');
        if($stmt->execute([$user_id, $city, $country])){
            return true;
        } else {
            $this->msg = 'Something went wrong!, Check your info and Try again!';
            return false;
        }
    }

    /**
    * Update email of User
    * @param string $primaryEmail.
    * @param string $secEmail.
    * @param string $paypalEmail.
    * @param int $user_id.
    */
    public function updateEmail($email, $user_id){
        $pdo = $this->pdo;
        if($this->checkEmail($email)){
            $this->msg = 'Email is already in use';
            return false;
        } else {
            $stmt = $pdo->prepare('UPDATE user SET email = ? WHERE user_id = ?');

            if($stmt->execute([$email, $user_id])){
                 $_SESSION['user']['email'] = $email;
                return true;
            } else {
                $this->msg = 'Something went wrong!, Account Partially Updated!';
                return false;
            }
        }
    }


    /**
    * registerUserComplaint
    */
    public function registerUserEnquiry($user_id, $username, $email, $subject, $message ){
        if(isset($user_id) && isset($email) && isset($subject) && isset($message)){
            
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('INSERT INTO user_enquiries (user_id, username, email, subject, message ) VALUES (?, ?, ?, ?, ? )');
            if($stmt->execute( [$user_id, $username, $email, $subject, $message] )){

                $emailObj = new Email();
                $notifier = new Notifier($emailObj);
                $notifier->notify($subject, $message, array( ''.$email.'' => $username));
                return true;

            }else{
                $this->msg = 'Sending Message Failed!';
                return false;
            }
        }else{
            $this->msg = 'Please provide valid information!';
            return false;
        }
    }



    /**
    * Assign a role function
    * @param int $id User id.
    * @param int $role User role.
    * @return boolean of success.
    */
    public function assignRole($id,$role){
        $pdo = $this->pdo;
        if(isset($id) && isset($role)){
            $stmt = $pdo->prepare('UPDATE user SET role = ? WHERE user_id = ?');
            if($stmt->execute([$id,$role])){
                return true;
            }else{
                $this->msg = 'Role assign failed.';
                return false;
            }
        }else{
            $this->msg = 'Provide a role for this user.';
            return false;
        }
    }
    

    /**
    * Check if email is already used function
    * @param string $email User email.
    * @return boolean of success.
    */
    public function checkEmail($email){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT user_id FROM user WHERE email = ? limit 1');
        $stmt->execute([$email]);
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    /**
    * Register a wrong login attemp function
    * @param string $email User email.
    * @return void.
    */
    private function registerWrongLoginAttemp($email){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('UPDATE user SET wrong_logins = wrong_logins + 1 WHERE email = ?');
        $stmt->execute([$email]);
    }

    /**
    * Password hash function
    * @param string $password User password.
    * @return string $password Hashed password.
    */
    private function hashPass($pass){
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    /**
    * Print error msg function
    * @return void.
    */
    public function printMsg(){
        print $this->msg;
    }

    /**
    * Return msg function
    * @return $msg.
    */
    public function getMsg(){
        return $this->msg;
    }

    /**
    * Logout the user and remove it from the session.
    *
    * @return true
    */
    public function logout() {
        $_SESSION['user'] = null;
        session_regenerate_id();
        return true;
    }



    /**
    * Simple template rendering function
    * @param string $path path of the template file.
    * @return void.
    */
    public function render($path,$vars = '') {
        ob_start();
        include($path);
        return ob_get_clean();
    }

    /**
    * Template for index head function
    * @return void.
    */
    public function indexHead() {
        print $this->render(indexHead);
    }

    /**
    * Return the logged in user.
    * @return user array data
    */
    public function getUser(){
        return $this->user;
    }
}
