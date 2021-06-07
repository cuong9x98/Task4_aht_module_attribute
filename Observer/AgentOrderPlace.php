<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AHT\Attribute\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class ReportOrderPlaced
 */
class AgentOrderPlace implements ObserverInterface
{

    /**
     * @var \AHT\Attribute\Model\AgentFactory
     */
    protected $agentFactory;

    /**
     * @param \AHT\Attribute\Model\AgentFactory $agentFactory
     */
    public function __construct(
        \AHT\Attribute\Model\AgentFactory $agentFactory
    )
    {
        $this->agentFactory = $agentFactory;
    }

    /**
     * Reports orders placed to the database reporting_orders table
     *
     * @param Observer $observer
     * @return bool
     */
    public function execute(Observer $observer)
    {
        /** @var \Magento\Attribute\Model\Order $order */
        $order = $observer->getEvent()->getOrder();

        /** @var \AHT\Attribute\Model\Agent $agentModel */
        $agentModel = $this->agentFactory->create();

        $items = $order->getAllItems();
        foreach ($items as $item){
            $haveAgents = explode(",",$item->getProduct()->getSaleAgentId());

            if (count($haveAgents) > 0){
                for ($i = 0; $i < count($haveAgents); $i++){
                    if($item->getProduct()->getData('sale_agent_id')==$haveAgents[$i]){
                        $modelData = [
                            'order_id' => $order->getIncrementId(),
                            'agent_id' => $haveAgents[$i],
                            'order_item_sku' => $item->getSku(),
                            'order_item_id' => $item->getProduct()->getId(),
                            'order_item_price' => $item->getPrice(),
                            'commision_percent' => $item->getProduct()->getData('commission_type'),
                            'commission_value' => $item->getProduct()->getData('commission_value'),
                        ];
                        $this->xlog($modelData);
                        $agentModel->setData($modelData);
                        $agentModel->save();
                    }else{
                        return false;
                    }
                }
            }
        }
        return true;
    }

    public function xlog($message = 'null')
    {
        $log = print_r($message, true);
        $logger = new \Zend\Log\Logger;
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/sales-agent.log');
        $logger->addWriter($writer);
        $logger->info($log);

    }
}
