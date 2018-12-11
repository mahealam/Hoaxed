<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */


    public function index(){

        $this->loadModel("UserModel");
        if($this->model->isLoggedIn()){
            $this->model->autoRedirect();
        } else {
            //load views
            require APP . 'view/_templates/home.header.php';
            require APP . 'view/home/index.php';
            require APP . 'view/_templates/home.footer.php';
        }
    }

    public function newsfeed(){

        $this->loadModel("UserModel");
        if(!$this->model->isLoggedIn()){
            $this->model->autoRedirect();
        } else {
            //load views
            require APP . 'view/_templates/home.header.php';
            require APP . 'view/customer/company';
            require APP . 'view/_templates/home.footer.php';
        }
        
    }


    public function terms_conditions(){

        $this->loadModel("UserModel");
        //load views
        require APP . 'view/_templates/home.header.php';
        require APP . 'view/home/terms_conditions.php';
        require APP . 'view/_templates/home.footer.php';
        
    }


    public function contact(){
        //load views
        require APP . 'view/_templates/home.header.php';
        require APP . 'view/home/contact.php';
        require APP . 'view/_templates/home.footer.php';
        
    }



    //This block of code should be deleted after the installation
    public function firsttime(){
        //load views
        require APP . 'view/_templates/home.header.php';
        require APP . 'view/home/firsttime.php';
        require APP . 'view/_templates/home.footer.php';
        
    }


    public function logout(){
        $this->loadModel('CustomerModel');
        $this->model->logout();
        header('Location: '.URL.'home/index');
    }


    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    /*public function exampleOne(){

        $this->loadModel('UserModel');
        //$this->model->mandrillSend();
        // load views
        //require APP . 'view/_templates/header.php';
        $this->loadView('home/example_one');
        //require APP . 'view/home/example_one.php';
        //require APP . 'view/_templates/footer.php';
    }*/

}
