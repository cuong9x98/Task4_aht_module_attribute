<?php

namespace AHT\Attribute\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{
    protected $agentFactory;
    protected $customerRepositoryInterface;
    protected $productRepository;

    public function __construct
    (
        \AHT\Attribute\Model\AgentFactory $agentFactory,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerFactory,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\App\Helper\Context $context
    )
    {
        $this->agentFactory = $agentFactory;
        $this->customerRepositoryInterface = $customerRepositoryInterface;
        $this->productRepository = $productRepository;
        $this->_customerFactory = $customerFactory;

        parent::__construct($context);
    }

    public function getSalesAgent()
    {
        $salesAgent = $this->agentFactory->create()->getCollection();
     
        foreach($salesAgent as $item){
            if($item->getCommision_percent() == 1){
                $data[] = [
                    'id' => $item->getEntityId(),
                    'order_id' => $item->getOrderId(),
                    'agent_id' => $item->getAgentId(),
                    'order_item_sku' => $item->getOrderItemSku(),
                    'order_item_price' => $item->getOrderItemPrice(),
                    'commision_type' => $item->getCommision_percent(),
                    'commision_value' => $item->getCommission_value(),
                    'total' => $item->getOrderItemPrice()-$item->getCommission_value(),
                ];
            }else {
                $data[] = [
                    'id' => $item->getEntityId(),
                    'order_id' => $item->getOrderId(),
                    'agent_id' => $item->getAgentId(),
                    'order_item_sku' => $item->getOrderItemSku(),
                    'order_item_price' => $item->getOrderItemPrice(),
                    'commision_type' => $item->getCommision_percent(),
                    'commision_value' => $item->getCommission_value(),
                    'total' => $item->getOrderItemPrice()-($item->getOrderItemPrice()*$item->getCommission_value()/100),
                ];
            }
        }
        
        return $data;
    }

    public function getCustomerRepository(){
        return $this->customerRepositoryInterface;
    }
}
