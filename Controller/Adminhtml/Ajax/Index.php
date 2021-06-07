<?php

namespace AHT\Attribute\Controller\Adminhtml\Ajax;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\Context;


class Index extends \Magento\Backend\App\Action {
    protected $request;
    protected $resultFactory;
    protected $resultJsonFactory;
    protected $orderFactory;
    protected $helperData;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ResultFactory $resultFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        \AHT\Attribute\Helper\Data $helperData
    )
    {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->orderFactory = $orderFactory;
        $this->helperData = $helperData;
    }

    public function execute()
    {
        $data = [];
        $result = $this->resultJsonFactory->create();
        $orderItemSkuAjax = $this->getRequest()->getParam('order_item_sku');

        $data = $result->setData($this->filterAgent($orderItemSkuAjax));
        return $data;
    }

    public function filterAgent($orderItemSku){
        $data = [];
        $salesAgent = $this->helperData->getSalesAgent();
        foreach ($salesAgent as $item) {
            if ($item['order_item_sku'] == $orderItemSku) {
                $order = $this->orderFactory->create()->loadByIncrementId($item['order_id']);
                $orderUrl = $this->getUrl('sales/order/view', ['order_id' => $order->getId()]);
                $item['order_url'] = $orderUrl;
                $data[] = $item;
            }
        }
        return $data;
    }
}
