<?php
namespace MagentoLearning\Trials\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        
        $table = $setup->getConnection()->newTable(
            $setup->getTable('Trials_Items_DB')
        )->addColumn('id', Table::TYPE_INTEGER, null, ['identity' => true, 'nullable' => false, 'primary' => true], 'Item id'
        )->addColumn('name', Table::TYPE_TEXT, 255, ['nullable' =>false], 'Item name'
        )->addIndex($setup->getIdxName('Trials_Items_DB', ['name']), ['name']
        )->setComment('Creating sample items DB for Trials module'
        );
        $setup->getConnection()->createTable($table);
        
        $setup->endSetup();
    }
}