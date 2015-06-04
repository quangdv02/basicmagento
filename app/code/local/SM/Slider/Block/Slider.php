<?php
class SM_Slider_Block_Slider extends Mage_Core_Block_Template{

    public function getType(){
        $type = Mage::getStoreConfig('slider_options/option/type');
        return $type;
    }

    public function getQty(){
        $type = Mage::getStoreConfig('slider_options/option/qty');
        return $type;
    }
}