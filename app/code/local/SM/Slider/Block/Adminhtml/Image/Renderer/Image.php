<?php
class SM_Slider_Block_Adminhtml_Image_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $value =  $row->getData($this->getColumn()->getIndex());
        return "<img src='".Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA)."slider/".$value."' width='75' height='75'/>";
    }
}