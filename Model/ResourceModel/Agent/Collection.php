<?php
namespace AHT\Attribute\Model\ResourceModel\Agent;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'entity_id';
	protected $_eventPrefix = 'sales_agent_collection';
	protected $_eventObject = 'Agent_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('AHT\Attribute\Model\Agent', 'AHT\Attribute\Model\ResourceModel\Agent');
	}

}