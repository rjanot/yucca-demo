<?php
namespace YuccaDemo\DemoBundle\Selector;

use \Yucca\Component\Selector\SelectorAbstract;
use Yucca\Component\Selector\Source\SelectorSourceInterface;

class DoubleTable2 extends SelectorAbstract {

    public function __construct(SelectorSourceInterface $source = null){
        parent::__construct($source);
        $this->options = array(
            SelectorSourceInterface::ID_FIELD => array('id'),
            SelectorSourceInterface::SHARDING_KEY_FIELD => null,
            SelectorSourceInterface::TABLE => '2_test_double_table_2',
            SelectorSourceInterface::SELECTOR_NAME => __CLASS__,
        );
    }

    /**
     * @param $criteria
     */
    public function addLoginCriteria($criteria){
        $this->criterias['login'][] = $criteria;
    }

    /**
     * @param $criteria
     */
    public function addPasswordCriteria($criteria){
        $this->criterias['password'][] = $criteria;
    }


}
