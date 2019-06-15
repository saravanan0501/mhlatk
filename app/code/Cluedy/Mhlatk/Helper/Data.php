<?php
namespace Cluedy\Mhlatk\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
	protected $_categoryHelper;
	protected $_date;
	
	public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Catalog\Helper\Category $categoryHelper,
		\Magento\Framework\Stdlib\DateTime\DateTime $dateTime
    )
    {
        $this->_categoryHelper = $categoryHelper;
		$this->_date = $dateTime;
        parent::__construct($context);
    }
	
	/**
     * Return categories helper
     */
    public function getCategoryHelper()
    {
        return $this->_categoryHelper;
    }
	
	public function isNew($product)
    {
        $fromDate = $product->getNewsFromDate();
        $toDate   = $product->getNewsToDate();
		$today =  time();

        if (!$fromDate || !$toDate) {
            return false;
        }
        

        if($today >= strtotime( $fromDate) && $today <= strtotime($toDate) || 
			$today >= strtotime( $fromDate) && is_null($toDate)){
				return true;
        }

        return false;
    }
	
	public function isSpecial($product)
    {
        $specialprice = $product->getSpecialPrice();
		$specialPriceFromDate = $product->getSpecialFromDate();
		$specialPriceToDate = $product->getSpecialToDate();
		$today =  time();

		if ($specialprice && ($product->getPrice()>$product->getFinalPrice())){
				if($today >= strtotime( $specialPriceFromDate) && $today <= strtotime($specialPriceToDate) || 
				$today >= strtotime( $specialPriceFromDate) && is_null($specialPriceToDate)){
					return true;
			}
		}

        return false;
    }
}