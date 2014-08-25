<?php
namespace Acme\Bundle\YuccaDemoBundle\Selector;

use \Yucca\Component\Selector\SelectorAbstract;
use Yucca\Component\Selector\Source\SelectorSourceInterface;

/**
 * Class User
 *
 * @package Acme\Bundle\YuccaDemoBundle\Selector
 */
class User extends SelectorAbstract
{
    /**
     * @param null|\Yucca\Component\Selector\Source\SelectorSourceInterface $source
     */
    public function __construct(SelectorSourceInterface $source = null)
    {
        parent::__construct($source);
        $this->options = array(
            SelectorSourceInterface::ID_FIELD => array('id'),
            SelectorSourceInterface::SHARDING_KEY_FIELD => null,
            SelectorSourceInterface::TABLE => 'user',
            SelectorSourceInterface::SELECTOR_NAME => __CLASS__,
            SelectorSourceInterface::CONNECTION_NAME => 'memcache'
        );
    }
}
