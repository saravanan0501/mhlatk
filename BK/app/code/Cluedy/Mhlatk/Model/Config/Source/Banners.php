<?php
/**
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Cluedy\Mhlatk\Model\Config\Source;

use Mageplaza\BannerSlider\Model\ResourceModel\Banner\CollectionFactory;

/**
 * Class Banners
 * @package Cluedy\Mhlatk\Model\Config\Source
 */
class Banners implements \Magento\Framework\Option\ArrayInterface
{
	protected $collectionFactory;
	
	/**
     * Sliders constructor.
     *
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }
	
    public function toOptionArray()
    {
        $options = [];
        foreach ($this->toArray() as $value => $label) {
            $options[] = [
                'value' => $value,
                'label' => $label
            ];
        }

        return $options;
    }
	
	/**
     * @return array
     */
    protected function toArray()
    {
        $options = [];

        $rules = $this->collectionFactory->create()->addFieldToFilter('status', 1);
        foreach ($rules as $rule) {
            $options[$rule->getId()] = $rule->getName();
        }

        return $options;
    }
}
