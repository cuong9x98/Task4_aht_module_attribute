<?php
namespace AHT\Attribute\Model\ResourceModel;

class Agent extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    protected function _construct() 
    {
        $this->_init('sales_agent', 'entity_id');
    }
}
