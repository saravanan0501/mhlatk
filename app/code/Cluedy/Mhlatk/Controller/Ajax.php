<?php
/**
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
 */

namespace Cluedy\Mhlatk\Controller;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Ajax
 */
class Ajax extends \Magento\Framework\App\Action\Action
{
    /**
     * Banner Factory
     *
     * @var BannerFactory
     */
    protected $bannerFactory;

    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * Result redirect factory
     *
     * @var RedirectFactory
     */

    /**
     * constructor
     *
     * @param BannerFactory $bannerFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        BannerFactory $bannerFactory,
        Registry $coreRegistry,
        Context $context
    ) {
        $this->bannerFactory = $bannerFactory;
        $this->coreRegistry = $coreRegistry;

        parent::__construct($context);
    }

    /**
     * Init Banner
     *
     * @return \Mageplaza\BannerSlider\Model\Banner
     */
    protected function initBanner()
    {
        $bannerId = (int)$this->getRequest()->getParam('banner_id');
        /** @var \Mageplaza\BannerSlider\Model\Banner $banner */
        $banner = $this->bannerFactory->create();
        if ($bannerId) {
            $banner->load($bannerId);
        }
        $this->coreRegistry->register('mpbannerslider_banner', $banner);

        return $banner;
    }
}
