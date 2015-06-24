<?php
class SM_Featured_Block_Featured extends Mage_Core_Block_Template{

    public function getCollection(){
        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('is_featured',1)->load();
        return $collection;
    }
}