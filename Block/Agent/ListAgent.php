<?php
namespace AHT\Attribute\Block\Agent;
class ListAgent extends \Magento\Framework\View\Element\Template
{
    protected $helperData;
    protected $sessionFactory;
    protected $productRepository;

    protected $_productCollectionFactory;

    public function __construct
    (
        \AHT\Attribute\Helper\DataAgent $helperData,
        \Magento\Customer\Model\SessionFactory $sessionFactory,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\View\Element\Template\Context $context,

        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory        
    )
    {
        $this->helperData = $helperData;
        $this->sessionFactory = $sessionFactory;
        $this->productRepository = $productRepository;
        parent::__construct($context);

        $this->_productCollectionFactory = $productCollectionFactory;    
    }

    public function getCommision()
    {
        $data = [];
        $collection = $this->_productCollectionFactory->create()->addAttributeToSelect('*');
        foreach($collection as $item){
            if(empty($item->getData('sale_agent_id')) == false){
                $data = array_merge($data,[
                    [
                        'product_url' => $item->getProductUrl(),
                        'name'=>$item->getName(),
                        'price'=>$item->getPrice(),
                        'agent_id' =>$item->getData('sale_agent_id'),
                        'commission_value' =>$item->getData('commission_value'),
                        'commission_type' =>$item->getData('commission_type'),
                        'name'=>$item->getName(),
                    ],
                ]);
            }
        }
        return $data;
    }

    public function isSalesAgent(){
        return $this->sessionFactory->create()->getCustomer()->getAttribute('is_sales_agent');
    }
}
