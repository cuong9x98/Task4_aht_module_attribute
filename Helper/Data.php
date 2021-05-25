<?php
namespace AHT\Attribute\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $_customerSession;
    protected $_type;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \AHT\Attribute\Model\Source\Type $type
    ) {
        $this->_customerSession = $customerSession;
        $this->_type = $type;
    }
    public function getAllOptions()
    {
        return $this->_type->getAllOptions();
    }
}