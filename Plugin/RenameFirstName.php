<?php

namespace AHT\Attribute\Plugin;

class RenameFirstName
{
    public function afterGetFirstname(\Magento\Customer\Model\Data\Customer $subject, $result)
    {
        if ($subject->getCustomAttribute('is_sales_agent')->getValue() == \Magento\Eav\Model\Entity\Attribute\Source\Boolean::VALUE_YES){
            $a = $result;
            $result = 'Sale Agent: '.$a;
        }
        return $result;
    }
}
