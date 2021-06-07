<?php
namespace AHT\Attribute\Model;

use \Magento\Framework\DataObject\IdentityInterface;

class Agent extends \Magento\Framework\Model\AbstractModel 
{

    /**
     * Undocumented function
     *
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,  
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource=null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection=null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    /**
     * @return void
     */
    
	public function _construct()
	{
		$this->_init('AHT\Attribute\Model\ResourceModel\Agent');
    }
       /**
     * Undocumented function
     *
     * @return string
     */
    public function getEntity_id() {
        return $this->getData("entity_id");
    }
        /**
     * Undocumented function
     *
     * @return string
     */
    public function getAgent_id() {
        return $this->getData("agent_id");
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getOrder_id() {
        return $this->getData("order_id");
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getOrder_item_id() {
        return $this->getData("order_item_id");
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getOrder_item_sku() {
        return $this->getData("order_item_sku");
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getOrder_item_price() {
        return $this->getData("order_item_price");
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getCommision_percent() {
        return $this->getData("commision_percent");
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getCommission_value() {
        return $this->getData("commission_value");
    }
    
    public function setEntity_id($entity_id)
    {
        $this->setData('entity_id', $entity_id);
    }
    public function setAgent_id($agent_id)
    {
        $this->setData('agent_id', $agent_id);
    }
    /**
     * Undocumented function
     *
     * @param int
     * @return null
     */
    public function setOrder_id($order_id) {
        return $this->setData("order_id", $order_id);
    }
    /**
     * Undocumented function
     *
     * @param int
     * @return null
     */
    public function setOrder_item_id($order_item_id) {
        return $this->setData("order_item_id", $order_item_id);
    }
    /**
     * Undocumented function
     *
     * @param string $email
     * @return null
     */
    public function setrder_item_sku($order_item_sku) {
        return $this->setData("order_item_sku", $order_item_sku);
    }
    /**
     * Undocumented function
     *
     * @param string $order_item_price
     * @return null
     */
    public function setOrder_item_price($order_item_price) {
        return $this->setData("order_item_price", $order_item_price);

    }
    /**
     * Undocumented function
     *
     * @param string $order_item_price
     * @return null
     */
    public function setCommision_percent($commision_percent) {
        return $this->setData("commision_percent", $commision_percent);

    }
    /**
     * Undocumented function
     *
     * @param string $order_item_price
     * @return null
     */
    public function setCommission_value($commission_value) {
        return $this->setData("commission_value", $commission_value);

    }
}