<?php
declare(strict_types=1);
session_start();

require '../../model/usermodel.php';

use PHPUnit\Framework\TestCase;

final class UserModelTest extends TestCase{
    
    /*
    public function testCanRegisterWithValidData(): void{
        $user = new UserModel(new PDO('mysql:host=localhost;dbname=hoaxed','root', ''));
        $this->assertTrue( $user->registration('Muhammad', 'Sheehab', 'Email1@domain.com', 'fgvshjdgvfhsdf', '1989-05-01', 'Male', 'Dhaka', 'Bangladesh', '3'));
    }
    */
    
    public function testCanLoginWithValidData(): void{

        $user = new UserModel(new PDO('mysql:host=localhost;dbname=hoaxed','root', ''));
        $this->assertTrue( $user->login('Email@domain.com', 'fgvshjdgvfhsdf'));
    }

    public function testCanGetCompanies(): void{
        $user = new UserModel(new PDO('mysql:host=localhost;dbname=hoaxed','root', ''));
        $this->assertInternalType( 'array', $user->getCompanies());
    }

    public function testCanGetCompany(): void{
        $user = new UserModel(new PDO('mysql:host=localhost;dbname=hoaxed','root', ''));
        $this->assertInternalType( 'array', $user->getCompany(1));
    }

    public function testCanGetCompanyReviesByID(): void{
        $user = new UserModel(new PDO('mysql:host=localhost;dbname=hoaxed','root', ''));
        $this->assertInternalType( 'array', $user->getReviewsByCompanyID(1));
    }

    
    

    /*
    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
    */
}
