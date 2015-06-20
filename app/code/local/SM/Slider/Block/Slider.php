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

    public function getImage(){
        $slider = Mage::getModel('slider/slider')->getCollection()->addFieldToFilter('status',1)->getData();
        $sliderId = $slider[0]['entity_id'];
        $image = Mage::getModel('slider/image')->getCollection()
            ->addFieldToFilter('slider_id',$sliderId)->setPageSize($this->getQty())
            ->getData();
        return $image;
    }
}