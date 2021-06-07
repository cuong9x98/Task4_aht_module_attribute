<?php
namespace AHT\Attribute\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('sales_agent');
        if($conn->isTableExists($tableName) != true){
            $table = $conn->newTable($tableName)
                ->addColumn(
                    'entity_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true]
                )
                ->addColumn(
                    'agent_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable'=>true,
                        'unsigned'=>true
                    ],
                    'Agent id'
                )
                ->addColumn(
                    'order_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable'=>true,
                        'unsigned'=>true
                    ],
                    'Order Id'
                )
                ->addColumn(
                    'order_item_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable'=>true,
                        'unsigned'=>true
                    ],
                    'Order Item Id'
                )
                ->addColumn(
                    'order_item_sku',
                    Table::TYPE_TEXT,
                    '2M',
                    ['nullbale'=>false,'default'=>''],
                    'Order Item Sku'
                )
                ->addColumn(
                    'order_item_price',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable'=>true,
                        'unsigned'=>true
                    ],
                    'Order Item Price'
                )
                ->addColumn(
                    'commision_percent',
                    \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                    null,
                    [
                        'nullable'=>true,
                        'unsigned'=>true
                    ],
                    'Commision Percent'
                )
                ->addColumn(
                    'commission_value',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable'=>true,
                        'unsigned'=>true
                    ],
                    'Commission Value'
                )
                ->setOption('charset','utf8');
            $conn->createTable($table);
        }
        $setup->endSetup();
    }
}
?>
