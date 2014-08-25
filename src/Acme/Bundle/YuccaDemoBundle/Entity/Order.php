<?php
namespace Acme\Bundle\YuccaDemoBundle\Entity;
/**
 *
 */
class Order extends \Yucca\Model\ModelAbstract {
    protected $yuccaProperties = array('id','amount','user','createdAt','sharding_key');
    /**
     * @var mixed
     */
    protected $id;

    /**
     * @var mixed
     */
    protected $amount;

    /**
     * @var \Acme\Bundle\YuccaDemoBundle\Entity\User
     */
    protected $user;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    protected $sharding_key;

    /**
     * @return mixed
     */
    public function getId() {
        $this->hydrate('id');
        return $this->id;
    }

    /**
     * @param $id
     * @return \Acme\Bundle\YuccaDemoBundle\Entity\Order
     */
    public function setId($id) {
        $this->hydrate('id');
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmount() {
        $this->hydrate('amount');
        return $this->amount;
    }

    /**
     * @param $amount
     * @return \Acme\Bundle\YuccaDemoBundle\Entity\Order
     */
    public function setAmount($amount) {
        $this->hydrate('amount');
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return \Acme\Bundle\YuccaDemoBundle\Entity\User
     */
    public function getUser() {
        $this->hydrate('user');
        return $this->user;
    }

    /**
     * @param \Acme\Bundle\YuccaDemoBundle\Entity\User $user
     * @return \Acme\Bundle\YuccaDemoBundle\Entity\Order
     */
    public function setUser(\Acme\Bundle\YuccaDemoBundle\Entity\User $user) {
        $this->hydrate('user');
        $this->user = $user;
        $this->yuccaIdentifier['sharding_key'] = $user->getId();
        $this->sharding_key = $user->getId();

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt() {
        $this->hydrate('createdAt');
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return \Acme\Bundle\YuccaDemoBundle\Entity\Order
     */
    public function setCreatedAt(\DateTime $createdAt) {
        $this->hydrate('createdAt');
        $this->createdAt = $createdAt;
        return $this;
    }
}
