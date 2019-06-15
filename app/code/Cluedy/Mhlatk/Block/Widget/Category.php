<?php
namespace Cluedy\Mhlatk\Block\Widget;

class Category extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{
	/**
	 * Default value for products count that will be shown
	 */
	protected $_categoryHelper;
	protected $categoryFlatConfig;
	protected $_categoryCollectionFactory;

	protected $topMenu;
	protected $_categoryFactory;

	protected $mainTitle;
	protected $tagLine;

	/**
	 * @param \Magento\Framework\View\Element\Template\Context $context
	 * @param \Magento\Catalog\Helper\Category $categoryHelper
	 * @param array $data
	 */
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
		\Magento\Catalog\Helper\Category $categoryHelper,
		\Magento\Catalog\Model\Indexer\Category\Flat\State $categoryFlatState,
		\Magento\Catalog\Model\CategoryFactory $categoryFactory,
		\Magento\Theme\Block\Html\Topmenu $topMenu
	) {
		$this->_categoryHelper = $categoryHelper;
		$this->categoryFlatConfig = $categoryFlatState;
		$this->topMenu = $topMenu;
		$this->_categoryFactory = $categoryFactory;
		$this->_categoryCollectionFactory = $categoryCollectionFactory;
		parent::__construct($context);
	}
	
	public function getFeaturedCategories() 
	{
		return  $this->_categoryCollectionFactory->create()
					->addAttributeToSelect('*')
					->addAttributeToFilter('is_featured', 1);
	}
}