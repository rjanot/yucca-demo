<?php
namespace YuccaDemo\DemoBundle\Model;

class DoubleTable extends \Yucca\Model\ModelAbstract {
    protected $yuccaProperties = array("id","firstName","lastName", "login","password");

    protected $id;
    protected $firstName;
    protected $lastName;
    protected $login;
    protected $password;

    /**
     * ID
     */
    public function getId() {
        $this->hydrate('id');
        return $this->id;
    }

    /**
     * first name
     */
    public function getFirstName() {
        $this->hydrate('firstName');
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * last name
     */
    public function getLastName() {
        $this->hydrate('lastName');
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * get login
     */
    public function getLogin() {
        $this->hydrate('login');
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
        return $this;
    }

    /**
     * Password
     */
    public function getPassword() {
        $this->hydrate('password');
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }
}
