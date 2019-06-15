<?php
namespace Cluedy\Mhlatk\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Catalog\Model\Category;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
	
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		$eavSetup->addAttribute(
            Category::ENTITY,
            'menu_content',
            [
                'type' => 'text',
                'label' => 'Menu Content',
                'input' => 'textarea',
				'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'wysiwyg_enabled' => true,
                'is_html_allowed_on_front' => true,
                'required' => false,
                'sort_order' => 500,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Content',
				'backend' => ''
            ]
        );
        $eavSetup->addAttribute(
            Category::ENTITY,
            'is_featured',
            [
                'type' => 'int',
                'label' => 'Is Featured Category',
                'input' => 'boolean',
				'source'   => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
				'visible'  => true,
				'default'  => '0',
                'required' => false,
                'sort_order' => 500,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'General Information',
            ]
        );
    }
}