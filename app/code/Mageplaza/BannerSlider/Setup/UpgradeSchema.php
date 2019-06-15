<?php
namespace Mageplaza\BannerSlider\Setup;
 
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) 
	{
		$installer = $setup;
		$installer->startSetup();
		
		if(version_compare($context->getVersion(), '2.0.1', '<')) {
			$tableName = $setup->getTable('mageplaza_bannerslider_banner');
			
			if ($setup->getConnection()->isTableExists($tableName) == true) {
				$columns = [
					'mobile_image' => [
						'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						'length' => '255',
						'nullable' => true,
						'comment' => 'Mobile Image',
					]
				];
				
				$connection = $setup->getConnection();
				foreach ($columns as $name => $definition) {
					$connection->addColumn($tableName, $name, $definition);
				}
			}
			
		}
 
		$installer->endSetup();
	}
 
}