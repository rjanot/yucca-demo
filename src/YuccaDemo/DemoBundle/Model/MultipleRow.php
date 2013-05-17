<?php
namespace YuccaDemo\DemoBundle\Model;

class MultipleRow extends \Yucca\Model\ModelAbstract {
    protected $yuccaProperties = array("id","firstName","lastName","backgroundColor","color");

    protected $id;
    protected $firstName;
    protected $lastName;
    protected $backgroundColor;
    protected $color;

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
     * Background color
     */
    public function getBackgroundColor() {
        $this->hydrate('backgroundColor');
        return $this->backgroundColor;
    }

    public function setBackgroundColor($backgroundColor) {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * color
     */
    public function getColor() {
        $this->hydrate('color');
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
        return $this;
    }
}
