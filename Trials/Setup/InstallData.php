<?php
namespace MagentoLearning\Trials\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallData implements InstallDataInterface{
    /**
    * {@inheritdoc}
    */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context){
        $setup->startSetup();
        
        $setup->getConnection()->insert($setup->getTable('Trials_Items_DB'),['name' => 'Item 1']);
        $setup->getConnection()->insert($setup->getTable('Trials_Items_DB'),['name' => 'Item 2']);
        
        $setup->endSetup();
    }
}
