<?php
require 'usermodel.php';


class AdminModel extends UserModel{

    public function getUsers(){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM user ORDER BY RAND() LIMIT 100');
        $stmt->execute();    
        return  $stmt->fetchAll();
    }
    
}
