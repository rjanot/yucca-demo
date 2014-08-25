<?php
namespace Acme\Bundle\YuccaDemoBundle\Selector;

use Acme\Bundle\YuccaDemoBundle\Entity\User;
use \Yucca\Component\Selector\SelectorAbstract;
use Yucca\Component\Selector\Source\SelectorSourceInterface;

/**
 * Class Order
 * @package Acme\Bundle\YuccaDemoBundle\Selector
 */
class Order extends SelectorAbstract
{
    /**
     * @param null|\Yucca\Component\Selector\Source\SelectorSourceInterface $source
     */
    public function __construct(SelectorSourceInterface $source = null)
    {
        parent::__construct($source);
        $this->options = array(
            SelectorSourceInterface::ID_FIELD => array('id', 'user_id as sharding_key'),
            SelectorSourceInterface::SHARDING_KEY_FIELD => null,
            SelectorSourceInterface::TABLE => 'order',
            SelectorSourceInterface::SELECTOR_NAME => __CLASS__,
            SelectorSourceInterface::CONNECTION_NAME => 'memcache'
        );
    }

    public function setUserCriteria(User $user) {
        $this->criterias['user_id'] = $user;
        $this->criterias['sharding_key'] = $user->getId();
    }
}
