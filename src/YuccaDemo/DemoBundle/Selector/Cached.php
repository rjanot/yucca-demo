<?php
namespace YuccaDemo\DemoBundle\Selector;

use \Yucca\Component\Selector\SelectorAbstract;
use Yucca\Component\Selector\Source\SelectorSourceInterface;

class Cached extends SelectorAbstract {

    public function __construct(SelectorSourceInterface $source = null){
        parent::__construct($source);
        $this->options = array(
            SelectorSourceInterface::ID_FIELD => array('id'),
            SelectorSourceInterface::SHARDING_KEY_FIELD => null,
            SelectorSourceInterface::TABLE => '3_test_cached',
            SelectorSourceInterface::SELECTOR_NAME => __CLASS__,
            SelectorSourceInterface::CONNECTION_NAME => 'memcache_general',
        );
    }

    /**
     * @param $criteria
     */
    public function addFirstNameCriteria($criteria){
        $this->criterias['first_name'][] = $criteria;
    }

    /**
     * @param $criteria
     */
    public function addLastNameCriteria($criteria){
        $this->criterias['last_name'][] = $criteria;
    }


}
