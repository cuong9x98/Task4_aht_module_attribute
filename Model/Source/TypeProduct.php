<?php

namespace AHT\Attribute\Model\Source;

class TypeProduct extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $this->_options = [
            ['label' => __('fixed'), 'value' => '1'],
            ['label' => __('percent'), 'value' => '0']
        ];
        return $this->_options;

    }

}
