<?php
namespace Acme\Bundle\YuccaDemoBundle\Entity;
/**
 *
 */
class User extends \Yucca\Model\ModelAbstract {
    protected $yuccaProperties = array('id','email','lastName','firstName');
    /**
     * @var mixed
     */
    protected $id;

    /**
     * @var mixed
     */
    protected $email;

    /**
     * @var mixed
     */
    protected $lastName;

    /**
     * @var mixed
     */
    protected $firstName;

    /**
     * @return mixed
     */
    public function getId() {
        $this->hydrate('id');
        return $this->id;
    }

    /**
     * @param $id
     * @return \Acme\Bundle\YuccaDemoBundle\Entity\User
     */
    public function setId($id) {
        $this->hydrate('id');
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        $this->hydrate('email');
        return $this->email;
    }

    /**
     * @param $email
     * @return \Acme\Bundle\YuccaDemoBundle\Entity\User
     */
    public function setEmail($email) {
        $this->hydrate('email');
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName() {
        $this->hydrate('lastName');
        return $this->lastName;
    }

    /**
     * @param $lastName
     * @return \Acme\Bundle\YuccaDemoBundle\Entity\User
     */
    public function setLastName($lastName) {
        $this->hydrate('lastName');
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName() {
        $this->hydrate('firstName');
        return $this->firstName;
    }

    /**
     * @param $firstName
     * @return \Acme\Bundle\YuccaDemoBundle\Entity\User
     */
    public function setFirstName($firstName) {
        $this->hydrate('firstName');
        $this->firstName = $firstName;
        return $this;
    }
}
