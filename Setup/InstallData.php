<?php
namespace AHT\Attribute\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'single_color',
            [
                'type' => 'text',//kieu du lieu
                'backend' => '',//quản trị viên có thể thực hiện một số hành động cụ thể khi tải hoặc lưu thuộc tính.
                'frontend' => '',//Xác định cách hiển thị thuộc tính trong giao diện người dùng.
                'label' => 'Single Color',// nhan
                'input' => 'select',//Kieu nhap
                'class' => '',//
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,//Pham vi
                'visible' => true,
                'required' => true,//quyết định xem thuộc tính là bắt buộc hay tùy chọn.
                'user_defined' => false,// Cho phep xoa bang ha thong.
                'default' => '',// Gia tri mac dinh
                'searchable' =>  true, // Cho phep tim kiem
                'filterable' => false, // Cho phep loc
                'comparable' => true, // Cho phep so sanh
                'visible_on_front' => true, // cho phep hien thi tren giao din nguoi dung
                'used_in_product_listing' => true, // cho phep san pham
                'unique' => false, // Gia tri co duy nhat khong
                'apply_to' => 'configurable', // Ap dung cho san pham nao neu de trong thi se la all
                'system' => true,
                'option' => ['value' =>
                    [
                        'option_1'=>[
                            0=>'Amber'
                        ],
                        'option_2'=>[
                            0=>'Red'
                        ],
                        'option_3'=>[
                            0=>'Blue'
                        ],
                        'option_4'=>[
                            0=>'White'
                        ],
                    ],
                    'order'=>//Here We can Set Sort Order For Each Value.
                        [
                            'option_1'=>1,
                            'option_2'=>2,
                            'option_3'=>3,
                            'option_4'=>4,
                        ]
                ]
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'dual_color',
            [
                'type' => 'text',
                'frontend' => '',
                'label' => 'Dual Color',
                'input' => 'select',
                'class' => '',
                'required' => true,
                'visible' => true,
                'searchable' => true,
                'filterable' => true,
                'filterable_in_search' => true,
                'comparable' => false,
                'visible_on_front' => true,
                'unique' => false,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => false,
                'apply_to' => 'configurable',
                'set' => 'Default',
                'option' => ['value' =>
                    [
                        'option_1'=>[
                            0=>'Red - Amber'
                        ],
                        'option_2'=>[
                            0=>'Red - Blue'
                        ],
                        'option_3'=>[
                            0=>'Blue - Amber'
                        ],
                        'option_4'=>[
                            0=>'Red - White'
                        ],
                        'option_5'=>[
                            0=>'Blue - White'
                        ],
                    ],
                    'order'=>//Here We can Set Sort Order For Each Value.
                        [
                            'option_1'=>1,
                            'option_2'=>2,
                            'option_3'=>3,
                            'option_4'=>4,
                            'option_5'=>5,
                        ]
                ]
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'tri_color',
            [
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Tri Color',
                'input' => 'select',
                'class' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => '',
                'searchable' =>  true,
                'filterable' => false,
                'comparable' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => 'configurable',
                'option' => ['value' =>
                    [
                        'option_1'=>[
                            0=>'Red - Blue - White'
                        ],
                        'option_2'=>[
                            0=>' Red - Blue - Amber'
                        ]
                    ],
                    'order'=>//Here We can Set Sort Order For Each Value.
                        [
                            'option_1'=>1,
                            'option_2'=>2,
                        ]
                ]
            ]
        );
    }
}
