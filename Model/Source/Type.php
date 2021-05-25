<?php
 
namespace AHT\Attribute\Model\Source;
 
class Type extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
    * Get all options
    *
    * @return array
    */
    public function getAllOptions()
    {
        $this->_options = [
                ['label' => __('CBD Manufacturer'), 'value'=>'CBD Manufacturer'],
                ['label' => __('CBD Brand and Marketing company'), 'value'=>'CBD Brand and Marketing company'],
                ['label' => __('CBD Extractor'), 'value'=>'CBD Extractor'],
                ['label' => __('Other'), 'value'=>'Other']
            ];
 
    return $this->_options;
 
    }
 
}