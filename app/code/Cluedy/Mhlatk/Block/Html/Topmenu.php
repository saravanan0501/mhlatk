<?php

namespace Cluedy\Mhlatk\Block\Html;

class Topmenu extends \Magento\Theme\Block\Html\Topmenu
{
    protected function _addSubMenu($child, $childLevel, $childrenWrapClass, $limit)
    {
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$categoryCollection = $objectManager->get('\Magento\Catalog\Model\ResourceModel\Category\CollectionFactory');
		$categories = $categoryCollection->create();
		$categories->addAttributeToSelect('*');
		
        $html = '';
        if (!$child->hasChildren()) {
            return $html;
        }

        $colStops = null;
        if ($childLevel == 0 && $limit) {
            $colStops = $this->_columnBrake($child->getChildren(), $limit);
        }

        $html .= '<div class="sub_catry"><div class="sub_catry_flex"><div class="sub_catry_left">';
		$html .= '<ul class="level' . $childLevel . ' ' . $childrenWrapClass . '">';
        $html .= $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
        $html .= '</ul>';
		$html .= '</div>';
		
		if ($childLevel == 0) {
			foreach($categories as $category) {
				if($category->getName() == $child->getName()) {
					$htmlBlock = $category->getMenuContent();
					if($htmlBlock != '') {
						$html .= '<div class="sub_catry_right">' . $htmlBlock . '</div>';
					}
				}
			}			
		}
		
		$html .= '</div></div>';

        return $html;
    }
}