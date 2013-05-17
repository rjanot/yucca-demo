<?php
namespace YuccaDemo\DemoBundle\Model;

class SimpleTable extends \Yucca\Model\ModelAbstract {
    protected $yuccaProperties = array("id","firstName","lastName");

    protected $id;
    protected $firstName;
    protected $lastName;

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
}
