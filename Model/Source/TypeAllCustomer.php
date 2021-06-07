<?php

namespace AHT\Attribute\Model\Source;

class TypeAllCustomer extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
        \Magento\Customer\Model\CustomerFactory $customerFactory
    ) {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        $this->_customerFactory = $customerFactory;
    }
    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $data = [];
        $customer = $this->_customerFactory->create()->getCollection()->addAttributeToSelect('*');
        foreach($customer as $item){
                if($item->getData('is_sales_agent')==1){
                    $data = array_merge($data,[
                        ['label' => __($item->getFirstname().$item->getLastname()), 'value' => $item->getId()],
                    ]);
                }
        }
        
        return $data;

    }

}
