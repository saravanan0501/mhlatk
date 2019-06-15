<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 */

namespace Cluedy\Mhlatk\Block\Widget;

use Mageplaza\BannerSlider\Model\BannerFactory;

/**
 * Class Widget
 * @package Mageplaza\BannerSlider\Block
 */
class Banner extends \Magento\Framework\View\Element\Template
{
	
	public $bannerFactory;
	
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        BannerFactory $bannerFactory
    ) {
        $this->bannerFactory = $bannerFactory;
        parent::__construct($context);
    }
	
    /**
     * @return array|bool|AbstractCollection
     */
    public function getBanner()
    {
        $bannerId = $this->getData('banner_id');
		return $this->bannerFactory->create()->load($bannerId);        
    }
}
